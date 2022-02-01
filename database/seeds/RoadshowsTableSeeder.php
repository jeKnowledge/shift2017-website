<?php

use Illuminate\Database\Seeder;
use App\Roadshow;

class RoadshowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $edition = App\Edition::find(1);

        Roadshow::create([
            'edition_id' => $edition->id,
        ]);
    }
}
