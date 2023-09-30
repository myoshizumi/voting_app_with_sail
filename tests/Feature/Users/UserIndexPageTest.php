<?php

namespace Tests\Feature\Users;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group users
     */
    public function users_page_contains_user_index_livewire_component()
    {
        $userAdmin = User::factory()->admin()->create();

        $this->actingAs($userAdmin)
            ->get(route('user.index', $userAdmin))
            ->assertSeeLivewire('user-index');
    }

    /**
     * @test
     * @group users
     */
    public function user_cannot_access_to_the_users_page_if_they_dont_have_authority()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/users');

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     * @group users
     */
    public function guest_user_cannot_access_to_the_users_page()
    {
        $response = $this->get('/users');

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     * @group users
     */
    public function users_page_contains_user_info_and_delete_button()
    {
        $userAdmin = User::factory()->admin()->create();
        $user = User::factory()->create([
            'name' => 'JohnDoe',
            'email' => 'johndoe@example.com'
        ]);

        $this->actingAs($userAdmin)
            ->get(route('user.index', $userAdmin))
            ->assertSee('JohnDoe')
            ->assertSee('johndoe@example.com')
            ->assertSee('Delete');
    }
}