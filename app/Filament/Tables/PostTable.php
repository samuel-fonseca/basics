<?php

namespace App\Filament\Tables;

use App\Enums\PostStatus;
use App\Models\Post;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table as FilamentTable;

class PostTable implements Table
{
    public static function make(FilamentTable $table): FilamentTable
    {
        return $table
            ->query(Post::query()->whereBelongsTo(auth()->user()))
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('summary')
                    ->searchable(),

                SelectColumn::make('status')
                    ->sortable()
                    ->options(
                        collect(PostStatus::cases())
                            ->mapWithKeys(fn ($status) => [$status->value => $status->name])
                    ),

                TextColumn::make('published_at')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(
                        collect(PostStatus::cases())
                            ->mapWithKeys(fn ($status) => [$status->value => $status->name])
                    ),
            ])
            ->actions([
                Action::make('edit')
                    ->name('Edit')
                    ->icon('heroicon-o-pencil')
                    ->url(fn (Post $post) => route('posts.update', $post)),

                Action::make('delete')
                    ->name('Delete')
                    ->icon('heroicon-o-trash')
                    ->color(Color::Red)
                    ->requiresConfirmation()
                    ->action(fn (Post $post) => $post->delete()),
            ])
            ->headerActions([
                Action::make('create')
                    ->name('New Post')
                    ->icon('heroicon-o-plus')
                    ->url(route('posts.create')),
            ]);
    }
}
