<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPenjawab extends Model
{
    protected $fillable = ['form_id','token'];

    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    public function jawaban()
    {
        return $this->hasMany('App\FormJawaban','penjawab_id','id');
    }
}
