<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Trocar;

class TrocarController extends BaseController
{
    public function store()
    {
        $nome = $this->request->getPost('nome');
        $destinatarioEmail = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cnpj = $this->request->getPost('cnpj');
        $nome_empresa = $this->request->getPost('nome_empresa');
        $faturamento = $this->request->getPost('faturamento');
        $funcionarios = $this->request->getPost('funcionarios');
        $tributacao = $this->request->getPost('tributacao');
        $estado = $this->request->getPost('estado');

        $trocarModel = new Trocar;

        $data = [
            'nome' => $nome,
            'email' => $destinatarioEmail,
            'tel' => $tel,
            'cnpj' => $cnpj,
            'nome_empresa' => $nome_empresa,
            'faturamento' => $faturamento,
            'funcionarios' => $funcionarios,
            'tributacao' => $tributacao,
            'estado' => $estado
        ];

        $trocarModel->insert($data);

        $this->sendEmail($nome, $destinatarioEmail, $nome_empresa);

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }

     public function sendEmail($nome, $destinatarioEmail, $nome_empresa)
{
    $email = \Config\Services::email();

    $email->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
    $email->setTo($destinatarioEmail);

    $email->setSubject('Bem vindo a Spolaor ' . $nome);

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
            <h1>É um imenso prazer dar as boas-vindas à {$nome_empresa} como nosso futuro cliente na Spolaor Contabilidade.</h1>
        </div>
        <div><h2>Estamos entusiasmados com a parceria promissora que se inicia. A seguir, apresentamos os serviços que oferecemos para alavancar o sucesso da sua empresa. </h2> </div>
        <div style='margin-top: 20px; border-top: 1px solid #ddd; padding-top: 20px;'>
            <img alt='' src='https://scia.com.br/assinatura/ass.png'>
        </div>
    </body>
    </html>";

    $email->setMessage($htmlContent);

    // Anexando o arquivo
    $pathToAttachment = WRITEPATH . 'uploads/proposta_trocar.pdf';

    if (!file_exists($pathToAttachment)) {
        echo "Erro: O arquivo 'proposta_trocar.pdf' não foi encontrado no caminho especificado.";
        return; // Encerra a execução do método aqui
    }

    $email->attach($pathToAttachment);

    if ($email->send()) {
        echo "E-mail enviado com sucesso!";
    } else {
        $data = $email->printDebugger(['headers', 'subject', 'body']);
        print_r($data); // Mostra informações sobre possíveis erros
    }
}
}