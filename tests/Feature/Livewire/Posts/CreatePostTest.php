<?php

namespace Tests\Feature\Livewire\Posts;

use App\Livewire\Posts\CreatePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    public function testItRendersSuccessfully()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(CreatePost::class)
            ->assertStatus(200);
    }

    public function testItCanCreatePost()
    {
        $posts = Post::all();
        $this->assertEmpty($posts);

        $this->actingAs($user = User::factory()->create());

        Livewire::test(CreatePost::class)
            ->set('data', [
                'title' => 'foo bar',
                'slug' => 'foo-bar',
                'content' => 'This is my first post content',
                'status' => 'published',
                'published_at' => now(),
            ])
            ->call('create');

        $posts = Post::all();
        $this->assertCount(1, $posts);
        $this->assertEquals('foo bar', $posts->first()->title);
        $this->assertEquals($user->id, $posts->first()->user_id);
    }
}
