<?php

namespace App\Http\Livewire;

use App\Form;
use App\FormJawaban as AppFormJawaban;
use App\FormPenjawab;
use App\FormPertanyaan;
use Livewire\Component;

class FormJawaban extends Component
{
    public $penjawab;
    public $jawaban;
    public $pertanyaan;
    public $formid;
    public $filter = false;
    public $filterkey = "";
    public $filtertype = "";
    public $filterval = "";
    public $filteropt;

    public function mount($formid)
    {
        $this->formid = $formid;
    }

    public function render()
    {
        if ($this->filterkey != null) {
            $form = FormPertanyaan::find($this->filterkey);
            $this->filtertype = $form->tipe;
            if ($form->tipe == 'select') {
                $explode = explode(',',$form->opsi);
                $this->filteropt = $explode;
            }
        }

        if ($this->filter) {
            $jawaban = AppFormJawaban::with(['penjawab','penjawab.jawaban', 'penjawab.jawaban.pertanyaan'])
                                    ->where('pertanyaan_id', $this->filterkey)
                                    ->where('jawaban','like', '%'.$this->filterval.'%')
                                    ->get();

            $this->jawaban = $jawaban;
        }else{
            $this->penjawab = FormPenjawab::with(['jawaban','jawaban.pertanyaan'])->where('form_id',$this->formid)->get();
        }

        $this->pertanyaan = FormPertanyaan::where('form_id',$this->formid)->get();

        return view('livewire.form-jawaban');
    }

    public function dofilter()
    {
        $this->filter = true;
    }

    public function resetfilter()
    {
        $this->filter = false;
    }
}
