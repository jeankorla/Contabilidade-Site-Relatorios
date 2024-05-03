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
            // Se o campo não está vazio, é provável que seja um bot de spam
            http_response_code(400);
            exit;
        }

        // Coletar todos os dados do formulário
        $data = [
            'motivo_contato'           => $this->request->getPost('motivo_contato'),
            'nome_contato'             => $this->request->getPost('nome_contato'),
            'email_contato'            => $this->request->getPost('email_contato'),
            'tel_contato'              => $this->request->getPost('tel_contato'),
            'cpf_contato'              => $this->request->getPost('cpf_contato'),
            'cnpj'                     => $this->request->getPost('cnpj'),
            'nome_empresa'             => $this->request->getPost('nome_empresa'),
            'faturamento'              => $this->request->getPost('faturamento'),
            'funcionarios'             => $this->request->getPost('funcionarios'),
            'tributacao'               => $this->request->getPost('tributacao'),
            'nfe'                      => $this->request->getPost('nfe'),
            'lancamento'               => $this->request->getPost('lancamento'),
            'endereco_empresa_estado'  => $this->request->getPost('endereco_empresa_estado'),
            'endereco_empresa_cep'     => $this->request->getPost('endereco_empresa_cep'),
            'endereco_empresa_rua'     => $this->request->getPost('endereco_empresa_rua'),
            'endereco_empresa_numero'  => $this->request->getPost('endereco_empresa_numero'),
            'endereco_empresa_bairro'  => $this->request->getPost('endereco_empresa_bairro'),
            'endereco_empresa_cidade'  => $this->request->getPost('endereco_empresa_cidade'),
            'socio_nome'               => $this->request->getPost('socio_nome'),
            'socio_nacional'           => $this->request->getPost('socio_nacional'),
            'socio_idade'              => $this->request->getPost('socio_idade'),
            'socio_rg'                 => $this->request->getPost('socio_rg'),
            'socio_cpf'                => $this->request->getPost('socio_cpf'),
            'socio_endereco_cep'       => $this->request->getPost('socio_endereco_cep'),
            'socio_endereco_estado'    => $this->request->getPost('socio_endereco_estado'),
            'socio_endereco_cidade'    => $this->request->getPost('socio_endereco_cidade'),
            'socio_endereco_bairro'    => $this->request->getPost('socio_endereco_bairro'),
            'socio_endereco_rua'       => $this->request->getPost('socio_endereco_rua'),
            'socio_endereco_numero'    => $this->request->getPost('socio_endereco_numero'),
            'honorario'                => $this->request->getPost('honorario'),
            'honorario_texto'          => $this->request->getPost('honorario_texto'),
            'inicio_contabilidade'     => $this->request->getPost('inicio_contabilidade'),
            'competencia'              => $this->request->getPost('competencia')
        ];

        // Instanciando o modelo e inserindo os dados
        $clienteModel = new Cliente;
        $clienteModel->insert($data);

        // Usando métodos do EmailController
        $this->emailController->emailCliente($data);
        $this->emailController->emailDiretoria($data);

        return redirect()->back()->with('success', 'Formulário enviado com sucesso.')->withInput();
    }

    public function editarCliente()
    {
        $clienteModel = new Cliente();

        $registro = $clienteModel->findAll();

         return view('editarCliente', ['registro' => $registro]);
    }

    public function atualizarCliente($id = null)
    {
        // Coletar todos os dados do formulário
        $data = [
            'motivo_contato'           => $this->request->getPost('motivo_contato'),
            'nome_contato'             => $this->request->getPost('nome_contato'),
            'email_contato'            => $this->request->getPost('email_contato'),
            'tel_contato'              => $this->request->getPost('tel_contato'),
            'cpf_contato'              => $this->request->getPost('cpf_contato'),
            'cnpj'                     => $this->request->getPost('cnpj'),
            'nome_empresa'             => $this->request->getPost('nome_empresa'),
            'faturamento'              => $this->request->getPost('faturamento'),
            'funcionarios'             => $this->request->getPost('funcionarios'),
            'tributacao'               => $this->request->getPost('tributacao'),
            'nfe'                      => $this->request->getPost('nfe'),
            'lancamento'               => $this->request->getPost('lancamento'),
            'endereco_empresa_estado'  => $this->request->getPost('endereco_empresa_estado'),
            'endereco_empresa_cep'     => $this->request->getPost('endereco_empresa_cep'),
            'endereco_empresa_rua'     => $this->request->getPost('endereco_empresa_rua'),
            'endereco_empresa_numero'  => $this->request->getPost('endereco_empresa_numero'),
            'endereco_empresa_bairro'  => $this->request->getPost('endereco_empresa_bairro'),
            'endereco_empresa_cidade'  => $this->request->getPost('endereco_empresa_cidade'),
            'socio_nome'               => $this->request->getPost('socio_nome'),
            'socio_nacional'           => $this->request->getPost('socio_nacional'),
            'socio_idade'              => $this->request->getPost('socio_idade'),
            'socio_rg'                 => $this->request->getPost('socio_rg'),
            'socio_cpf'                => $this->request->getPost('socio_cpf'),
            'socio_endereco_cep'       => $this->request->getPost('socio_endereco_cep'),
            'socio_endereco_estado'    => $this->request->getPost('socio_endereco_estado'),
            'socio_endereco_cidade'    => $this->request->getPost('socio_endereco_cidade'),
            'socio_endereco_bairro'    => $this->request->getPost('socio_endereco_bairro'),
            'socio_endereco_rua'       => $this->request->getPost('socio_endereco_rua'),
            'socio_endereco_numero'    => $this->request->getPost('socio_endereco_numero'),
            'honorario'                => $this->request->getPost('honorario'),
            'honorario_texto'          => $this->request->getPost('honorario_texto'),
            'inicio_contabilidade'     => $this->request->getPost('inicio_contabilidade'),
            'competencia'              => $this->request->getPost('competencia')
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