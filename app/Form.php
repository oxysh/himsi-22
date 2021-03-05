<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['judul','pemilik','deadline','terkunci','token', 'bitly'];
    
    public function pertanyaan()
    {
        return $this->hasMany('App\FormPertanyaan', 'form_id', 'id');
    }

    public function penjawab()
    {
        return $this->hasMany('App\FormPenjawab','form_id','id');
    }
}
