<?php

namespace Tests\Feature\Livewire\Posts;

use App\Livewire\Posts\UpdatePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersSuccessfully()
    {
        $this->actingAs($user = User::factory()->create());
        $post = Post::factory()->create(['user_id' => $user->id]);

        Livewire::test(UpdatePost::class, ['post' => $post])
            ->assertStatus(200);
    }

    public function testUserMustOwnPost()
    {
        $this->actingAs($user = User::factory()->create());
        $post = Post::factory()->create();

        Livewire::test(UpdatePost::class, ['post' => $post])
            ->assertForbidden();
    }

    public function testItCanUpdatePost()
    {
        $this->actingAs($user = User::factory()->create());
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->assertNotEquals('foo bar', $post->title);

        Livewire::test(UpdatePost::class, ['post' => $post])
            ->set('data', [
                ...$post->toArray(),
                'title' => 'foo bar',
            ])
            ->call('update');

        $post->refresh();
        $this->assertEquals('foo bar', $post->title);
    }
}
