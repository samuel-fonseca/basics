<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'author',
        'user_id',
        'is_favorite',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
