<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerSheet extends Model
{
	protected $casts = [
        'answers' => 'array',
    ]; 

    public function calcScore()
    {
    	return 0;
    }   
}
