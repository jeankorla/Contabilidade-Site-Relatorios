<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contato;


class ContatoController extends BaseController
{

    public function index()
    {
        // Verifica se o usuário está autenticado
        if (!session()->get('isLoggedIn')) {
            // Caso não esteja autenticado, redireciona para a tela de login
            return redirect()->back()->with('error', 'Credenciais inválidas.')->withInput();
        }

        $contatoModel = new Contato;

        $contato = $contatoModel->findAll();


        return view('contato', ['contato' => $contato]);
    }

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

    public function excluirContato($id = null)
    {
        $contato = new Contato();

        // Verifique se o registro existe.
        if ($contato->find($id)) {
            // Exclua o registro.
            $contato->delete($id);
            return redirect()->to('AdminController')->with('success', 'Registro de troca excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Registro de troca não encontrado.');
        }
    }

    public function sendResponse()
    {
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        $emailService = \Config\Services::email();

        $emailService->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
        $emailService->setTo($email);
        $emailService->setSubject('Resposta do seu contato');
        $emailService->setMessage($message);

        if ($emailService->send()) {
            return $this->response->setJSON('Email enviado com sucesso!');
        } else {
            return $this->response->setJSON('Falha ao enviar o email.');
        }
    }

}
