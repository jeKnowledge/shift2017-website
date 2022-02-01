<?php

use Illuminate\Database\Seeder;
use App\Edition;

class EditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Edition::create(['year' => '2017', 'active' => true]);
    }
}
