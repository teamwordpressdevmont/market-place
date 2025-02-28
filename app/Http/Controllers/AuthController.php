<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

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
}