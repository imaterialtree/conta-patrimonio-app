<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class progress_bar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $min = 0,
        public $progress,
        public $total
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-bar');
    }
}
