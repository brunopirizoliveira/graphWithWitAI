<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $table = 'sentence';
    protected $fillable = [
        'title', 'entities', 'intent',
    ];
}
