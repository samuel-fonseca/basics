<?php

namespace App\Livewire\Posts;

use App\Filament\Forms\PostForm;
use App\Models\Post;
use Auth;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(?Post $post): void
    {
        if ($post) {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return PostForm::make($form)->statePath('data');
    }

    public function create(): void
    {
        $this->validate();

        Auth::user()->posts()->create($this->data);

        $this->redirect(route('posts'));
    }

    public function render(): View
    {
        return view('livewire.posts.create');
    }
}
