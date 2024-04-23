<?php

namespace App\Filament\Forms;

use App\Enums\PostStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form as FilamentForm;

class CreatePostForm implements Form
{
    public static function make(FilamentForm $form): FilamentForm
    {
        return $form->schema([
            Split::make([
                Section::make([
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->live(true),

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
                ])->grow(false),
            ]),
        ]);
    }
}
