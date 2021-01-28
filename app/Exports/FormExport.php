<?php

namespace App\Exports;

use App\Form;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FormExport implements FromView
{
    public $id;

    function __construct($id) {
        $this->id = $id;
      }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $form = Form::with(['pertanyaan','penjawab','penjawab.jawaban', 'penjawab.jawaban.pertanyaan'])->find($this->id);
        
        return view('form.excel', [
            'form' => $form
        ]);
    }
}
