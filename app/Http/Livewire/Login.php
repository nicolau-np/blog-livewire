<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $form = [
        'email',
        'password'
    ];

    public function logar()
    {
        $this->validate(
            [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}