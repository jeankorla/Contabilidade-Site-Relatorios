<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contato;
use App\Controllers\EmailController;


class ContatoController extends BaseController
{
    protected $emailController;

    public function __construct()
    {
        $this->emailController = new EmailController();
    }

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

        $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $textarea = $this->request->getPost('textarea');

    // Verifica se todos os campos estão vazios
    if (empty($name) && empty($email) && empty($textarea)) {
        // Se todos os campos estiverem vazios, não faça nada ou retorne uma mensagem de erro
        return redirect()->back()->with('error', 'O formulário está vazio.')->withInput();
    } else {
        // Se algum campo estiver preenchido, continue com o processo
        $Contato = new Contato;

        $data = [
            'name' => $name,
            'email' => $email,
            'textarea' => $textarea,
        ];

        $Contato->insert($data);

        $this->emailController->contatoEmailDiretoria($data);

        return redirect()->back()->with('success', 'Formulário enviado com sucesso.')->withInput();
    }
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
