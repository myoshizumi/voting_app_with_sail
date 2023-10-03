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
        $response->assertSee("register");
        $response->assertSee("Name");
        $response->assertSee("Confirm Password");
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
        $userAdmin = User::factory()->admin()->create();

        $response = $this->actingAs($userAdmin)->post('/register', [
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}