<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProduct extends Component
{
    public $search = '';

    public function render()
    {
        $found_products = [];
        if ($this->search != '') {
            $found_products = Product::where('title', 'LIKE', '%'.$this->search.'%')->take(5)->get();
        }
        return view('client.livewire.search-product', compact('found_products'));
    }
}
