<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $casts = [
        'questions' => 'array',
    ];
}
