<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormJawaban extends Model
{
    protected $fillable = ['pertanyaan_id','penjawab_id','jawaban'];

    public function pertanyaan()
    {
        return $this->belongsTo('App\FormPertanyaan','pertanyaan_id','id');
    }

    public function penjawab()
    {
        return $this->belongsTo('App\FormPenjawab','penjawab_id','id');
    }
    
}
