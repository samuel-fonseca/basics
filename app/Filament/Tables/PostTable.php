<?php

namespace App\Filament\Tables;

use App\Enums\PostStatus;
use App\Models\Post;
use Auth;
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
            ->query(Auth::user()->posts()->getQuery())
            ->heading('Posts')
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('summary')
                    ->searchable(),

                SelectColumn::make('status')
                    ->sortable()
                    ->options(PostStatus::forSelect()),

                TextColumn::make('published_at')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(PostStatus::forSelect()),
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
            ])
            ->defaultSort('created_at', 'desc');
    }
}
