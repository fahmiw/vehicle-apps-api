<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                "statusCode" => 400,
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "phone_no" => ["The phone no field is required."],
                    "password" => ["The password field is required."],
                    "password_confirmation" => ["The password confirmation field is required."],
                ]
            ]);
    }

    public function testRepeatPassword()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "doe@gmail.com",
            "phone_no" => "08332211223",
            "password" => "demo12345",
            "password_confirmation" => "demo123452"
        ];

        $this->json('POST', 'api/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                "statusCode" => 400,
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password and password confirmation must match."]
                ]
            ]);
    }

    public function testSuccessfulRegistration()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "doe@gmail.com",
            "phone_no" => "08332211223",
            "password" => "demo12345",
            "password_confirmation" => "demo12345"
        ];

        $this->json('POST', 'api/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "statusCode",
                "message",
                "data" => [
                    "name",
                    "email",
                    "phone_no",
                    "updated_at",
                    "created_at",
                    "_id"
                ]
            ]);
    }

    public function testEmailTaken()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "doe@gmail.com",
            "phone_no" => "08332211223",
            "password" => "demo12345",
            "password_confirmation" => "demo12345"
        ];

        $this->json('POST', 'api/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                "statusCode" => 400,
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => ["The email has already been taken."]
                ]
            ]);
    }

}
