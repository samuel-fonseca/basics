<?php

namespace App\Livewire;

use Livewire\Component;

class Posts extends Component
{
    public $posts;

    public function mount(): void
    {
        $this->posts = auth()->user()->posts;
    }

    public function render()
    {
        return view('livewire.posts');
    }
}
