<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class Item extends Component
{
    public $montre;

    public function mount($montre)
    {
        $this->montre = $montre;
    }

    public function increment()
    {
        $serialNumber = $this->montre['serial_number'];
        $cartItems = session()->get('cart', []);

        foreach ($cartItems as &$item) {
            if ($serialNumber == $item['serial_number']) {
                $item['quantity']++;
                break;
            }
        }

        session()->put('cart', $cartItems);
        $this->montre['quantity']++;

        // Emit event to notify parent or other components
        $this->dispatch('cartUpdated');
    }

    public function decrement()
    {
        $serialNumber = $this->montre['serial_number'];
        $cartItems = session()->get('cart', []);

        foreach ($cartItems as &$item) {
            if ($serialNumber == $item['serial_number']) {
                if ($item['quantity'] > 1) {
                    $item['quantity']--;
                    break;
                }
            }
        }

        session()->put('cart', $cartItems);
        if ($this->montre['quantity'] > 1) {
            $this->montre['quantity']--;
        }

        // Emit event to notify parent or other components
        $this->dispatch('cartUpdated');
    }

    public function delete()
    {
        $serialNumber = $this->montre['serial_number'];
        $cartItems = session()->get('cart', []);

        $cartItems = array_filter($cartItems, function ($item) use ($serialNumber) {
            return $item['serial_number'] !== $serialNumber;
        });

        // Update the cart session
        session()->put('cart', $cartItems);

        // Emit event to notify parent or other components
        $this->dispatch('cartUpdated');

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.cart.item');
    }
}
