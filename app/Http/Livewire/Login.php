<?php

namespace App\Http\Livewire;

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

       /* $credencials = $request->only('email', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('admin');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }*/
    }

    public function render()
    {
        return view('livewire.login');
    }
}