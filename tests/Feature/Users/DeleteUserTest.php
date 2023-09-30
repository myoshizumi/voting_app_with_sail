<?php

namespace Tests\Feature\Users;

use App\Http\Livewire\DeleteUser;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * @test
     * @group users
     */
    public function the_component_can_render()
    {
        $component = Livewire::test(DeleteUser::class);

        $component->assertStatus(200);
    }

    /** 
     * @test
     * @group users
     */
    public function shows_delete_user_livewire_component_when_user_is_admin()
    {
        $userAdmin = User::factory()->admin()->create();

        $this->actingAs($userAdmin)
            ->get(route('user.index', $userAdmin))
            ->assertSeeLivewire('delete-user');
    }

    /** 
     * @test
     * @group users
     */
    public function deleting_a_user_works_when_user_is_admin()
    {
        $userAdmin = User::factory()->admin()->create();
        $user = User::factory()->create();

        Livewire::actingAs($userAdmin)
            ->test(DeleteUser::class, [
                'user' => $user,
            ])
            ->call('deleteUser')
            ->assertRedirect(route('user.index'));

        $this->assertEquals(1, User::count());
    }

    /** 
     * @test
     * @group users
     */
    public function deleting_a_user_with_votes_works_when_user_is_admin()
    {
        $userAdmin = User::factory()->admin()->create();
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id
        ]);

        Livewire::actingAs($userAdmin)
            ->test(DeleteUser::class, [
                'user' => $user,
            ])
            ->call('deleteUser')
            ->assertRedirect(route('user.index'));

        $this->assertEquals(0, Vote::count());
        $this->assertEquals(0, idea::count());
    }

    /** 
     * @test
     * @group users
     */
    public function deleting_a_user_with_comments_works_when_user_is_admin()
    {
        $userAdmin = User::factory()->admin()->create();
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Comment::factory()->create([
            'idea_id' => $idea->id
        ]);

        Livewire::actingAs($userAdmin)
            ->test(DeleteUser::class, [
                'user' => $user,
            ])
            ->call('deleteUser')
            ->assertRedirect(route('user.index'));

        $this->assertEquals(0, Comment::count());
        $this->assertEquals(0, idea::count());
    }
}
