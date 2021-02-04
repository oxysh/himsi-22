<?php

namespace App\Http\Livewire;

use App\FormJawaban;
use App\FormPenjawab;
use Livewire\Component;

class TokenSearch extends Component
{

    public $token;
    public $result = null;

    public $p_lolos = "";
    public $p_bidang = "";
    public $p_line = "";

    public function render()
    {
        return view('livewire.token-search');
    }

    public function cari()
    {
        $this->result = FormPenjawab::with(['form','jawaban','jawaban.pertanyaan'])
                                ->where('token',$this->token)->first();

        $this->p_lolos = FormJawaban::where('pertanyaan_id',5)->where('penjawab_id',$this->result->id)->first()->jawaban;
        $this->p_bidang = FormJawaban::where('pertanyaan_id',6)->where('penjawab_id',$this->result->id)->first()->jawaban;
        $this->p_line = FormJawaban::where('pertanyaan_id',7)->where('penjawab_id',$this->result->id)->first()->jawaban;
    
    }
}
