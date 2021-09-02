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

        $credencials = [
            'email'=>$this->email,
            'password' =>$this->password,
        ];

        Auth::attempt($credencials);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.login');
    }
}