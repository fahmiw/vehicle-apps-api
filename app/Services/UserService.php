<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Exception;

class UserService 
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function create($data) {
        try {
            $data->validate([
                "name" => "required",
                "email" => "required|email|unique:users",
                "phone_no" => "required",
                "password" => "required|confirmed"
            ]);
    
            $user = $this->userRepository->create([
                'name' => $data->name,
                'email' => $data->email,
                'phone_no' => $data->phone_no,
                'password' => bcrypt($data->password),
            ]);
    
            return response()->json([
                "statusCode" => 201,
                "message" => "User registered successfully",
                "data" => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }

    public function verify($data) {
        try{
            $data->validate([
                "email" => "required|email",
                "password" => "required"
            ]);
            if (!$token = auth()->attempt(["email" => $data->email, "password" => $data->password])) {
            return response()->json([
                    "statusCode" => 400,
                    "message" => "Invalid credentials"
                ], 200);
            }

            return response()->json([
                "statusCode" => 200,
                "message" => "Logged in successfully",
                "data" => [
                    "access_token" => $token
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy() {
        try{
            auth()->logout();
            return response()->json([
                "statusCode" => 200,
                "message" => "User logged out"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }
}