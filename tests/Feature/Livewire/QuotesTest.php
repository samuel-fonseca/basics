<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Quotes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class QuotesTest extends TestCase
{
    use RefreshDatabase;

    public function testRendersSuccessfully()
    {
        $this->actingAs(\App\Models\User::factory()->create());
        Livewire::test(Quotes::class)
            ->assertStatus(200);
    }

    public function testItCanAddQuote()
    {
        $this->actingAs($user = \App\Models\User::factory()->create());
        Livewire::test(Quotes::class)
            ->call('add')
            ->assertSet('quotes', $user->quotes);
    }

    public function testItCanToggleFavorite()
    {
        $this->actingAs($user = \App\Models\User::factory()->create());
        $quote = $user->quotes()->create([
            'quote' => 'Quote',
            'author' => 'Author',
        ]);

        Livewire::test(Quotes::class)
            ->call('toggleFavorite', $quote->id)
            ->assertSet('quotes', $user->quotes);
    }

    public function testItCanDelete()
    {
        $this->actingAs($user = \App\Models\User::factory()->create());
        $quote = $user->quotes()->create([
            'quote' => 'Quote',
            'author' => 'Author',
        ]);

        Livewire::test(Quotes::class)
            ->call('delete', $quote->id)
            ->assertSet('quotes', $user->quotes);
    }
}
