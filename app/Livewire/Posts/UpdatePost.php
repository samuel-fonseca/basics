<?php

namespace App\Livewire\Posts;

use App\Filament\Forms\PostForm;
use App\Models\Post;
use Auth;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class UpdatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(Post $post): void
    {
        $this->ensureUserOwnsPost($post);
        $this->form->fill($post->toArray());
    }

    public function form(Form $form): Form
    {
        return PostForm::make($form)->statePath('data');
    }

    public function update(): void
    {
        $this->validate();
        Auth::user()->posts()->find($this->data['id'])->update($this->data);
        $this->redirect(route('posts'));
    }

    public function render()
    {
        return view('livewire.posts.update');
    }

    /*******************************************
    * Internal
    *******************************************/

    protected function ensureUserOwnsPost(Post $post): void
    {
        if (auth()->id() !== $post->user_id) {
            abort(403);
        }
    }
}
