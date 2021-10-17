<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'author',
        'NIM',
        'title',
        'content',
        'status',
        'schedule',
        'feedback',
    ];
}
