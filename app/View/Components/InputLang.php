<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputLang extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $with,
        public string $type,
        public object $item,
        public string $name,
        public string $title,
        public string $locale,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputLang');
    }
}