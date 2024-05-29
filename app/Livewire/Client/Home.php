<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;

class Home extends Component
{
    // get all product
    public $products;
    public function render()
    {
        $this->products = Product::orderBy('id', 'desc')->get();

        return view('livewire.client.home');
    }
}
