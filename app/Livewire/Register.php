<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register Account')]
class Register extends Component
{
    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email|unique:users,email')]
    public $email;

    #[Rule('required|confirmed')]
    public $password;

    #[Rule('required')]
    public $password_confirmation;

    public function register()
    {
        $this->validate();

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            session()->flash('message', 'Account created successfully!');

            return redirect()->route('login');
        } catch (\Exception $e) {
            $this->addError('email', 'Something went wrong. Please try again.');
        }
    }

    public function mount()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.register')
            ->layout('components.layouts.guest');
    }
}
