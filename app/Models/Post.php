<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
        'status' => PostStatus::class,
    ];

    protected $guarded = [];

    /*******************************************
    * Relationships
    *******************************************/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*******************************************
    * Accessors
    *******************************************/

    public function getSummaryAttribute(): string
    {
        // keep only the first words and remove any non-word characters
        return str($this->content)->words(30)
            ->replaceMatches('/\W+\ /', '')
            ->__toString();
    }
}
