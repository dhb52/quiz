<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Examination;
use App\Question;

class AnswerSheet extends Model
{
	protected $casts = [
        'answers' => 'array',
    ]; 

    public function examination()
    {
    	return $this->belongsTo(Examination::class);
    }

    public function calcScore()
    {
    	$question_ids = $this->examination->questions;
    	$questions = Question::whereIn('id', $question_ids);
    	$right_count = 0;
    	foreach ($this->answers as idx, myanswer)
    	{
    		$right_answer = array_first($questions, function($value, $key) use($idx) {
    			return $key == $idx; 
    		});
    		if ($right_answer.answer == myanswer) {
    			++right_count;
    		}
    	}
    	return 0;
    }   
}
