<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class AddToCartButton extends Component
{
    public $productId;
    public function mount($productId)
    {
        $this->productId = $productId;
    }
    public function addToCart()
    {
        $product = Product::find($this->productId);
        if (!$product) {
            session()->flash('error', 'Product not found.');
            return;
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$this->productId])) {
            $cart[$this->productId]['quantity']++;
        } else {
            $cart[$this->productId] = [
                'title' => $product->title,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);
        // Emit an event to update the cart component
        $this->dispatch('cartUpdated');
        return redirect()->route('cart');
    }
    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
