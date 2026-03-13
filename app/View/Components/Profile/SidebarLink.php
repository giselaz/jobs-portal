<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Language extends Component
{
    /**
     * Create a new component instance.
     */
    protected $types = ['link', 'button'];
    public function __construct(public ?string $route = '', public $type = 'link', public ?string $tab = '')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.candidate.sidebar.navlink');
    }
}
