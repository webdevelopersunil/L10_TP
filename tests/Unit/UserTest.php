<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase; // This trait resets the database after each test

    /**
     * Test if user details can be fetched.
     */
    public function testUserDetailsCanBeFetched()
    {
        // Create a user using the factory
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        // Call an endpoint or controller method that fetches user details
        $response = $this->get('/user/' . $user->id);

        // Assert that the response is successful (HTTP status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the user's name
        $response->assertSee($user->name);

        // Assert that the response contains the user's email
        $response->assertSee($user->email);

        // Add more assertions as needed to check other user details
    }
}

