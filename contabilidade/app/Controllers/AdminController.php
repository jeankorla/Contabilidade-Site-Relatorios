<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Abrir;
use App\Models\Trocar;


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

        $abrirModel = new Abrir;

        $trocar = $trocarModel->findAll();

        $abrir = $abrirModel->findAll();


        return view('admin', ['trocar' => $trocar, 'abrir' => $abrir]);
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
        $trocarModel = new Trocar();

        // Atualize o registro com os novos dados.
        $data = $this->request->getPost();
        $trocarModel->update($id, $data);

        // Redirecione de volta com uma mensagem de sucesso.
        return redirect()->to('AdminController')->with('success', 'Registro atualizado com sucesso.');
    }

    
     public function editarAbrir($id = null)
    {
        $abrirModel = new Abrir();

        // Busque o registro pelo ID.
        $registro = $abrirModel->find($id);

        // Se não encontrarmos um registro com esse ID, retornamos para a lista com uma mensagem.
        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        // Carregue a view com o registro para edição.
        return view('editarAbrir', ['registro' => $registro]);
    }

    public function atualizarAbrir($id = null)
    {
        $abrirModel = new Abrir();

        // Verifica se os dados foram recebidos corretamente
        $data = $this->request->getPost();
        var_dump($data);
        dd($data);

        exit;

        if (empty($data)) {
            return redirect()->back()->with('error', 'Nenhum dado recebido para atualização.');
        }

        // Atualize o registro com os novos dados.
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
