<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserTest extends TestCase
{
    use  RefreshDatabase;

    /**
     * @test
     * @group user
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_charactor_a()
    {
        $user = User::factory()->create([
            'name' => "Andrew",
            "email" => "andrew@example.com"
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals("https://www.gravatar.com/avatar/" . md5($user->email) . "?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png", $gravatarUrl);

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }

    /**
     * @test
     * @group user
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_charactor_0()
    {
        $user = User::factory()->create([
            'name' => "Zack",
            "email" => "0Zack@example.com"
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals("https://www.gravatar.com/avatar/" . md5($user->email) . "?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png", $gravatarUrl);

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }

    /**
     * @test
     * @group user
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_charactor_9()
    {
        $user = User::factory()->create([
            'name' => "Zack",
            "email" => "9Zack@example.com"
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals("https://www.gravatar.com/avatar/" . md5($user->email) . "?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png", $gravatarUrl);

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }

    /**
     * @test
     * @group user
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_charactor_z()
    {
        $user = User::factory()->create([
            'name' => "Zack",
            "email" => "Zack@example.com"
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals("https://www.gravatar.com/avatar/" . md5($user->email) . "?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png", $gravatarUrl);
        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }
}
