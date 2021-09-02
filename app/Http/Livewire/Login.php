<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    public function logar(){
        $this->validate(
            [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );




        if (Auth::attempt(array('email'=>$this->email, 'password'=>$this->password))) {
            dd('certo');
        } else {
            dd('erro');
        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}