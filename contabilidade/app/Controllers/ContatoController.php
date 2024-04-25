<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contato;


class ContatoController extends BaseController
{

    public function store() 
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $textarea = $this->request->getPost('textarea');

        $Contato = new Contato;

        $data = [
            'name' => $name,
            'email' => $email,
            'textarea' => $textarea,
        ];

        $Contato->insert($data);

        $this->sendEmail($data);

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }


    public function sendEmail($data)
    {
        $data = $this->request->getPost();

        $email = \Config\Services::email();

        $email->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
        $email->setTo('jean@sccontab.com.br');

        $email->setSubject('Contato do site');

        $email->setMailType('html');

        $htmlContent = "
        <html>
        <head>
            <title>Contato via Site</title>
        </head>
        <body>
            <h1>Dados do Contato</h1>
            <p>Recebemos uma nova mensagem através do formulário de contato do site:</p>
            <ul>
                <li>Nome: {$data['name']}</li>
                <li>Email: {$data['email']}</li>
                <li>Mensagem: {$data['textarea']}</li>
            </ul>
            <p>Atenciosamente,</p>
            <p>Equipe de Contabilidade</p>
        </body>
        </html>";

        $email->setMessage($htmlContent);

          if ($email->send()) {
        echo "E-mail enviado com sucesso!";
        } else {
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            print_r($data); // Mostra informações sobre possíveis erros
        }
    }
}
