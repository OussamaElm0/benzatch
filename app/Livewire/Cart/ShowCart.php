<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class ShowCart extends Component
{
    public $cartItems = [];
    public $quantity = 0;
    public $total = 0;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cartItems = session()->get('cart', []);
        $this->quantity = array_sum(array_column($this->cartItems, 'quantity'));
        $this->total = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $this->cartItems));
    }

    public function render()
    {
        return view('livewire.cart.show-cart');
    }
}
