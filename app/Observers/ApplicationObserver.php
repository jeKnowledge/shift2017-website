<?php

namespace App\Observers;
use App;
use App\Application;
use Mail;
use App\Mail\MailLayoutButton;
use App\Mail\MailLayoutNotification;

class ApplicationObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(Application $application)
    {
        if(App::environment('production')){
            Mail::to($application->shifter->user->email)->send(new MailLayoutButton('[Shift APPens] Candidatura Recebida', 'Candidatura Shift APPens 2017', 'Olá Shifter! Confirmamos que recebemos a tua candidatura ao Shift APPens 2017 com sucesso! A fase de análise já começou portanto a qualquer altura poderás receber a tua resposta, ainda assim se não estiveres 100% confiante, podes continuar a melhorar a tua candidatura!', route('applications.edit', ['application' => $application->id]), 'Editar Candidatura'));
        }
        else if(App::environment('staging', 'local')){
            Mail::to('mario.balca@gmail.com')->send(new MailLayoutButton('[Shift APPens] Candidatura Recebida', 'Candidatura Shift APPens 2017', 'Olá Shifter! Confirmamos que recebemos a tua candidatura ao Shift APPens 2017 com sucesso! A fase de análise já começou portanto a qualquer altura poderás receber a tua resposta, ainda assim se não estiveres 100% confiante, podes continuar a melhorar a tua candidatura!', route('applications.edit', ['application' => $application->id]), 'Editar Candidatura'));
        }
    }

    public function updated(Application $application) {
        if($application->accepted == true){
            if(App::environment('production')){
                Mail::to($application->shifter->user->email)->send(new MailLayoutNotification('[Shift APPens] Candidatura Aceite', 'Candidatura Shift APPens 2017', 'Olá Shifter! Foste um dos escolhidos para fazer parte da 4ª edição do Shift APPens! Como todos os grandes eventos, aqui ficam os próximos passos para concluíres com sucesso o teu processo de candidatura.<br> <br>O pagamento da tua inscrição, no valor de 10€, pode ser feito das seguintes formas: <ul><li>Através de transferência bancária, para a conta com os seguintes dados:<ul><li>IBAN - PT50 0045 3030 40223802816 18</li><li>NOME - jeKnowledge associação</li></ul></li><li>Através de pagamento presencial, entrega pessoalmente o respectivo montante na sala do Núcleo de Estudantes de Informática (sala C4.3 do piso 4 do Departamento de Engenharia Informática da Universidade de Coimbra)</li></ul><br>Caso tenhas optado pela transferência bancária porque és um daqueles #shifters que acham que podem fazer tudo à distância de um só click ou, simplesmente, não és ou estás em Coimbra (válido), envia o comprovativo de pagamento para geral@shiftappens.com em forma de comprovativo de homebanking ou scan legível do talão gerado pelo multibanco. O assunto do email deverá ser: "Pagamento de Inscrição - [O teu nome completo]"<br><br>Após o envio do comprovativo de transferência ou pagamento presencial, deves referir explicitamente se desejas emissão de recibo e qual o NIF com qual a queres pedir.<br><br>Tens até às 23h59m do dia 14 de Fevereiro (próxima terça-feira) para concluíres este processo. Caso não o faças, a tua vaga será atribuída a outro candidato da lista de espera.<br><br>Estamos à tua espera a partir das 13h do dia 17 de Fevereiro no Pavilhão Mário Mexia, em Coimbra, para o hackathon mais louco do país! Caso te surja alguma dúvida, não hesites em nos contactar por email. Responderemos prontamente!<br><br>Lorem Ipsum,<br>Shift APPens'));
            }
            else if(App::environment('staging', 'local')){
                Mail::to('mario.balca@gmail.com')->send(new MailLayoutNotification('[Shift APPens] Candidatura Aceite', 'Candidatura Shift APPens 2017', 'Olá Shifter! Foste um dos escolhidos para fazer parte da 4ª edição do Shift APPens! Como todos os grandes eventos, aqui ficam os próximos passos para concluíres com sucesso o teu processo de candidatura.<br> <br>O pagamento da tua inscrição, no valor de 10€, pode ser feito das seguintes formas: <ul><li>Através de transferência bancária, para a conta com os seguintes dados:<ul><li>IBAN - PT50 0045 3030 40223802816 18</li><li>NOME - jeKnowledge associação</li></ul></li><li>Através de pagamento presencial, entrega pessoalmente o respectivo montante na sala do Núcleo de Estudantes de Informática (sala C4.3 do piso 4 do Departamento de Engenharia Informática da Universidade de Coimbra)</li></ul><br>Caso tenhas optado pela transferência bancária porque és um daqueles #shifters que acham que podem fazer tudo à distância de um só click ou, simplesmente, não és ou estás em Coimbra (válido), envia o comprovativo de pagamento para geral@shiftappens.com em forma de comprovativo de homebanking ou scan legível do talão gerado pelo multibanco. O assunto do email deverá ser: "Pagamento de Inscrição - [O teu nome completo]"<br><br>Após o envio do comprovativo de transferência ou pagamento presencial, deves referir explicitamente se desejas emissão de recibo e qual o NIF com qual a queres pedir.<br><br>Tens até às 23h59m do dia 14 de Fevereiro (próxima terça-feira) para concluíres este processo. Caso não o faças, a tua vaga será atribuída a outro candidato da lista de espera.<br><br>Estamos à tua espera a partir das 13h do dia 17 de Fevereiro no Pavilhão Mário Mexia, em Coimbra, para o hackathon mais louco do país! Caso te surja alguma dúvida, não hesites em nos contactar por email. Responderemos prontamente!<br><br>Lorem Ipsum,<br>Shift APPens'));
            }
        }
    }
}