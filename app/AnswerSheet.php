<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Examination;
use App\Question;

class AnswerSheet extends Model
{
    protected $fillable = ['answers'];

	protected $casts = [
        'answers' => 'array',
    ]; 

    public function examination()
    {
    	return $this->belongsTo(Examination::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function calcScore()
    {
    	$questions = $this->examination->questions;
    	$right_count = 0;

    	foreach ($this->answers as $qid => $myanswer)
    	{
    		$question = array_first($questions, function($question, $key) use($qid) {
    			return $question->id == $qid; 
    		});

    		if (!is_null($question) && $question->answer == $myanswer) {
    			$right_count++;
    		}
    	}
    	return $right_count;
    }   
}
