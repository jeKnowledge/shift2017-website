<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Question::create([
            'question' => 'Quem é o maior',
            'answer' => 'Gabriel Oliveira',
            'quiz_id' => 1,
        ]);
    }
}
