<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Edition;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'John Doe',
            'email' => 'admin@shift.com',
            'password' => bcrypt('secret'),
        ]);

        $adminRole = Role::whereName('admin')->first();

        $admin->roles()->attach($adminRole);

        if(App::environment('staging', 'local')){

            $shifter = User::create([
                'name' => 'John Doe',
                'email' => 'shifter@shift.com',
                'password' => bcrypt('secret'),
            ]);

            $info = [];
            $shifter->shifter()->create($info);

            $shifterRole = Role::whereName('shifter')->first();

            $shifter->roles()->attach($shifterRole);

            $edition = Edition::where('year',Carbon::now()->year)->first();

            $edition->partners()->create([
                'name' => 'Company John Doe',
                'email' => 'gold@shift.com',
                'website' => 'Coimbra',
                'logoPath' => 'My Logo',
                'type' => 'gold',
            ]);

            $partner = $edition->partners()->first();

            $info = [
                'name' => 'John Doe',
                'email' => 'gold@shift.com',
                'password' => bcrypt('secret'),
            ];

            $partner->users()->create($info);

            $partnerUser = $partner->users()->first();

            $partnerRole = Role::whereName('gold-partner')->first();

            $partnerUser->roles()->attach($partnerRole);

            $edition->partners()->create([
                'name' => 'Company John Doe',
                'email' => 'silver@shift.com',
                'website' => 'Coimbra',
                'logoPath' => 'My Logo',
                'type' => 'silver',
            ]);

            $partner = $edition->partners()->where('email', 'like', 'silver@shift.com')->first();

            $info = [
                'name' => 'John Doe',
                'email' => 'silver@shift.com',
                'password' => bcrypt('secret'),
            ];

            $partner->users()->create($info);

            $partnerUser = $partner->users()->first();

            $partnerRole = Role::whereName('silver-partner')->first();

            $partnerUser->roles()->attach($partnerRole);
        }
    }
}
