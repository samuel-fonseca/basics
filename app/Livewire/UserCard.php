<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class UserCard extends Component
{
    #[Computed]
    public function user()
    {
        return auth()->user();
    }

    public function render()
    {
        return view('livewire.user-card');
    }
}
