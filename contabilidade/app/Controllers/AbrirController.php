<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Abrir;

class AbrirController extends BaseController
{


    public function store()
    {
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cpf = $this->request->getPost('cpf');
        $nfe = $this->request->getPost('nfe');
        $lancamento = $this->request->getPost('lancamento');
        $estado = $this->request-> getPost('estado');

        $abrirModel = new Abrir;

        $data = [
            
            'nome' => $nome,
            'email' => $email,
            'tel' => $tel,
            'cpf' => $cpf,
            'nfe' => $nfe,
            'lancamento' => $lancamento,
            'estado' => $estado
        ];

        $abrirModel->insert($data);

        $this->sendEmail($data);
        $this->notifyManagement($data);
        

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }

     public function sendEmail($data)
{
    $email = \Config\Services::email();

    $email->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
    $email->setTo($data['email']);

    $email->setSubject('Bem vindo a Spolaor ' . $data['nome']);

    // Definir o tipo de e-mail como HTML
    $email->setMailType('html');

    // Corpo do e-mail em HTML
    $htmlContent = "
    <html>
    <head>
        <title>Bem vindo a Spolaor</title>
    </head>
    <body>
        <div>
            <h1>É um imenso prazer dar as boas-vindas à {$data['nome']} como nosso futuro cliente na Spolaor Contabilidade.</h1>
        </div>
        <div><h2>Estamos entusiasmados com a parceria promissora que se inicia. A seguir, apresentamos os serviços que oferecemos para alavancar o sucesso da sua empresa.
        
        <p>Veja nossa apresentação:</p>
        <p><a href='https://sccontab.com.br/apresentacao'>Clique aqui para acessar a Apresentação</a></p>
        </h2> </div>
        <div style='margin-top: 20px; border-top: 1px solid #ddd; padding-top: 20px;'>
            <img alt='' src='https://scia.com.br/assinatura/ass.png'>
        </div>
    </body>
    </html>";

    $email->setMessage($htmlContent);

    // Anexando o arquivo
    // $pathToAttachment = WRITEPATH . 'uploads/proposta_trocar.pdf';

    // if (!file_exists($pathToAttachment)) {
    //     echo "Erro: O arquivo 'proposta_trocar.pdf' não foi encontrado no caminho especificado.";
    //     return; // Encerra a execução do método aqui
    // }

    // $email->attach($pathToAttachment);

    if ($email->send()) {
        echo "E-mail enviado com sucesso!";
    } else {
        $data = $email->printDebugger(['headers', 'subject', 'body']);
        print_r($data); // Mostra informações sobre possíveis erros
    }
}

public function notifyManagement($data)
{
    $email = \Config\Services::email();

    $email->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
    $email->setTo('ti@sccontab.com.br');

    $email->setSubject('Novo Registro de Cliente - ABERTURA DE EMPRESA');

    $email->setMailType('html');

    $htmlContent = "
    <html>
    <head>
        <title>Novo Cliente Registrado</title>
    </head>
    <body>
        <h1>Notificação de Novo Cliente</h1>
        <p>Prezada Diretoria,</p>
        <p>Informamos que um novo cliente se registrou em nosso site de TROCA DE CONTADOR com os seguintes detalhes:</p>
        <ul>
            <li>Nome: {$data['nome']}</li>
            <li>Email: {$data['email']}</li>
            <li>Telefone: {$data['tel']}</li>
            <li>CPF: {$data['cpf']}</li>
            <li>CPF: {$data['nfe']}</li>
            <li>Estado: {$data['estado']}
        <p>Para mais detalhes ou para tomar os próximos passos, por favor, acesse nossa plataforma de gestão:</p>
        <p><a href='https://sccontab.com.br/LoginController'>Clique aqui para acessar a plataforma</a></p>
        <p>Atenciosamente,</p>
        <p>Equipe Spolaor Contabilidade</p>
    </body>
    </html>";

    $email->setMessage($htmlContent);

    if (!$email->send()) {
        $data = $email->printDebugger(['headers', 'subject', 'body']);
        log_message('error', "Falha ao enviar email de notificação para a diretoria: " . print_r($data, true));
    }
}


   
}
