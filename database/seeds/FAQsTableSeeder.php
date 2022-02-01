<?php

use Illuminate\Database\Seeder;
use App\Edition;
use Carbon\Carbon;

class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edition =  Edition::where('year',Carbon::now()->year)->first();

        $edition->faqs()->create([
            'question' => 'Quem pode participar?',
            'answer' => 'Todo e qualquer estudante, profissional ou entusiasta pode participar na 4ª edição do Shift APPens! Só desta forma é possível criar uma rede de partilha de conhecimentos heterogénea, que irá promover o crescimento dos mais inexperientes na área e aumentar o espírito de entreajuda.
Resumindo, desde que sejas uma pessoa criativa, motivada, e pronta a divertir-se, o Shift APPens é definitivamente o TEU hackathon!',
        ]);

        $edition->faqs()->create([
            'question' => 'Como me inscrevo?',
            'answer' => 'As inscrições encontram-se neste momento abertas!
Podes inscrever-te a partir do nosso site preenchendo o formulário da candidatura na nossa plataforma, ou então, se tiveres a sorte de avistar o tigre na tua Faculdade durante o Roadshow, podes inscrever-te presencialmente com a equipa da organização.',
        ]);

        $edition->faqs()->create([
            'question' => 'O que posso fazer no Shift APPens?',
            'answer' => 'Toda e qualquer aplicação, seja ela mobile, web, desktop, jogo ou outro, que te tenha surgido na cabeça, mas que por alguma razão não tenhas tido a hipótese de concretizar, poderá participar no Shift APPens e habilitar-se a ser uma das ideias vencedoras a ganhar os magníficos prémios que temos para atribuir.
O nosso jurado terá em atenção a originalidade, a dificuldade técnica envolvida, a qualidade final e o grau de utilidade para o público-alvo do produto que foi desenvolvido durante o evento.',
        ]);

        $edition->faqs()->create([
            'question' => 'Com quem o posso fazer?',
            'answer' => 'Só precisas de trazer ideias e vontade para as desenvolver. As equipas são de 2 a 4 elementos mas se, por algum motivo, os teus amigos não forem capazes de aceitar o desafio de participar no Shift APPens, podes inscrever-te sozinho! Com certeza encontrarás um projeto à tua altura e uma equipa que te irá receber com todo o agrado, pois toda a gente sabe que um par de mãos extra nunca é demais!',
        ]);

        $edition->faqs()->create([
            'question' => 'Quanto irá custar?',
            'answer' => 'A inscrição é totalmente gratuita. A participação, caso sejas selecionado, terá o custo de 10€.',
        ]);

        $edition->faqs()->create([
            'question' => 'Onde vai ser?',
            'answer' => 'Dados os mais de 150 participantes das passadas edições, decidimos mudar de espaço e, por isso, esta edição do Shift APPens terá lugar no Pavilhão Mário Mexia, em Coimbra. Poderás contar com várias áreas distintas onde se irão realizar as diferente atividades. ',
        ]);

        $edition->faqs()->create([
            'question' => 'Como vai ser?',
            'answer' => 'Não queremos desvendar já tudo mas prepara-te porque tudo pode acontecer! Provavelmente serás abatido várias vezes por uma nerf gun ninja ou até encontrar o Chewbacca pelo recinto. Nós prometemos dar-te todas as condições para conseguires bater código durante mais de 48h seguidas, que é como quem diz, café à discrição e um espaço espetacular.',
        ]);

        $edition->faqs()->create([
            'question' => 'Dormida e banhos, como vão acontecer?',
            'answer' => 'Poderás ser um shifter a tempo inteiro e, para isso, terás a possibilidade de pernoitar dentro do recinto. Basta trazeres um saco-cama e nós tratamos de preparar uma zona calma destinada às dormidas.
Neste ano temos uma novidade: visto que nos afastámos das margens do Mondego, iremos garantir balneários onde poderás usufruir do teu banho de beleza.',
        ]);

        $edition->faqs()->create([
            'question' => 'E relativamente às refeições?',
            'answer' => 'Iremos assegurar todas as refeições principais. Assim, poderás contar com pequenos-almoços, almoços e jantares, bem como vários coffee-breaks ao longo do dia.',
        ]);
    }
}
