<?php

namespace App\Filament\Forms;

use Filament\Forms\Form as FilamentForm;

interface Form
{
    public static function make(FilamentForm $form): FilamentForm;
}
