<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class APITest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user registration.
     */
    public function testUserRegistration()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'User registered successfully.',
            ]);
    }

    /**
     * Test user login.
     */
    public function testUserLogin()
    {
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $loginData = [
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ];

        $response = $this->json('POST', '/api/login', $loginData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'token',
            ]);
    }
    /**
     * Test user registration with missing required fields.
     */
    public function testUserRegistrationMissingFields()
    {
        $response = $this->json('POST', '/api/register', []);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The name field is required. (and 2 more errors)',
                'errors' => [
                    'name' => ['The name field is required.'],
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.'],
                ],
            ]);
    }


    /**
     * Test user login with invalid credentials.
     */
    public function testUserLoginInvalidCredentials()
    {
        $loginData = [
            'email' => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ];

        $response = $this->json('POST', '/api/login', $loginData);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'Invalid credentials',
            ]);
    }
    /**
     * Test getting weather data.
     */
    public function testGetWeather()
    {
        User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $loginData = [
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ];

        $token_response = $this->json('POST', '/api/login', $loginData);

        $latitude = 51.526246734700486; // Example latitude
        $longitude = -0.4612053213544973; // Example longitude
        $data = [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token_response->json('token'),
        ])
            ->json('POST', '/api/weather', $data);

        $response->assertOk();
        $response->assertJsonStructure([
            'location',
            'current',
        ]);
    }
    /**
     * Test weather data failure.
     */
    public function testGetWeatherMissingLatitudeAndLongitude()
    {
        User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $loginData = [
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ];

        $token_response = $this->json('POST', '/api/login', $loginData);

        $data = []; // Empty data array without latitude and longitude

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token_response->json('token'),
        ])
            ->json('POST', '/api/weather', $data);

        $response->assertStatus(422);
    }
}
