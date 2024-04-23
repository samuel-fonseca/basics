<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $model,
        public string $label,
        public string $type = 'text',
        public string $class = '',
        public string $placeholder = '',
        public bool $required = false,
        public bool $disabled = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.text');
    }
}
