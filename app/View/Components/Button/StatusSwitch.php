<?php

namespace App\View\Components\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSwitch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $model)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.status-switch');
    }
}
