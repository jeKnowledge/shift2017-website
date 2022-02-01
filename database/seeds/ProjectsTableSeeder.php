<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Project::create([
            'name' => 'dummyproject',
            'description' => 'dummydescription',
            'repository' => 'dummyrepository',
            'team_id' => '1'
        ]);
    }
}
