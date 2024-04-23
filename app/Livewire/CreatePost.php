<?php

namespace App\Livewire;

use App\Enums\PostStatus;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
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
        return $form->schema([
            Split::make([
                Section::make([
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->live(true)
                        ->afterStateUpdated(fn ($state) => $this->data['slug'] = str($state)->slug()),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required(),

                    MarkdownEditor::make('content')
                        ->label('Content')
                        ->required(),
                ]),

                Section::make([
                    Select::make('status')
                        ->label('Status')
                        ->default(PostStatus::Draft->value)
                        ->options(
                            collect(PostStatus::cases())
                                ->mapWithKeys(fn ($status) => [$status->value => $status->name])
                        ),

                    DateTimePicker::make('published_at')
                        ->label('Date Published')
                        ->time(false),
                ])->grow(false)
            ])
        ])->statePath('data');
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
