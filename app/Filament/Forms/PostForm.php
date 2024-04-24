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
use Filament\Forms\Get;
use Filament\Forms\Set;

class PostForm implements Form
{
    public static function make(FilamentForm $form): FilamentForm
    {
        return $form->schema([
            Split::make([
                Section::make([
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->live(true)
                        ->afterStateUpdated(fn ($state, Set $set) => $set('slug', str($state)->slug())),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->readOnly(),

                    MarkdownEditor::make('content')
                        ->label('Content')
                        ->required()
                        ->columnSpan(2),
                ])
                    ->columns(2),

                Section::make([
                    Select::make('status')
                        ->label('Status')
                        ->default(PostStatus::Draft->value)
                        ->options(PostStatus::forSelect())
                        ->live(),

                    DateTimePicker::make('published_at')
                        ->label('Date Published')
                        ->time(false)
                        ->hidden(fn (Get $get) => $get('status') !== PostStatus::Published->value),
                ])->grow(false),
            ]),
        ]);
    }
}
