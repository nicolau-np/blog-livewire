<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $contador = 0;

    public function increment()
    {
        $this->contador++;
    }

    public function decrement()
    {
        $this->contador--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}