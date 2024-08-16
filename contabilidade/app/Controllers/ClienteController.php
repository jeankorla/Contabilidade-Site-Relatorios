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

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->back()->with('error', 'Credenciais inválidas.')->withInput();
        }

        $clienteModel = new Cliente_lead();
        $clientes = $clienteModel->findAll();

        $empresaModel = new Empresa();
        $empresas = $empresaModel->findAll();

        $atividadeModel = new Atividade();
        $atividades = $atividadeModel->findAll();

        $contabilidadeModel = new Contabilidade();
        $contabilidades = $contabilidadeModel->findAll();

        $socioModel = new Socio();
        $socios = $socioModel->findAll();

        $socioAssModel = new Socio_ass(); 
        $socioAsses = $socioAssModel->findAll();

        $data = [];
        foreach ($clientes as $cliente) {
            // Busca a empresa relacionada com este cliente
            $empresa = array_values(array_filter($empresas, function ($e) use ($cliente) {
                return $e['cliente_id'] == $cliente['id'];
            }))[0] ?? null;

            // Busca os sócios, atividades secundárias e dados de contabilidade para a empresa encontrada
            $empresa_id = $empresa ? $empresa['id'] : null;

            $atividade = array_values(array_filter($atividades, function ($a) use ($empresa_id) {
                return $a['empresa_id'] == $empresa_id;
            }));

            $contabilidade = array_values(array_filter($contabilidades, function ($c) use ($empresa_id) {
                return $c['empresa_id'] == $empresa_id;
            }))[0] ?? null;

            $sociosList = array_values(array_filter($socios, function ($s) use ($empresa_id) {
                return $s['empresa_id'] == $empresa_id;
            }));

            $socioAssList = array_values(array_filter($socioAsses, function ($sa) use ($empresa_id) {
                return $sa['empresa_id'] == $empresa_id;
            }));

            $data[] = [
                'cliente' => $cliente,
                'empresa' => $empresa,
                'atividades' => $atividade,
                'contabilidade' => $contabilidade,
                'socios' => $sociosList,
                'socio_asses' => $socioAssList
            ];
        }
        
        return view('adminCliente', ['data' => $data]);
    }

    
    public function store()
    {
        // Verificação de proteção antispam
        if (isset($_POST["website2"]) && $_POST["website2"] !== "") {
            http_response_code(400);
            exit;
        }

        // Geração do token único para o cliente
        $token = bin2hex(random_bytes(16));

        // Coletar todos os dados do formulário para o cliente
        $data = [
            'motivo' => $this->request->getPost('motivo'),
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'tel' => $this->request->getPost('tel'),
            'cpf' => $this->request->getPost('cpf'),
            'token' => $token,
            'cnpj' => $this->request->getPost('cnpj'),
            'tributacao' => $this->request->getPost('tributacao'),
            'faturamento' => $this->request->getPost('faturamento'),
            'funcionarios' => $this->request->getPost('funcionarios'),
            'nfe' => $this->request->getPost('nfe'),
            'lancamento' => $this->request->getPost('lancamento')
        ];

        // Verificar se o email ou cpf já existem no banco de dados
        $clienteModel = new Cliente_lead();
        $existingClient = $clienteModel->where('email', $data['email'])
                                    ->orWhere('cpf', $data['cpf'])
                                    ->first();

        if ($existingClient) {
            return redirect()->back()->with('error', 'Erro: O e-mail ou CPF já está registrado.')->withInput();
        }

        // Coletar todos os dados do formulário para a Empresa
        $additionalData = [
            'tributacao' => $this->request->getPost('tributacao'),
            'faturamento' => $this->request->getPost('faturamento'),
            'funcionarios' => $this->request->getPost('funcionarios'),
            'nfe' => $this->request->getPost('nfe'),
            'lancamento' => $this->request->getPost('lancamento'),
        ];

        // Inserir os dados do cliente
        $inserted = $clienteModel->insert($data);

        // Verificar se a inserção do cliente foi bem-sucedida
        if ($inserted === false) {
            $errors = $clienteModel->errors();
            return redirect()->back()->with('error', 'Erro ao registrar cliente: ' . implode(', ', $errors))->withInput();
        }

        // Captura o ID do cliente inserido
        $clienteId = $clienteModel->insertID();

        // Coletar dados da empresa (se fornecidos) e associar ao cliente
        $dataEmpresa = [
            'nome' => $this->request->getPost('nome_empresa'),
            'endereco_cidade' => $this->request->getPost('endereco_empresa_cidade'),
            'endereco_estado' => $this->request->getPost('endereco_empresa_estado'),
            'cliente_id' => $clienteId,
            'situacao' => 'Lead',
        ];

        // Verificar se os campos obrigatórios da empresa estão preenchidos
        if (!empty($dataEmpresa['nome']) && !empty($dataEmpresa['endereco_cidade']) && !empty($dataEmpresa['endereco_estado'])) {
            // Instanciar o modelo da empresa e inserir os dados
            $empresaModel = new Empresa();
            $insertEmpresa = $empresaModel->insert($dataEmpresa);

            // Verificar se a inserção foi bem-sucedida
            if ($insertEmpresa === false) {
                $errors = $empresaModel->errors();
                return redirect()->back()->with('error', 'Erro ao registrar empresa: ' . implode(', ', $errors))->withInput();
            }
        }

        $existingCompany = $clienteModel->where('cnpj', $data['cnpj'])
                                    ->first();

        if ($existingCompany) {
            return redirect()->back()->with('error', 'Erro: O Cnpj já está registrado.')->withInput();
        }


        if ($data['cnpj']) {
            // Enviar o CNPJ e clienteId para o EmpresaController
            $empresaController = new EmpresaController();
            $empresaData = $empresaController->fetchCnpjData($data['cnpj'], $clienteId, $additionalData);
        }

        // Usando métodos do EmailController (presumindo que ele esteja disponível)
        $this->emailController->emailCliente($data);
        $this->emailController->emailDiretoria($data);

        // Retornar com mensagem de sucesso
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

        $socio_assModel = new Socio_ass();
        $socio_asses = $socio_assModel->where('empresa_id', $empresaId)->first();
        

        $data = [
            'cliente' => $cliente,
            'empresa' => $empresa,
            'atividades' => $atividades,
            'contabilidade' => $contabilidade,
            'socios' => $socios,
            'socio_asses' => $socio_asses,
        ];

        return view('editarCliente', ['data' => $data]);
    }



    public function atualizarCliente($id = null)
    {   
        $empresaId = $this->request->getPost('empresa_id');
        if (!$empresaId) {
            return redirect()->back()->with('error', 'ID da empresa não fornecido.');
        }

        // Atualizando dados do cliente
        $dataCliente = [
            'nome' => $this->request->getPost('nome_contato'),
            'email' => $this->request->getPost('email_contato'),
            'tel' => $this->request->getPost('tel_contato'),
            'cpf' => $this->request->getPost('cpf_contato'),
        ];
        $clienteModel = new Cliente_lead();
        $clienteModel->where('id', $id)->update(null, $dataCliente);

        // Atualizando dados da empresa
        $empresaId = $this->request->getPost('empresa_id');
        $dataEmpresa = [
            'cnpj' => $this->request->getPost('cnpj'),
            'nome' => $this->request->getPost('nome_empresa'),
            'fantasia' => $this->request->getPost('fantasia'),
            'tel' => $this->request->getPost('tel_empresa'),
            'faturamento' => $this->request->getPost('faturamento'),
            'funcionarios' => $this->request->getPost('funcionarios'),
            'tributacao' => $this->request->getPost('tributacao'),
            'porte' => $this->request->getPost('porte'),
            'nfe' => $this->request->getPost('nfe'),
            'atividade_principal_codigo' => $this->request->getPost('atividade_principal_codigo'),
            'atividade_principal_texto' => $this->request->getPost('atividade_principal_texto'),
            'lancamento' => $this->request->getPost('lancamento'),
            'natureza_juridica' => $this->request->getPost('natureza_juridica'),
            'capital_social' => $this->request->getPost('capital_social'),
            'abertura' => $this->request->getPost('abertura'),
            'tipo' => $this->request->getPost('tipo'),
            'situacao' => $this->request->getPost('situacao'),

            // Endereço da empresa
            'endereco_cep' => $this->request->getPost('endereco_empresa_cep'),
            'endereco_rua' => $this->request->getPost('endereco_empresa_rua'),
            'endereco_numero' => $this->request->getPost('endereco_empresa_numero'),
            'endereco_complemento' => $this->request->getPost('endereco_empresa_complemento'),
            'endereco_bairro' => $this->request->getPost('endereco_empresa_bairro'),
            'endereco_cidade' => $this->request->getPost('endereco_empresa_cidade'),
            'endereco_estado' => $this->request->getPost('endereco_empresa_estado'),
        ];
        $empresaModel = new Empresa();
        $empresaModel->where('id', $empresaId)->update(null, $dataEmpresa);

        // Atualizando ou inserindo dados do sócio-associado
        $socioAssModel = new Socio_ass();
        $dataSocioAss = [
            'nome' => $this->request->getPost('socio_asses_nome'),
            'nacionalidade' => $this->request->getPost('socio_asses_nacional'),
            'email' => $this->request->getPost('socio_asses_email'),
            'idade' => $this->request->getPost('socio_asses_idade'),
            'rg' => $this->request->getPost('socio_asses_rg'),
            'cpf' => $this->request->getPost('socio_asses_cpf'),
            'endereco_cep' => $this->request->getPost('socio_asses_endereco_cep'),
            'endereco_cidade' => $this->request->getPost('socio_asses_endereco_cidade'),
            'endereco_bairro' => $this->request->getPost('socio_asses_endereco_bairro'),
            'endereco_rua' => $this->request->getPost('socio_asses_endereco_rua'),
            'endereco_complemento' => $this->request->getPost('socio_asses_endereco_complemento'),
            'endereco_numero' => $this->request->getPost('socio_asses_endereco_numero'),
            'endereco_estado' => $this->request->getPost('socio_asses_endereco_estado'),
        ];

        // Checando se já existe um registro com o mesmo 'empresa_id'
        $existingSocioAss = $socioAssModel->where('empresa_id', $empresaId)->first();

        if (!$existingSocioAss) {
            // Se não existe, insere um novo registro
            $dataSocioAss['empresa_id'] = $empresaId;
            $socioAssModel->insert($dataSocioAss);
        } else {
            // Se existe, atualiza o registro existente
            $socioAssModel->update($existingSocioAss['id'], $dataSocioAss);
        }


        // Atualizando ou inserindo dados da Contabilidade
        $contabilidadeModel = new Contabilidade();
        $dataContabilidade = [
            'inicio_contabilidade' => $this->request->getPost('inicio_contabilidade'),
            'competencia' => $this->request->getPost('competencia'),
            'honorario' => $this->request->getPost('honorario'),
            'honorario_texto' => $this->request->getPost('honorario_texto'),
        ];

        // Insira um novo registro se não existir, incluindo `empresa_id`
        if (!$contabilidadeModel->where('empresa_id', $empresaId)->first()) {
            $dataContabilidade['empresa_id'] = $empresaId;
            $contabilidadeModel->insert($dataContabilidade);
        } else {
            $contabilidadeModel->where('empresa_id', $empresaId)->update(null, $dataContabilidade);
        }

        // Atualizando os sócios
        $socioModel = new Socio();
        $socios = $this->request->getPost('socios');

        // Verifica se socios é um array; caso contrário, define como array vazio
        if (!is_array($socios)) {
            $socios = [];
        }

        foreach ($socios as $socio) {
            // Preencher o ID da empresa
            $socio['empresa_id'] = $empresaId;

            // Verificar se já existe um sócio com o mesmo nome, qualificação e empresa_id
            $existingSocio = $socioModel->where([
                'nome' => $socio['nome'],
                'qualifica' => $socio['qualifica'],
                'empresa_id' => $empresaId,
            ])->first();

            if ($existingSocio) {
                // Se existe um registro com dados idênticos, atualiza-o
                $socioModel->update($existingSocio['id'], $socio);
            } else {
                // Caso contrário, insere um novo sócio
                $socioModel->insert($socio);
            }
        }


        // Atualizando atividades secundárias
        $atividadeModel = new Atividade();
        $atividades = $this->request->getPost('atividades');
        $atividadeModel->where('empresa_id', $empresaId)->delete();

        if (is_array($atividades)) {
            foreach ($atividades as $atividade) {
                $atividade['empresa_id'] = $empresaId;
                $atividadeModel->insert($atividade);
            }
        }


        // Redirecionar de volta para a mesma página com uma mensagem de sucesso
        return redirect()->to(previous_url())->with('success', 'Registro atualizado com sucesso.');
    }

    public function arquivarCliente($id = null)
    {
        if ($id === null) {
            // Redireciona ou lida com erro de ID não fornecido
            return redirect()->back()->with('error', 'ID necessário para arquivar cliente');
        }

        $empresaModel = new Empresa();
        
        // Confirme se existe um registro com esse ID antes de tentar atualizar
        $empresa = $empresaModel->find($id);
        if (!$empresa) {
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }

        $dataEmpresa = [
            'situacao' => 'Arquivado',
        ];

        // Verificar se os dados não estão vazios
        if (empty($dataEmpresa)) {
            return redirect()->back()->with('error', 'Não há dados para atualizar.');
        }

        $updated = $empresaModel->update($id, $dataEmpresa);
        if ($updated) {
            // Sucesso na atualização
            return redirect()->back()->with('success', 'Cliente arquivado com sucesso.');
        } else {
            // Falha na atualização
            return redirect()->back()->with('error', 'Erro ao arquivar cliente.');
        }
    }
}