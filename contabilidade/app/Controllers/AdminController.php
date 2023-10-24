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


        return view('admin', ['trocar' => $trocarModel], ['abrir' => $abrirModel]);
    }
}
