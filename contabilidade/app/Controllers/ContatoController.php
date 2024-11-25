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

        // Lista de nomes bloqueados
        $blacklistNames = [
            'Robertpainy',
        ];
        
        // Lista de e-mails na blacklist
        $blacklistEmails = [
            'ericjonesmyemail@gmail.com',
            'hudspeth.roberta@outlook.com',
            'lamontagne.drusilla@gmail.com',
            'noah.eade@gmail.com',
            'correa.monica@msn.com',
            'kayleighbpsteamship@gmail.com',
            'withrow.john@gmail.com',
            'whitfeld.kristen@gmail.com',
            'joannariggs278@gmail.com',
            'abuse@registry.godaddy',
            'Gemma@registry.godaddy',
            'registry-help@registry.godaddy',
            'help@registry.godaddy',
            'iana@registry.godaddy',
            'sales@crestinfosystems.com',
            'distinctpius@gmail.com',
            'francois@toituressublimes.ca',
            'marley.home@cogeco.ca',
            'rayeko@gmail.com',
            'mona1@tampabay.rr.com',
            'gbautista0@gmail.com',
            '2428phillips@gmail.com',
            'pfaffcd@comcast.net',
            'Stephanie@ocajuns.com',
            'bsilverthorn@gmail.com',
            'Khalifamin9@gmail.com',
            '1kimsmart@gmail.com',
            'relativelyrisky@gmail.com',
            'jeannie@sailhealthconcierge.com',
            'mwenzel@csgcl.com',
            'aitanmenash@gmail.com',
            'vought82@yahoo.com',
            'kcharko@comcast.net',
            'duckman911@comcast.net',
            'melkonians@aol.com',
            'tlawson@ripleymetalworks.com',
            'm.jabbar.bcs@gmail.com',
            'ccarden@coolmanbuilt.com',
            'scovensdiane@gmail.com',
        ];

            // Verifica se todos os campos estão vazios
        if (empty($name) && empty($email) && empty($textarea)) {
            // Se todos os campos estiverem vazios, não faça nada ou retorne uma mensagem de erro
            return redirect()->back()->with('error', 'O formulário está vazio.')->withInput();
        } 
        // Verifica se o nome está na blacklist
        elseif (in_array($name, $blacklistNames)) {
            return redirect()->back()->with('error', 'Este nome está bloqueado.')->withInput();
        } 
        // Verifica se o e-mail está na blacklist
        elseif (in_array($email, $this->blacklistEmails)) { // 
            return redirect()->back()->with('error', 'Este e-mail está bloqueado.')->withInput();
        } 
        else {
            // Se passar nas verificações, continue com o processo
            $Contato = new Contato;

        $data = [
            'name' => $name,
            'email' => $email,
            'textarea' => $textarea,
        ];
       
            $Contato->insert($data);

            $this->emailController->contatoEmailDiretoria($data);
            $this->emailController->contatoEmailCliente($data);

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
