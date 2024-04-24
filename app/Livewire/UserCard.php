<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UserCard extends Component
{
    #[Computed]
    public function user(): User
    {
        return auth()->user();
    }

    public function render(): View
    {
        return view('livewire.user-card');
    }
}
