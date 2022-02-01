<?php

use Illuminate\Database\Seeder;
use App\Quiz;

class QuizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roadshow = App\Roadshow::find(1);

        Quiz::create([
            'roadshow_id' => $roadshow->id,
        ]);
    }
}
