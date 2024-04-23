<?php

namespace App\Filament\Tables;

use Filament\Tables\Table as FilamentTable;

interface Table
{
    public static function make(FilamentTable $table): FilamentTable;
}
