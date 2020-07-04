<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // optional
    // protected $table = 'articles';

    protected $fillable = [
        'title', 'body'
    ];
}
