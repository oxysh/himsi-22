<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanCurhat extends Model
{
    protected $fillable = ['curhat_id','chat','psdm'];

    public function curhat()
    {
        return $this->belongsTo('App\Curhat');
    }
}
