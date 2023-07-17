<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "phone_no" => "required",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            "statusCode" => 201,
            "message" => "User registered successfully",
            "data" => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (!$token = auth()->attempt(["email" => $request->email, "password" => $request->password])) {
        return response()->json([
                "statusCode" => 400,
                "message" => "Invalid credentials"
            ], 200);
        }

        return response()->json([
            "statusCode" => 200,
            "message" => "Logged in successfully",
            "access_token" => $token
        ], 200);
    }
    
    public function logout()
    {
        auth()->logout();
        return response()->json([
            "statusCode" => 200,
            "message" => "User logged out"
        ], 200);
    }
}
