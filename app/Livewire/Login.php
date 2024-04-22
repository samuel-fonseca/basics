<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public const HOME = '/';

    public $email;

    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loggedIn = auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ($loggedIn) {
            return redirect()->route('home');
        } else {
            session()->flash('message', 'Invalid credentials. Please try again.');
            $this->reset('password');
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
        return view('livewire.login');
    }
}
