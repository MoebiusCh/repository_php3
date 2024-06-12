<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cart = [];

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    #[On('cartUpdated')]
    public function updateCart()
    {
        $this->cart = session()->get('cart', []);
    }
    public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
            session()->put('cart', $this->cart);
            $this->dispatch('cartUpdated')->self();
        }
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId]) && $this->cart[$productId]['quantity'] > 1) {
            $this->cart[$productId]['quantity']--;
            session()->put('cart', $this->cart);
            $this->dispatch('cartUpdated')->self();
        } elseif ($this->cart[$productId]['quantity'] == 1) {
            unset($this->cart[$productId]);
            session()->put('cart', $this->cart);
            $this->dispatch('cartUpdated')->self();
        }
    }
    public function getTotalAmount()
    {
        $total = 0;
        foreach ($this->cart as $product) {
            $total += ($product['price'] * $product['quantity']) + 32000;
        }
        return $total;
    }
    public function render()
    {
        return view('livewire.shopping-cart', [
            'cart' => $this->cart,
            'totalAmount' => $this->getTotalAmount(),
        ]);
    }
}
