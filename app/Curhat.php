<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curhat extends Model
{
    protected $fillable = ['token','quote','selesai','dibalas','kategori'];
    
    public function chat()
    {
        return $this->hasMany('App\PesanCurhat', 'curhat_id', 'id');
    }

    
}
