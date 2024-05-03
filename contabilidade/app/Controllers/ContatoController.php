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
    // Verificação de proteção antispam
    if (isset($_POST["website"]) && $_POST["website"] !== "") {
        // Se o campo não está vazio, é provável que seja um bot de spam
        http_response_code(400);
        exit;
    }

    // Continua com o processamento dos dados submetidos pelo usuário
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
    $this->contatoEmailDiretoria($data);

    return redirect()->back()->with('success', 'Formulário enviado com sucesso.')->withInput();
    }

    public function excluirContato($id = null)
    {
        $contato = new Contato();

        // Verifique se o registro existe.
        if ($contato->find($id)) {
            // Exclua o registro.
            $contato->delete($id);
            return redirect()->to('ContatoController')->with('success', 'Registro de troca excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Registro de troca não encontrado.');
        }
    }
}
