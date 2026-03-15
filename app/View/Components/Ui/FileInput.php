<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FileInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $processing = false,
        public $name = '',
        public $accept = '.pdf,.doc,.docx'
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.file-input');
    }
}
