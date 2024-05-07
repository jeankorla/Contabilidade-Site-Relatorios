<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Atividade;
use App\Models\Contabilidade;
use App\Models\Socio;
use App\Models\Socio_ass;
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
        $clienteModel = new Cliente_lead;
        $inserted = $clienteModel->insert($data);
        $clienteId = $clienteModel->insertID();  // Captura o ID do cliente inserido

        // Enviar o CNPJ e clienteId para o EmpresaController
        $empresaController = new EmpresaController();
        $empresaData = $empresaController->fetchCnpjData($data['cnpj'], $clienteId);

        // Usando métodos do EmailController
        $this->emailController->emailCliente($data);
        $this->emailController->emailDiretoria($data);

        return redirect()->back()->with('success', 'Formulário enviado com sucesso.')->withInput();
    }



    public function editarCliente($id = null)
    {
        $clienteModel = new Cliente_lead();
        $cliente = $clienteModel->find($id);

        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }

        $empresaModel = new Empresa();
        $empresa = $empresaModel->where('cliente_id', $id)->first();

        $empresaId = $empresa ? $empresa['id'] : null;

        $atividadeModel = new Atividade();
        $atividades = $atividadeModel->where('empresa_id', $empresaId)->findAll();

        $contabilidadeModel = new Contabilidade();
        $contabilidade = $contabilidadeModel->where('empresa_id', $empresaId)->first();

        $socioModel = new Socio();
        $socios = $socioModel->where('empresa_id', $empresaId)->findAll();

        $data = [
            'cliente' => $cliente,
            'empresa' => $empresa,
            'atividades' => $atividades,
            'contabilidade' => $contabilidade,
            'socios' => $socios
        ];

        return view('editarCliente', ['data' => $data]);
    }

    public function atualizarCliente($id = null)
    {
        // Atualizando dados do cliente
        $dataCliente = [
            'nome' => $this->request->getPost('nome_contato'),
            'email' => $this->request->getPost('email_contato'),
            'tel' => $this->request->getPost('tel_contato'),
            'cpf' => $this->request->getPost('cpf_contato'),
        ];

        $clienteModel = new Cliente_lead();
        $clienteModel->update($id, $dataCliente);

        // Atualizando dados da empresa
        $dataEmpresa = [
            'cnpj' => $this->request->getPost('cnpj'),
            'nome' => $this->request->getPost('nome_empresa'),
            'fantasia' => $this->request->getPost('fantasia'),
            'tel' => $this->request->getPost('tel_empresa'),
            'faturamento' => $this->request->getPost('faturamento'),
            'funcionarios' => $this->request->getPost('funcionarios'),
            'tributacao' => $this->request->getPost('tributacao'),
            'nfe' => $this->request->getPost('nfe'),
            'atividade_principal_codigo' => $this->request->getPost('atividade_principal_codigo'),
            'atividade_principal_texto' => $this->request->getPost('atividade_principal_texto'),
            'lancamento' => $this->request->getPost('lancamento'),
            'natureza_juridica' => $this->request->getPost('natureza_juridica'),
            'capital_social' => $this->request->getPost('capital_social'),
            'abertura' => $this->request->getPost('abertura'),
            'tipo' => $this->request->getPost('tipo'),

            //Endereço da empresa

            'endereco_cep' => $this->request->getPost('endereco_empresa_cep'),
            'endereco_rua' => $this->request->getPost('endereco_empresa_rua'),
            'endereco_numero' => $this->request->getPost('endereco_empresa_numero'),
            'endereco_complemento' => $this->request->getPost('endereco_empresa_complemento'),
            'endereco_bairro' => $this->request->getPost('endereco_empresa_bairro'),
            'endereco_cidade' => $this->request->getPost('endereco_empresa_cidade'),
            'endereco_estado' => $this->request->getPost('endereco_empresa_estado'),

        ];

        $empresaModel = new Empresa();
        $empresaId = $this->request->getPost('empresa_id');
        $empresaModel->update($empresaId, $dataEmpresa);


        // Atualizando dados do Socio
        $dataSocio_ass = [
            'nome' => $this->request->getPost('socio_asses_nome'),
            'nacionalidade' => $this->request->getPost('socio_asses_nacional'),
            'idade' => $this->request->getPost('socio_asses_idade'),
            'rg' => $this->request->getPost('socio_asses_rg'),
            'cpf' => $this->request->getPost('socio_asses_cpf'),

            //Endereço do Socio
            
            'endereco_cep' => $this->request->getPost('socio_asses_endereco_cep'),
            'endereco_cidade' => $this->request->getPost('socio_asses_endereco_cidade'),
            'endereco_bairro' => $this->request->getPost('socio_asses_endereco_bairro'),
            'endereco_rua' => $this->request->getPost('socio_asses_endereco_rua'),
            'endereco_complemento' => $this->request->getPost('socio_asses_endereco_complemento'),
            'endereco_numero' => $this->request->getPost('socio_asses_endereco_numero'),
            'endereco_estado' => $this->request->getPost('socio_asses_endereco_estado'),
        ];

        $socio_assModel = new Socio_ass();
        $empresaId = $this->request->getPost('empresa_id');
        $socio_assModel->update($empresaId, $dataSocio_ass);



        // Atualizando dados da Contabilidade
        $dataContabilidade = [
            'inicio_contabilidade' => $this->request->getPost('inicio_contabilidade'),
            'competencia' => $this->request->getPost('competencia'),
            'honorario' => $this->request->getPost('honorario'),
            'honorario_texto' => $this->request->getPost('honorario_texto'),
        ];

        $contabilidadeModel = new Contabilidade();
        $empresaId = $this->request->getPost('empresa_id');
        $contabilidadeModel->update($empresaId, $dataContabilidade);



        // Atualizando os sócios
        $socioModel = new Socio();
        $socios = $this->request->getPost('socios');

        // Primeiro removemos todos os sócios antigos para evitar duplicatas
        $socioModel->where('empresa_id', $empresaId)->delete();

        // Em seguida, inserimos os novos sócios
        foreach ($socios as $socio) {
            $socio['empresa_id'] = $empresaId;
            $socioModel->insert($socio);
        }



        // Dentro do método que processa a atualização dos dados
        $atividadeModel = new Atividade();
        $atividades = $this->request->getPost('atividades');

        // Primeiro, remova as atividades secundárias antigas para evitar duplicações
        $atividadeModel->where('empresa_id', $empresaId)->delete();

        // Insira as novas atividades secundárias
        foreach ($atividades as $atividade) {
            $atividade['empresa_id'] = $empresaId;
            $atividadeModel->insert($atividade);
        }

        // Redirecionar de volta com uma mensagem de sucesso.
        return redirect()->to('AdminController')->with('success', 'Registro atualizado com sucesso.');
    }

    public function atualizarCliente_old($id = null)
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
        $clienteModel = new Cliente_lead;

        $clienteModel->update($id, $data);

        // Redirecione de volta com uma mensagem de sucesso.
        return redirect()->to('AdminController')->with('success', 'Registro atualizado com sucesso.');
    }

    public function excluirCliente($id = null)
    {
        $clienteModel = new Cliente_lead();

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