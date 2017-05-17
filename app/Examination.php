<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;

class Examination extends Model
{
	protected $fillable = ['name'];

	public function questions()
	{
		return $this->belongsToMany(Question::class, 'examination_question');
	}

    // protected $casts = [
    //     'questions' => 'array',
    // ];
}
