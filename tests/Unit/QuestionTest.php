<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Question;

class QuestionTest extends TestCase
{
	use DatabaseMigrations;
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
        $options = [
        	'option 1',
        	'option 2',
        	'option 3',
        ];
        $q1 = factory(Question::class)->create([
        	'type_id' => 1, 
        	'options' => $options, 
        	'answer' => 'ab',
        	]);
        
    }
}
