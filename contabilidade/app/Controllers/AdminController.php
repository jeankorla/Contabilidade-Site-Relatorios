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
        return redirect()->to('admincontroller')->with('success', 'Registro atualizado com sucesso.');
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

        // Atualize o registro com os novos dados.
        $data = $this->request->getPost();
        $abrirModel->update($id, $data);

        // Redirecione de volta com uma mensagem de sucesso.
        return redirect()->to('admincontroller')->with('success', 'Registro atualizado com sucesso.');
    }


}
