<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(EditionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(RoadshowsTableSeeder::class);
        // $this->call(RoadTripsTableSeeder::class);
        // $this->call(QuizesTableSeeder::class);
        // $this->call(QuestionsTableSeeder::class);
        // $this->call(ProjectsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(FAQsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(ContestsTableSeeder::class);
    }
}
