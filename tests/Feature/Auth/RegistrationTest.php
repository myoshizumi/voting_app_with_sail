<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group registration
     */
    public function admin_can_access_to_the_registration_screen_can_be_rendered()
    {
        $user = User::factory()->make([
            'email' => 'test@example.com'
        ]);

        $response = $this->actingAs($user)->get('/register');

        $response->assertStatus(200);
    }
    
    /**
     * @test
     * @group registration
     */
    public function user_cannot_access_to_the_registration_if_they_dont_have_authority()
    {
        $user = User::factory()->make([
            'email' => 'john@example.com'
        ]);

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     * @group registration
     */
    public function guest_user_cannot_access_to_the_registration()
    {
        $response = $this->get('/register');

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     * @group registration
     */
    public function admin_can_register_new_users()
    {
        $user = User::factory()->make([
            'email' => 'test@example.com'
        ]);

        $response = $this->actingAs($user)->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
