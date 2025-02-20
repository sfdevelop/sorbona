<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputLiveWier extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $model, public string $title, public string $type = 'text')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-live-wier');
    }
}
