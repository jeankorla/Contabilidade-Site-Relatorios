<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ContatoController extends BaseController
{
    public function enviarEmail()
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

        if (!$email->send()) {
            $debugData = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', "Falha ao enviar email: " . print_r($debugData, true));
        }
    }
}
