<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use App\Controllers\EmailController;

date_default_timezone_set('America/Sao_Paulo');

class ClienteController extends BaseController
{   
    protected $emailController;

    public function __construct()
    {
        $this->emailController = new EmailController();
    }
    
    public function store()
    {
        // Verificação de proteção antispam
        if (isset($_POST["website2"]) && $_POST["website2"] !== "") {
            http_response_code(400);
            exit;
        }

        // Coletar todos os dados do formulário
        $data = [
            'motivo'                => $this->request->getPost('motivo'),
            'nome'                  => $this->request->getPost('nome'),
            'email'                 => $this->request->getPost('email'),
            'tel'                   => $this->request->getPost('tel'),
            'cpf'                   => $this->request->getPost('cpf'),
            'cnpj'                  => $this->request->getPost('cnpj'),
            'faturamento'           => $this->request->getPost('faturamento'),
            'funcionarios'          => $this->request->getPost('funcionarios'),
            'nfe'                   => $this->request->getPost('nfe'),
            'lancamento'            => $this->request->getPost('lancamento'),
        ];

        // Instanciando o modelo e inserindo os dados
        $clienteModel = new Cliente;
        $clienteModel->insert($data);

        // Enviar o CNPJ para o EmpresaController
        $empresaController = new EmpresaController();
        $empresaData = $empresaController->fetchCnpjData($data['cnpj']);

        // Usando métodos do EmailController
        $this->emailController->emailCliente($data);
        $this->emailController->emailDiretoria($data);

        return redirect()->back()->with('success', 'Formulário enviado com sucesso.')->withInput();
    }


    public function editarCliente($id = null)
    {
        $clienteModel = new Cliente();

        $registro = $clienteModel->find($id);

        return view('editarCliente', ['registro' => $registro]);
    }

    public function atualizarCliente($id = null)
    {
        // Coletar todos os dados do formulário
        $data = [
            'motivo'                   => $this->request->getPost('motivo'),
            'nome'                     => $this->request->getPost('nome'),
            'email'                    => $this->request->getPost('email'),
            'tel'                      => $this->request->getPost('tel'),
            'cpf'                      => $this->request->getPost('cpf'),
        ];

        // Instanciando o modelo e inserindo os dados
        $clienteModel = new Cliente;

        $clienteModel->update($id, $data);

        // Redirecione de volta com uma mensagem de sucesso.
        return redirect()->to('AdminController')->with('success', 'Registro atualizado com sucesso.');
    }

    public function excluirCliente($id = null)
    {
        $clienteModel = new Cliente();

        // Verifique se o registro existe.
        if ($clienteModel->find($id)) {
            // Exclua o registro.
            $clienteModel->delete($id);
            return redirect()->to('AdminController')->with('success', 'Registro excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }
    }
}