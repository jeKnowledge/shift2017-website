<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\RoadTrip;

class RoadTripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RoadTrip::create([
            'location' => 'Dummy City',
            'institution' => 'Dummy University',
            'password' => bcrypt('dummypass'),
            'date' => Carbon::now(),
            'roadshow_id' => 1,
        ]);
    }
}
