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

        $trocarModel = new Trocar;

        $clienteModel = new Cliente;

        $trocar = $trocarModel->findAll();

        $clientes = $clienteModel->finAll();


        return view('admin', ['trocar' => $trocar, 'clientes' => $clientes]);
    }

        public function editarTrocar($id = null)
    {
        $trocarModel = new Trocar();

        // Busque o registro pelo ID.
        $registro = $trocarModel->find($id);

        // Se não encontrarmos um registro com esse ID, retornamos para a lista com uma mensagem.
        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        // Carregue a view com o registro para edição.
        return view('editarTrocar', ['registro' => $registro]);
    }

    public function atualizarTrocar($id = null)
    {
        $nome = $this->request->getPost('nome');
        $destinatarioEmail = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cnpj = $this->request->getPost('cnpj');
        $nome_empresa = $this->request->getPost('nome_empresa');
        $faturamento = $this->request->getPost('faturamento');
        $funcionarios = $this->request->getPost('funcionarios');
        $tributacao = $this->request->getPost('tributacao');
        $nfe = $this->request->getPost('nfe');
        $lancamento = $this->request->getPost('lancamento');
        $estado = $this->request->getPost('estado');

        $trocarModel = new Trocar;

        $data = [
            'nome' => $nome,
            'email' => $destinatarioEmail,
            'tel' => $tel,
            'cnpj' => $cnpj,
            'nome_empresa' => $nome_empresa,
            'faturamento' => $faturamento,
            'funcionarios' => $funcionarios,
            'tributacao' => $tributacao,
            'nfe' => $nfe,
            'lancamento' => $lancamento,
            'estado' => $estado
        ];

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
