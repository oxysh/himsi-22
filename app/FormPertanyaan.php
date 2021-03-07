<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPertanyaan extends Model
{
    protected $fillable = ['form_id','tipe','pertanyaan','opsi','mandatory'];

    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    public function jawaban()
    {
        return $this->hasMany('App\FormJawaban','pertanyaan_id','id');
    }
    
}
