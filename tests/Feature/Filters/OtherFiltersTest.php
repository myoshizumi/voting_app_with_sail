<?php

namespace Tests\Feature\Filters;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\IdeasIndex;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherFiltersTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * @test
     * @group otherFilters
     */
    public function top_voted_filter_works()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $userC = User::factory()->create();


        $ideaOne = Idea::factory()->create();

        $ideaTwo = Idea::factory()->create();

        Vote::factory()->create([
            'idea_id' => $ideaOne->id,
            'user_id' => $user->id
        ]);

        Vote::factory()->create([
            'idea_id' => $ideaOne->id,
            'user_id' => $userB->id
        ]);

        Vote::factory()->create([
            'idea_id' => $ideaTwo->id,
            'user_id' => $userC->id
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('filter', 'Top Voted')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 2
                    && $ideas->first()->votes()->count() === 2
                    && $ideas->get(1)->votes()->count() === 1;
            });
    }

    /** 
     * @test
     * @group otherFilters
     */
    public function my_ideas_filter_works_correctly_when_user_logged_in()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $ideaOne = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
        ]);

        $ideaThree = Idea::factory()->create([
            'user_id' => $userB->id,
            'title' => 'My Third Idea',
        ]);

        Livewire::actingAs($user)
            ->test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 2
                    && $ideas->first()->title === "My Second Idea"
                    && $ideas->get(1)->title === "My First Idea";
            });
    }

    /** 
     * @test
     * @group otherFilters
     */
    public function my_ideas_filter_works_correctly_when_user_is_not_logged_in()
    {
        Livewire::test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertRedirect(route('login'));
    }

    /** 
     * @test
     * @group otherFilters
     */
    public function my_ideas_filter_works_correctly_with_categories_filter()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My Second Idea',
        ]);

        $ideaThree = Idea::factory()->create([
            'category_id' => $categoryTwo->id,
            'title' => 'My Third Idea',
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('category', 'Category 1')
            ->set('filter', 'My Ideas')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 2
                    && $ideas->first()->title === 'My Second Idea'
                    && $ideas->get(1)->title === 'My First Idea';
            });
    }

    /** 
     * @test
     * @group otherFilters
     */
    public function no_filter_works_correctly()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My Second Idea',
        ]);

        $ideaThree = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My Third Idea',
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('filter', 'No Filter')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 3
                    && $ideas->first()->title === "My Third Idea"
                    && $ideas->get(1)->title === "My Second Idea";
            });
    }
}