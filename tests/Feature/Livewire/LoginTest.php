<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testRendersSuccessfully()
    {
        Livewire::test(Login::class)
            ->assertStatus(200);
    }

    public function testCanLogin()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }
}
