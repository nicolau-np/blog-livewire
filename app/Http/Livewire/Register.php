<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{

    public $email;
    public $name;
    public $password;
    public $confirmpassword;

    public function render()
    {
        return view('livewire.register');
    }
}