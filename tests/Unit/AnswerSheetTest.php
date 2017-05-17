<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Question;
use App\Examination;
use App\AnswerSheet;
use App\User;

class AnswerSheetTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSheet()
    {
        $this->assertTrue(true);

   

    	$exam = factory(Examination::class)->create(['name' => 'My Exam']);
    	$q1 = factory(Question::class)->create(['answer' => 'abc']);
    	$q2 = factory(Question::class)->create(['answer' => 'abd']);
    	$exam->questions()->attach([$q1->id, $q2->id]);

    	$user = factory(User::class)->create();

    	$answers = [
    		$q1->id => 'ab',
    		$q2->id => 'abd',
    	];
    	$sheet = factory(AnswerSheet::class)->make(['answers' => $answers]);
    	$sheet->user()->associate($user);
    	$sheet->examination()->associate($exam);

    	$this->assertEquals($sheet->user_id, $user->id);
    	$this->assertEquals($sheet->examination_id, $exam->id);

    	$this->assertEquals($sheet->calcScore(), 1);
    	
    	$sheet->answers = [
    		$q1->id => 'abc',
    		$q2->id => 'abd',
    	];
    	$this->assertEquals($sheet->calcScore(), 2);
    }
}
