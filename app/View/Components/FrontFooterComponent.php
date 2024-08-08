<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Service; // Import Service model
use App\Models\Category; // Import Category model

class FrontFooterComponent extends Component
{
    public $models;
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Fetch services and categories from the database
        $this->models = Service::all();
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string
    {
        return view('components.front-footer-component');
    }
}
