<?php

namespace App\Livewire;

use App\Filament\Forms\CreatePostForm;
use App\Models\Post;
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
        return CreatePostForm::make($form)->statePath('data');
    }

    public function updatedDataTitle($value): void
    {
        $this->data['slug'] = str($value)->slug();
    }

    public function create(): void
    {
        $this->validate();

        auth()->user()->posts()->create($this->data);

        $this->redirect(route('posts'));
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }
}
