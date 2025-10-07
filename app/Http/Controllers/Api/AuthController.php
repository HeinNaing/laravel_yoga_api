<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // ✅ LOGIN WITH NAME & EMAIL (No password)
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
        ]);

        // Find user by both name and email
        $user = User::where('name', $request->name)
                    ->where('email', $request->email)
                    ->first();

        // Check if user exists
        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid name or email'
            ], 401);
        }

        // Create Sanctum Token
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ], 200);
    }
}
