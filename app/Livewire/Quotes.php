<?php

namespace App\Livewire;

use Illuminate\Foundation\Inspiring;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Quotes extends Component
{
    #[Computed]
    public function quotes()
    {
        return auth()->user()->quotes()->get();
    }

    /*******************************************
    * Component Actions
    *******************************************/

    public function delete($quoteId)
    {
        auth()->user()->quotes()->where('id', $quoteId)->delete();
    }

    public function add()
    {
        $availableQuotes = Inspiring::quotes()->map(function ($quote) {
            list($quote, $author) = explode(' - ', $quote);

            return [
                'quote' => $quote,
                'author' => $author,
            ];
        })
        ->whereNotIn('author', auth()->user()->quotes()->pluck('author'));

        $quote = $availableQuotes->random();

        auth()->user()->quotes()->create([
            'quote' => $quote['quote'],
            'author' => $quote['author'],
        ]);

        session()->flash('message', 'Quote added!');
    }

    public function toggleFavorite($quoteId)
    {
        $quote = auth()->user()->quotes()->where('id', $quoteId)->first();

        $quote->update([
            'is_favorite' => ! $quote->is_favorite,
        ]);
    }

    /**
     * Render.
     */
    public function render()
    {
        return view('livewire.quotes');
    }
}
