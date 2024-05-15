<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Atividade;
use App\Models\Contabilidade;
use App\Models\Socio;
use App\Models\Socio_ass;
use App\Models\Documents;

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

    public function formView($id = null)
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

        $documentsModel = new Documents();
        $documents = $documentsModel->where('empresa_id', $empresaId)->first();
        

        $data = [
            'cliente' => $cliente,
            'empresa' => $empresa,
            'atividades' => $atividades,
            'contabilidade' => $contabilidade,
            'socios' => $socios,
            'socio_asses' => $socio_asses,
            'documents' => $documents,
        ];

        return view('documents', ['data' => $data]);
    }


    public function storeDocuments($id = null)
    {
        $empresaModel = new \App\Models\Empresa();
        $documentModel = new \App\Models\Documents();

        // Obter a empresa pelo ID para acessar o CNPJ
        $empresa = $empresaModel->find($id);
        if (!$empresa) {
            return redirect()->back()->with('error', 'Empresa não encontrada.');
        }

        $cnpj = $empresa['cnpj'];
        $dirPath = './documents/' . $cnpj;

        // Verifica se o diretório existe, se não, cria
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755, true);
        }

        // Processa cada arquivo enviado
        $files = $this->request->getFiles();
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName(); // Gera um novo nome aleatório para o arquivo
                $file->move($dirPath, $newName);

                // Preparar dados para salvar no banco de dados
                $data = [
                    'empresa_id' => $id,
                    'caminho_arquivo' => $dirPath . '/' . $newName,
                ];

                // Salvar no banco de dados
                $documentModel->save($data);
            }
        }

        return redirect()->to('/some/route')->with('success', 'Arquivos carregados com sucesso.');
    }

}