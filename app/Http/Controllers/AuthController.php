<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\RefreshToken;
use Illuminate\Support\Facades\Password;
use Laravel\Passport\Token;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Customer;
use App\Models\Tradeperson;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;



class AuthController extends Controller
{

    /**
     * Register Trade Person Api -- POST
     */

    public function registerTradePerson(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validation
            $validated = $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'first_name' => 'required|string|min:3|max:30',
                'last_name' => 'sometimes|string|min:3|max:30',
                'gender' => 'required|string|in:Male,Female',
                'phone_number' => 'sometimes|string|regex:/^\+?[0-9]{7,15}$/',
                'city' => 'required|string',
                'postal_code' => 'required|string|regex:/^\d{5,6}$/',
                'about_me' => 'sometimes|string|min:10|max:1000',
                'address' => 'required|string',
                'categories' => 'required|array',
                'categories.*' => 'sometimes|integer|exists:categories,id',
                'portfolio.*' => 'image|mimes:jpg,png,jpeg|max:2048',
                'certificate.*' => 'file|mimes:pdf,doc,docx|max:5120',
                'avatar' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
                'banner' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
                'latitude' => 'sometimes|numeric|between:-90,90',
                'longitude' => 'sometimes|numeric|between:-180,180',
            ]);

            // User Creation
            $fullName = trim($request->first_name . ' ' . ($request->last_name ?? ''));
            $user = User::create([
                'email' => $validated['email'],
                'name' => $fullName,
                'password' => Hash::make($validated['password']),
                'email_verified_at' => now(),
                'user_approved' => 0
            ]);

            $user->assignRole('tradeperson');

            // File Upload Handling Inside Same Function
            $avatar = null;
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $avatar = $file->storeAs('avatars', $filename, 'public');
            }

            $banner = null;
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $filename = time() . '_' . $file->getClientOriginalName();
                $banner = $file->storeAs('tradeperson_banner', $filename, 'public');
            }

            $portfolio = [];
            if ($request->hasFile('portfolio')) {
                foreach ($request->file('portfolio') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $portfolio[] = $file->storeAs('tradeperson_portfolio', $filename, 'public');
                }
            }

            $certificate = [];
            if ($request->hasFile('certificate')) {
                foreach ($request->file('certificate') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $certificate[] = $file->storeAs('tradeperson_certificate', $filename, 'public');
                }
            }

            // Tradeperson Creation
            $traderPerson = Tradeperson::create([
                'user_id' => $user->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? '',
                'nick_name' => $request->nick_name ?? '',
                'gender' => $validated['gender'],
                'phone' => $validated['phone_number'] ?? '',
                'city' => $validated['city'],
                'postal_code' => $validated['postal_code'],
                'about_me' => $validated['about_me'] ?? '',
                'address' => $validated['address'],
                'service' => $request->service ?? '',
                'latitude' => $validated['latitude'] ?? null,
                'longitude' => $validated['longitude'] ?? null,
                'featured' => 0,
                'avatar' => $avatar,
                'banner' => $banner,
                'portfolio' => json_encode($portfolio),
                'certificate' => json_encode($certificate),
                'username' => Str::lower($validated['first_name'] . (!empty($validated['last_name']) ? $validated['last_name'] : "") . $user->id)
            ]);

            // Attach Categories
            $traderPerson->categories()->attach($validated['categories']);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Trade Person registered successfully!',
                'data' => $user->load('tradeperson')
            ], 201);
        } catch (ValidationException $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Register Customer Api -- POST
     */

    public function registerCustomer(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => 'required|min:6',
                'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'required|string|max:500',
                'address2' => 'nullable|string|max:500',
                'postal_code' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:255',
                'country' => 'required|string|max:255',
                'gender' => 'required|in:Male,Female,Other',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_approved' => 0,
            ]);

            if ($request->hasFile('avatar')) {
                $filename = time() . '_' . $request->avatar->getClientOriginalName();
                $path = $request->avatar->storeAs('avatars', $filename, 'public');
                $user->avatar = $path;
                $user->save();
            }

            Customer::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->get('phone', ''),
                'address' => $request->address,
                'address2' => $request->get('address2', ''),
                'postal_code' => $request->get('post_code', ''),
                'city' => $request->get('city', ''),
                'country' => $request->country,
                'gender' => $request->gender
            ]);

            $user->assignRole('customer');
            $token = $user->createToken('API Token')->accessToken;

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Customer created successfully!',
                'token' => $token,
                'token_type' => 'Bearer',
            ], 201);
        } catch (ValidationException $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Google Register Api for Tradeperson
     */
    public function registerGoogle(Request $request)
    {
        DB::beginTransaction();
        try {
            $allowedParams = ['email', 'name', 'google_id', 'avatar', 'google_token', 'user_type', 'password', 'phone', 'gender', 'city', 'nick_name', 'postal_code', 'latitude', 'longitude', 'country', 'address', 'address2', 'about_me', 'service', 'portfolio', 'certificate', 'banner', 'featured'];

            $unexpectedParams = array_diff(array_keys($request->all()), $allowedParams);
            if (!empty($unexpectedParams)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid parameters detected: ' . implode(', ', $unexpectedParams)
                ], 400);
            }

            $user = User::where('email', $request->email)->first();

            $request->validate([
                'email' => ['required', Rule::unique('users', 'email')->ignore(optional($user)->id)],
                'name' => 'required',
                'google_id' => ['required', Rule::unique('users', 'google_id')->ignore(optional($user)->id)],
                'avatar' => 'required',
                'google_token' => 'required',
                'password' => 'required|min:6',
                'user_type' => 'required|in:customer,tradeperson',
                'city' => 'required',
                'postal_code' => 'required_if:user_type,tradeperson',
                'address' => 'required',
            ]);

            $user_type = $request->user_type;

            $data = [
                'name' => $request->name,
                'google_id' => $request->google_id,
                'google_token' => $request->google_token,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
            ];

            $exists_user = User::where('email', $request->email)->first();
            if (!$exists_user) {
                $data['avatar'] = $request->avatar;
            }

            $user = User::updateOrCreate(['email' => $request->email], $data);
            

            if (!$exists_user) {
                $nameParts = explode(' ', trim($request->name), 2);
                $first_name = $nameParts[0] ?? '';
                $last_name = $nameParts[1] ?? '';

                if ($user_type === 'customer') {
                    Customer::updateOrCreate(
                        ['user_id' => $user->id],
                        [
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'phone' => $request->phone,
                            'gender' => $request->gender,
                            'city' => $request->city,
                            'country' => $request->country,
                            'postal_code' => $request->postal_code,
                            'address' => $request->address,
                            'address2' => $request->address2,
                        ]
                    );
                    $user->assignRole('customer');
                } else if ($user_type === 'tradeperson') {
                    Tradeperson::updateOrCreate(
                        ['user_id' => $user->id],
                        [
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'nick_name' => $request->nick_name,
                            'gender' => $request->gender,
                            'phone' => $request->phone,
                            'city' => $request->city,
                            'postal_code' => $request->postal_code,
                            'latitude' => $request->latitude,
                            'longitude' => $request->longitude,
                            'about_me' => $request->about_me,
                            'service' => $request->service,
                            'address' => $request->address,
                            'portfolio' => !empty($request->portfolio) && is_array($request->portfolio) ? json_encode(array_filter($request->portfolio)) : null,
                            'certificate' => $request->certificate,
                            'banner' => $request->banner,
                            'featured' => $request->featured,
                        ]
                    );
                    $user->assignRole('tradeperson');
                }
            }

            $token = $user->createToken('API Token')->accessToken;
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User registered successfully!',
                'user_id' => $user->id,
                'token' => $token,
                'token_type' => 'Bearer',
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('User creation failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'User creation failed. Please try again later. ' . $e->getMessage()
            ], 500);
        }
    }

    // Login User & Generate Access Token
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials',
                ], 401);
            }

            if ($user->user_approved == 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'User account is deactivated',
                ], 403);
            }
            
            // Revoke current token
            // $token = $user->token();
            // $token->revoke();
            $user->tokens()->delete();

            // Generate Passport Token
            $token = $user->createToken('API Token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Logout User & Revoke Token
    public function logout(Request $request)
    {
        $user = $request->user();

        // Revoke current token
        $token = $user->token();
        $token->revoke(); // Revoke token

        return response()->json([
            'success' => true,
            'message' => 'Logout successful'
        ], 200);
    }

    public function forgetPasword(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found',
            ], 404);
        }


        try {

            // Generate the reset token (for the custom notification)
            $token = Password::getRepository()->create($user);

            // Encrypt the user's email before including it in the reset URL
            $encryptedEmail = Crypt::encryptString($user->email);
            // Encode the encrypted email to URL-safe Base64
            $encodedEmail = base64_encode($encryptedEmail);
            // Replace '+' and '/' with URL-safe characters
            $encodedEmail = strtr($encodedEmail, '+/', '-_');

            // Send the custom reset password notification with the encrypted email
            $user->notify(new CustomResetPasswordNotification($token, $encodedEmail));

            return response()->json([
                'success' => true,
                'encyrpted_email' => $encodedEmail,
                'message' => 'Reset link sent to your email.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send link',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Manually check if password and password_confirmation match
        if ($request->input('password') !== $request->input('password_confirmation')) {
            return response()->json([
                'message' => 'Password confirmation does not match.',
            ], 400);
        }

        // Decrypt the email from the request (the email is encrypted in the URL)

        // Step 1: Replace URL-safe characters with the original Base64 characters
        $encodedEmail = strtr($request->email, '-_', '+/');
        // Step 2: Decode the Base64 string
        $encryptedEmail = base64_decode($encodedEmail);

        try {
            $email = Crypt::decryptString($encryptedEmail);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Invalid reset link or email.'
            ], 400);
        }

        // Get the token and password from the request
        $token = $request->input('token');
        $password = $request->input('password');
        $hashedPassword = Hash::make($request->password);


        // Attempt to reset the password using the token
        $response = Password::reset(
            [
                'email' => $email,
                'password' => $password,
                'token' => $token,
            ],
            function ($user) use ($hashedPassword) {
                // Hash the new password and save it
                $user->password = $hashedPassword;
                $user->save();
            }
        );


        // Check response and return appropriate message
        if ($response == Password::PASSWORD_RESET) {
            return response()->json([
                'message' => 'Password reset successfully.',
            ]);
        }

        // Handle invalid or expired token
        if ($response == Password::INVALID_TOKEN) {
            return response()->json(['message' => 'Invalid or expired token.'], 400);
        }

        // Handle other potential errors
        return response()->json(['message' => 'Failed to update password.'], 200);
    }
}