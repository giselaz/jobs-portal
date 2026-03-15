<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TextInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $value = null,
        public ?string $name = null,
        public ?string $placeholder = null,
        public ?string $formRef = null,
        public string $type
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.text-input');
    }
}
