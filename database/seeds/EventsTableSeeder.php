<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Edition;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $edition =  Edition::where('year',Carbon::now()->year)->first();

        $edition->events()->create([
                'name' => 'Check-In',
                'startDate' => '2017-02-17 13:00:00',
                'isActivity' => false,
            ]);

        $edition->events()->create([
                'name' => 'Cerimónia de Abertura',
                'startDate' => '2017-02-17 14:30:00',
                'isActivity' => false,
        ]);

        $edition->events()->create([
                'name' => 'Quebra Gelo + Formação de Equipas',
                'startDate' => '2017-02-17 15:00:00',
                'isActivity' => false,
        ]);

        $edition->events()->create([
                'name' => 'Início do Hackathon',
                'startDate' => '2017-02-17 15:30:00',
                'isActivity' => false,
        ]);

        $edition->events()->create([
                'name' => 'Talk RightIT',
                'startDate' => '2017-02-17 16:00:00',
                'isActivity' => true,
        ]);

        $edition->events()->create([
                'name' => 'Talk Accenture',
                'startDate' => '2017-02-17 17:00:00',
                'isActivity' => true,
        ]);

        $edition->events()->create([
                'name' => 'Talk Wit Software',
                'startDate' => '2017-02-17 18:00:00',
                'isActivity' => true,
        ]);

        $edition->events()->create([
            'name' => 'Jantar',
            'startDate' => '2017-02-17 20:00:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Quiz Whitesmith',
            'startDate' => '2017-02-17 22:30:00',
            'isActivity' => true,
        ]);

        $edition->events()->create([
            'name' => 'Pequeno-Almoço',
            'startDate' => '2017-02-18 09:00:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Talk IPN',
            'startDate' => '2017-02-18 09:00:00',
            'isActivity' => true,
        ]);

        $edition->events()->create([
            'name' => 'Talk RightIT',
            'startDate' => '2017-02-18 11:00:00',
            'isActivity' => true,
        ]);

        $edition->events()->create([
            'name' => 'Almoço',
            'startDate' => '2017-02-18 12:30:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Touro Mecânico',
            'startDate' => '2017-02-18 14:00:00',
            'isActivity' => true,
        ]);

        $edition->events()->create([
            'name' => 'Jantar',
            'startDate' => '2017-02-18 20:00:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Pequeno-Almoço',
            'startDate' => '2017-02-19 09:00:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Almoço',
            'startDate' => '2017-02-19 12:30:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Fim do Hackathon',
            'startDate' => '2017-02-19 15:40:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Apresentações Finais',
            'startDate' => '2017-02-19 16:00:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Entrega de Prémios',
            'startDate' => '2017-02-19 18:00:00',
            'isActivity' => false,
        ]);

        $edition->events()->create([
            'name' => 'Sessão de Encerramento',
            'startDate' => '2017-02-19 19:00:00',
            'isActivity' => false,
        ]);
    }
}
