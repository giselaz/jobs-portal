<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Breadcrumbs extends Component
{
    /**
     * Create a new component instance.
     */
    protected static $links = [];
    public function __construct()
    {
        //
    }
    public  static function add($title, $url = null)
    {
        self::$links[] = [
            'title' => $title,
            'url' => $url
        ];
    }

    public static function all()
    {
        return self::$links;
    }

    public static function clear()
    {
        return self::$links = [];
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.breadcrumbs');
    }
}
