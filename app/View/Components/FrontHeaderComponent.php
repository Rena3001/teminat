<?php

namespace App\View\Components;

use App\Models\Lang;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $settings;

    /**
     * Create a new component instance.
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $langs = Lang::all();
        return view('components.front-header-component', compact('langs'));
    }
}
