<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Edition;
use Carbon\Carbon;


class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        // IPN

        $edition = Edition::where('year',Carbon::now()->year)->first();

        $edition->partners()->create([
            'name' => 'IPN',
            'email' => 'ipn@shift.com',
            'website' => 'Coimbra',
            'logoPath' => 'My Logo',
            'type' => 'gold',
        ]);

        $ipn = $edition->partners()->where('name', 'like', 'IPN')->first();

        $info = [
            'name' => 'IPN',
            'email' => 'ipn@shift.com',
            'password' => bcrypt('ipnShift17'),
        ];

        $ipn->users()->create($info);

        $ipnUser = $ipn->users()->first();

        $ipnRole = Role::whereName('gold-partner')->first();

        $ipnUser->roles()->attach($ipnRole);

        // GLINT
        $edition->partners()->create([
            'name' => 'Glintt',
            'email' => 'glintt@shift.com',
            'website' => 'Coimbra',
            'logoPath' => 'My Logo',
            'type' => 'gold',
        ]);

        $glintt = $edition->partners()->where('name', 'like', 'Glintt')->first();

        $info = [
            'name' => 'Glintt',
            'email' => 'glintt@shift.com',
            'password' => bcrypt('glinttShift17'),
        ];

        $glintt->users()->create($info);

        $glinttUser = $glintt->users()->first();

        $glinttRole = Role::whereName('gold-partner')->first();

        $glinttUser->roles()->attach($glinttRole);

        // Accenture
        $edition->partners()->create([
            'name' => 'Accenture',
            'email' => 'accenture@shift.com',
            'website' => 'Coimbra',
            'logoPath' => 'My Logo',
            'type' => 'gold',
        ]);

        $accenture = $edition->partners()->where('name', 'like', 'Accenture')->first();

        $info = [
            'name' => 'Accenture',
            'email' => 'accenture@shift.com',
            'password' => bcrypt('accentureShift17'),
        ];

        $accenture->users()->create($info);

        $accentureUser = $accenture->users()->first();

        $accentureRole = Role::whereName('gold-partner')->first();

        $accentureUser->roles()->attach($accentureRole);


        // RightIT
        $edition->partners()->create([
            'name' => 'Right IT Services',
            'email' => 'rightitservices@shift.com',
            'website' => 'Coimbra',
            'logoPath' => 'My Logo',
            'type' => 'gold',
        ]);

        $rightIt = $edition->partners()->where('name', 'like', 'Right IT Services')->first();

        $info = [
            'name' => 'Right IT Services',
            'email' => 'rightitservices@shift.com',
            'password' => bcrypt('rightitservicesShift17'),
        ];

        $rightIt->users()->create($info);

        $rightItUser = $rightIt->users()->first();

        $rightItRole = Role::whereName('gold-partner')->first();

        $rightItUser->roles()->attach($rightItRole);

        
        // Redlight
        $edition->partners()->create([
            'name' => 'Redlight',
            'email' => 'redlight@shift.com',
            'website' => 'Coimbra',
            'logoPath' => 'My Logo',
            'type' => 'gold',
        ]);

        $redlight = $edition->partners()->where('name', 'like', 'Redlight')->first();

        $info = [
            'name' => 'Redlight',
            'email' => 'redlight@shift.com',
            'password' => bcrypt('redlightShift17'),
        ];

        $redlight->users()->create($info);

        $redlightUser = $redlight->users()->first();

        $redlightRole = Role::whereName('gold-partner')->first();

        $redlightUser->roles()->attach($redlightRole);

        
        // Whitesmith
        $edition->partners()->create([
            'name' => 'Whitesmith',
            'email' => 'whitesmith@shift.com',
            'website' => 'Coimbra',
            'logoPath' => 'My Logo',
            'type' => 'gold',
        ]);

        $whitesmith = $edition->partners()->where('name', 'like', 'Whitesmith')->first();

        $info = [
            'name' => 'Whitesmith',
            'email' => 'whitesmith@shift.com',
            'password' => bcrypt('whitesmithShift17'),
        ];

        $whitesmith->users()->create($info);

        $whitesmithUser = $whitesmith->users()->first();

        $whitesmithRole = Role::whereName('gold-partner')->first();

        $whitesmithUser->roles()->attach($whitesmithRole);

                
    }
}
