<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register Account')]
class Register extends Component
{
    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public function register()
    {
        $validation = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

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
        return view('livewire.register');
    }
}
