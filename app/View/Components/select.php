<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    /**
     * @param  array  $categories
     * @param  object  $item
     * @param  string  $title
     * @param  string  $name
     */
    public function __construct(public array $categories, public object $item, public string $title, public string $name) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.select');
    }
}
