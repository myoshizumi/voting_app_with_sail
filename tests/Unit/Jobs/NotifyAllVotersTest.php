<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdatedMailable;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

class NotifyAllVotersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group jobs
     */
    public function it_sends_an_email_to_all_voters()
    {
        $user = User::factory()->create([
            'email'  => 'test@example.com',
        ]);
        $userB = User::factory()->create([
            'email'  => 'test2@example.com',
        ]);

        $idea = Idea::factory()->create();

        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);

        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id
        ]);

        Mail::fake();

        NotifyAllVoters::dispatch($idea);

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function ($mail) {
            return $mail->hasTo('test@example.com')
                && $mail->build()->subject === 'An idea you voted for has a new status';
        });

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function ($mail) {
            return $mail->hasTo('test2@example.com')
                && $mail->build()->subject === 'An idea you voted for has a new status';
        });
    }
}