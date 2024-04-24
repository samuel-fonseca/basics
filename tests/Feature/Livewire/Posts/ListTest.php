<?php

namespace Tests\Feature\Livewire\Posts;

use App\Livewire\Posts\ListPosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class ListTest extends TestCase
{
    use RefreshDatabase;

    public function testRendersSuccessfully()
    {
        // must be logged in
        $this->actingAs(User::factory()->create());

        Livewire::test(ListPosts::class)
            ->assertStatus(200);
    }

    public function testTableGetsOnlyUsersPost()
    {
        $this->actingAs($user = User::factory()->create());

        $posts = Post::factory(3)->create([
            'user_id' => $user->id,
        ]);

        $notMyUserPosts = Post::factory(2)->create();

        Livewire::test(ListPosts::class)
            ->assertCanSeeTableRecords($posts)
            ->assertCanNotSeeTableRecords($notMyUserPosts);
    }
}
