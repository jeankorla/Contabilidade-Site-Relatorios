<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Abrir;
use App\Models\Trocar;
use App\Models\Cliente;


class AdminController extends BaseController
{
    public function index()
    {
        // Verifica se o usuário está autenticado
        if (!session()->get('isLoggedIn')) {
            // Caso não esteja autenticado, redireciona para a tela de login
            return redirect()->back()->with('error', 'Credenciais inválidas.')->withInput();
        }

        $clienteModel = new Cliente;

        $clientes = $clienteModel->findAll();


        return view('admin', ['clientes' => $clientes]);
    }


        public function editarCliente($id = null)
    {
        $clienteModel = new Cliente;;

        // Busque o registro pelo ID.
        $registro = $clienteModel->find($id);

        // Se não encontrarmos um registro com esse ID, retornamos para a lista com uma mensagem.
        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        // Carregue a view com o registro para edição.
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

        $trocarModel->update($id, $data);

        // Redirecione de volta com uma mensagem de sucesso.
        return redirect()->to('AdminController')->with('success', 'Registro atualizado com sucesso.');
    }

    public function editarAbrir($id = null)
{
    $abrirModel = new Abrir();

    // Busque o registro pelo ID.
    $registro = $abrirModel->find($id);

    // Se não encontrarmos um registro com esse ID, retorne para a lista com uma mensagem.
    if (!$registro) {
        return redirect()->back()->with('error', 'Registro não encontrado.');
    }

    // Carregue a view com o registro para edição.
    return view('editarAbrir', ['registro' => $registro]);
}

public function atualizarAbrir($id = null)
{
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cpf = $this->request->getPost('cpf');
        $nfe = $this->request->getPost('nfe');
        $lancamento = $this->request->getPost('lancamento');
        $estado = $this->request-> getPost('estado');

        $abrirModel = new Abrir;

        $data = [
            'nome' => $nome,
            'email' => $email,
            'tel' => $tel,
            'cpf' => $cpf,
            'estado' => $estado,
            'nfe' => $nfe,
            'lancamento' => $lancamento,
        ];

    $abrirModel->update($id, $data);

    // Redirecione de volta com uma mensagem de sucesso.
    return redirect()->to('AdminController')->with('success', 'Registro atualizado com sucesso.');
}

    public function excluirTrocar($id = null)
    {
        $trocarModel = new Trocar();

        // Verifique se o registro existe.
        if ($trocarModel->find($id)) {
            // Exclua o registro.
            $trocarModel->delete($id);
            return redirect()->to('AdminController')->with('success', 'Registro de troca excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Registro de troca não encontrado.');
        }
    }

    public function excluirAbrir($id = null)
    {
        $abrirModel = new Abrir();

        // Verifique se o registro existe.
        if ($abrirModel->find($id)) {
            // Exclua o registro.
            $abrirModel->delete($id);
            return redirect()->to('AdminController')->with('success', 'Registro de abertura excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Registro de abertura não encontrado.');
        }
    }
}
