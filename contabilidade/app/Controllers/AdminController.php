<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Atividade;
use App\Models\Contabilidade;
use App\Models\Socio;




class AdminController extends BaseController
{
    public function index()
    {
        // Verifica se o usuário está autenticado
        if (!session()->get('isLoggedIn')) {
            // Caso não esteja autenticado, redireciona para a tela de login
            return redirect()->back()->with('error', 'Credenciais inválidas.')->withInput();
        }

        $clienteModel = new Cliente_lead;
        $clientes = $clienteModel->findAll();

        $empresaModel = new Empresa;
        $empresas = $empresaModel->findAll();

        $atividadeModel = new Empresa;
        $atividades = $atividadeModel->findAll();

        $contabilidadeModel = new Empresa;
        $contabilidades = $contabilidadeModel->findAll();

        $socioModel = new Empresa;
        $socios = $contabilidadeModel->findAll();

        return view('admin', ['clientes' => $clientes, 'empresas' => $empresas, 'atividades' => $atividades, 'contabilidades' => $contabilidades, 'socios' => $socios ]);
    }
}
