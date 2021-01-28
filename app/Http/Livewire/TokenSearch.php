<?php

namespace App\Http\Livewire;

use App\FormPenjawab;
use Livewire\Component;

class TokenSearch extends Component
{

    public $token;
    public $result = null;

    public function render()
    {
        return view('livewire.token-search');
    }

    public function cari()
    {
        $this->result = FormPenjawab::with(['form','jawaban','jawaban.pertanyaan'])
                                ->where('token',$this->token)->first();
    }
}
