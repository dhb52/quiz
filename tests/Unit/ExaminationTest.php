<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Examination;
use App\Question;
use DB;

class ExaminationTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExamination()
    {
        $q1 = factory(Question::class)->create(['answer' => 'd']);
        $q2 = factory(Question::class)->create(['answer' => 'abc']);
        $this->assertEquals($q1->answer, 'd');
        $this->assertEquals($q2->answer, 'abc');

        $exam = Examination::create(['name' => 'First Exam']);

        $exam = factory(Examination::class)->create();
        $exam->questions()->attach([$q1->id, $q2->id]);
        $result = DB::table('examination_question')
                        ->select(DB::raw('count(*) as item_count'))
                        ->where('examination_id', $exam->id)
                        ->first();
        $this->assertEquals($result->item_count, 2);
    }

}
