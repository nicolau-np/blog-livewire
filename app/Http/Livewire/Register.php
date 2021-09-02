<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $email;
    public $name;
    public $password;
    public $confirmpassword;

    public function store()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'name' => ['required', 'string', 'min:8', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'confirmpassword' => ['required', 'string', 'min:6', 'max:255'],
        ]);
        $password = Hash::make($this->password);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password,
        ];

        if(User::create($data)){
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}