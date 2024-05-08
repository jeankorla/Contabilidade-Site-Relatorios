<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Atividade;
use App\Models\Contabilidade;
use App\Models\Socio;
use App\Models\Socio_ass;




class AdminController extends BaseController
{
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

    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    // exit;

    return view('admin', ['data' => $data]);
}
}
