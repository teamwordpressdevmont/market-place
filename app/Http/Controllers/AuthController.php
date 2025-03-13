<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\RefreshToken;
use Illuminate\Support\Facades\Password;
use Laravel\Passport\Token;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Support\Facades\Crypt;


class AuthController extends Controller
{
    // Register New User Updated
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|min:6',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('API Token')->accessToken;

            $user->assignRole('customer');

            return response()->json([
                'message' => 'Customer created successfully!',
                'token' => $token,
                'token_type' => 'Bearer',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User creation failed! ' . $th->getMessage()], 500);
        }
    }

    // Login User & Generate Access Token
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Generate Passport Token
        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    // Logout User & Revoke Token
    public function logout(Request $request)
    {
        $user = $request->user();

        // Revoke current token
        $token = $user->token();
        $token->revoke(); // Revoke token

        return response()->json(['message' => 'Logout successful'], 200);
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
        // Validate email, token, password, and password confirmation
        $request->validate([
            'email' => 'required|string',
            'token' => 'required|string',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // Check if passwords match
        if ($request->password !== $request->password_confirmation) {
            return response()->json([
                'message' => 'The password and confirmation password do not match.'
            ], 400); // Return error if passwords don't match
        }

        // Decrypt the email from the request (the email is encrypted in the URL)

        // $g = Crypt::decryptString($request->input('email'));
        // dd($g);
        
        try {
            $email = Crypt::decryptString($request->input('email'));
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Invalid reset link or email.'
            ], 400);
        }

        dd($request);

        // Get the token and password from the request
        $token = $request->input('token');
        $password = $request->input('password');

        // Attempt to reset the password using the token
        $response = Password::reset(
            [
                'email' => $email,
                'password' => $password,
                'token' => $token,
            ],
            function ($user) use ($password) {
                // Hash the new password and save it
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        // Check response and return appropriate message
        if ($response == Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Password has been successfully updated.'], 200);
        }

        // Handle invalid or expired token
        if ($response == Password::INVALID_TOKEN) {
            return response()->json(['message' => 'Invalid or expired token.'], 400);
        }

        // Handle other potential errors
        return response()->json(['message' => 'Failed to update password.'], 400);
    }



}