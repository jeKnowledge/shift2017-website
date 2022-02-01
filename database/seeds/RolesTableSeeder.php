<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'jury',
        ]);
        DB::table('roles')->insert([
            'name' => 'gold-partner',
        ]);
        DB::table('roles')->insert([
            'name' => 'silver-partner',
        ]);
        DB::table('roles')->insert([
            'name' => 'shifter',
        ]);
        DB::table('roles')->insert([
            'name' => 'staff',
        ]);
    }
}
