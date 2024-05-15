<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Atividade;
use App\Models\Contabilidade;
use App\Models\Socio;
use App\Models\Socio_ass;

class DocumentsController extends BaseController
{
    public function showDocuments($id = null)
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

        return view('showDocuments', ['data' => $data]);
    }
}