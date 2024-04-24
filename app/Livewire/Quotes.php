<?php

namespace App\Livewire;

use Auth;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Quotes extends Component
{
    #[Computed]
    public function quotes(): Collection
    {
        return Auth::user()->quotes()->get();
    }

    /*******************************************
    * Component Actions
    *******************************************/

    public function delete($quoteId): void
    {
        Auth::user()->quotes()->where('id', $quoteId)->delete();
    }

    public function add(): void
    {
        $availableQuotes = Inspiring::quotes()->map(function ($quote) {
            [$quote, $author] = explode(' - ', $quote);

            return [
                'quote' => $quote,
                'author' => $author,
            ];
        })
            ->whereNotIn('author', Auth::user()->quotes()->pluck('author'));

        $quote = $availableQuotes->random();

        Auth::user()->quotes()->create([
            'quote' => $quote['quote'],
            'author' => $quote['author'],
        ]);

        session()->flash('message', 'Quote added!');
    }

    public function toggleFavorite($quoteId): void
    {
        $quote = Auth::user()->quotes()->where('id', $quoteId)->first();

        $quote->update([
            'is_favorite' => ! $quote->is_favorite,
        ]);
    }

    /**
     * Render.
     */
    public function render(): View
    {
        return view('livewire.quotes');
    }
}
