<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function testRendersSuccessfully()
    {
        Livewire::test(Register::class)
            ->assertStatus(200);
    }

    public function testCanRegister()
    {
        $user = User::where('email', 'john.doe@example.org')->first();
        $this->assertNull($user);

        Livewire::test(Register::class)
            ->set('name', 'John Doe')
            ->set('email', 'john.doe@example.org')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertRedirect('/login');

        $user = User::where('email', 'john.doe@example.org')->first();
        $this->assertNotNull($user);
        $this->assertEquals('John Doe', $user->name);
    }

    public function testEmailMustBeUnique()
    {
        $user = User::factory()->create();

        $test = Livewire::test(Register::class)
            ->set('name', 'John Doe')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register');

        $test->assertHasErrors(['email' => 'required']);

        $test->set('email', $user->email)
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }
}
