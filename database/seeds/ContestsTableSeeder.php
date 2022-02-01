<?php

use Illuminate\Database\Seeder;
use App\Contest;
use App\Edition;
use Carbon\Carbon;

class ContestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $edition = Edition::where('year',Carbon::now()->year)->first();
        Contest::create(['name' => 'Desafio IPN - ESA BIC', 'description' => 'Este desafio é dirigido a projetos, de qualquer área sectorial, que utilizem dados de observação da terra ou sistema de georreferenciação (ou qualquer outra tecnologia espacial), e possam resultar numa candidatura ao ESA BIC Portugal (http://space.ipn.pt/pages/open_call).<br> Todos os projetos, desde que usando tecnologia espacial, são elegíveis para o desafio: turismo, saúde, desporto, transportes, lazer, agricultura, mar e atmosfera, energia e resíduos, etc. <br>O vencedor deste desafio terá direito a 6 meses de co-work no IPN. Assim têm, para além da incubação virtual start, um espaço físico que podem utilizar e facilities das quais podem usufruir.', 'edition_id' => $edition->id]);

       	Contest::create(['name' => 'Desafio Right IT', 'description' => 'Queres um desafio à altura das nuvens? Já conheces o CRM na cloud número 1 do mundo? <br> A Right IT desafia-te a lançares-te das nuvens a desenvolveres uma app na plataforma Salesforce.com! O que queremos ver na tua app: <br> · Criatividade <br> · Aplicabilidade no mundo empresarial <br> · User Experience <br>· Mobile ready', 'edition_id' => $edition->id]);

       	Contest::create(['name' => 'Desafio Whitesmith', 'description' => 'á pensaram na APP que vão fazer neste Hacktahon? Se ainda não pensaram nisso deixamos aqui uma mensagem da Whitesmith :
“O nosso desafio é simples, vamos dar uma prenda espetacular ao projeto que utilizar de forma mais criativa o nosso algoritmo de previsão (http://unplu.gg/test_api.html). Se estás a pensar usar num projeto com análise de séries temporais, podes utilizar o nosso algoritmo para preveres comportamentos futuros (MAGIC!)! Sim, leste bem, para ler o futuro!!! #machinetomachinelearning #hashtag #buzzwords
Por exemplo, se estão a fazer uma aplicação que recolhe os dados de um fitbit durante uma semana, poderão utilizar a nossa API para prever como se vai comportar a pessoa no dia seguinte! Vamos disponibilizar acesso à API a todos os participantes do ShiftAppens.
Quando tiveres a tua ideia definida basta pedires acesso à nossa API a algum membro da organização e nós garantimos que qualquer uma das tuas dúvidas ou questões será resolvida para meteres o teu projeto a fazer previsões e tirar cafés!
Não te preocupes se o projeto é sério, ou altamente cientifico, preocupa-te sim em fazer uma coisa fixe e que te sintas orgulhoso! Criatividade acima de tudo!', 'edition_id' => $edition->id]);
    }
}
