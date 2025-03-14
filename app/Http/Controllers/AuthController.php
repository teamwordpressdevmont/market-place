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


class AuthController extends Controller
{

    /**
     * Register Trade Person Api -- POST
     */

    public function registerTradePerson(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
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
                'portfolio' => 'sometimes|array',
                'portfolio.*' => 'image|mimes:jpg,png,jpeg|max:2048',
                'certificate' => 'sometimes|file|mimes:pdf,doc,docx|max:5120',
                'avatar' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
                'latitude' => 'sometimes|numeric|between:-90,90',
                'longitude' => 'sometimes|numeric|between:-180,180',
            ]);

            // Create User
            $fullName = trim($request->first_name . ' ' . $request->get('last_name', ''));

            $user = User::create([
                'email' => $request->email,
                'name' => $fullName,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                'user_approved' => 0
            ]);

            $user->assignRole('tradeperson');
            // Handle Avatar Upload


            if ($request->hasFile('avatar')) {
                $filename = time() . '_' . $request->avatar->getClientOriginalName();
                $path = $request->avatar->storeAs('avatars', $filename, 'public');
                $user->avatar = $path;
                $user->save();
            }

            // Create Tradeperson Entry
            $traderPerson = Tradeperson::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'phone' => $request->phone_number, // Fixed variable
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'about_me' => $request->get('about_me', ''),
                'address' => $request->address,
                'latitude' => $request->get('latitude', ''),
                'longitude' => $request->get('longitude', ''),
            ]);

            // Handle Portfolio Images
            if ($request->hasFile('portfolio')) {
                $portfolioArr = [];
                foreach ($request->file('portfolio') as $portfolio) {
                    $path = $portfolio->store('tradeperson_portfolio', 'public');
                    $portfolioArr[] = $path;
                }
                $traderPerson->portfolio = $portfolioArr;
                $traderPerson->save();
            }

            // Handle Certificate Upload
            if ($request->hasFile('certificate')) {
                $certificatePath = $request->file('certificate')->store('tradeperson_certificate', 'public');
                $traderPerson->certificate = $certificatePath;
                $traderPerson->save();
            }

            if ($request->categories) {
                $traderPerson->categories()->attach($request->categories);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Trade Person registered successfully!',
                'data' => $user->load('tradeperson')
            ], 201); // 201 is better for resource creation
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
                'post_code' => 'nullable|string|max:20',
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
                'post_code' => $request->get('post_code', ''),
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

        if(!$user){
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
        }
        
        catch (\Exception $e) {
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