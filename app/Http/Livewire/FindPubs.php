<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class FindPubs extends Component
{

    public $pubs;

    public $listeners = ['loadDiv'=>"loadPubs"];

    public function loadPubs($id_user){
        $this->pubs = User::find($id_user);
    }

    public function render()
    {
        return view('livewire.find-pubs');
    }
}
