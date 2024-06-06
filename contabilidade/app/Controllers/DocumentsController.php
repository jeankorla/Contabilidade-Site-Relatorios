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
    helper('text');
    $empresaModel = new Empresa();
    $documentModel = new Documents();

    $empresa = $empresaModel->find($id);
    if (!$empresa) {
        return redirect()->back()->with('error', 'Empresa não encontrada.');
    }

    $cnpj = preg_replace('/[^0-9]/', '', $empresa['cnpj']);
    $dirPath = './documents/' . $cnpj;

    if (!is_dir($dirPath) && !mkdir($dirPath, 0755, true)) {
        log_message('error', "Falha ao criar o diretório: $dirPath");
        return redirect()->back()->with('error', 'Falha ao criar diretório para documentos.');
    }

    $files = $this->request->getFiles();
    $existingDocument = $documentModel->where('empresa_id', $id)->first();
    $data = $existingDocument ? ['id' => $existingDocument['id']] : ['empresa_id' => $id];

    // Campo sempre texto
    $data['senha_certificado_digital'] = $this->request->getPost('senha_certificado_digital');

    // Campos que são sempre arquivos
    $singleFileFields = [
        'social_registrado', 'certificado_digital', 'ctps', 'convencao_coletiva', 
        'alvara_funcionamento', 'balancete_ultimo', 'balanco_patrimonial', 
        'livro_corrente', 'livro_encerrado'
    ];

    foreach ($singleFileFields as $field) {
        $file = $this->request->getFile($field);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if ($file->move($dirPath, $newName)) {
                $data[$field] = $dirPath . '/' . $newName;
            } else {
                log_message('error', "Falha ao mover o arquivo $field");
            }
        }
    }

    // Campos que podem ser arquivo ou texto
foreach (['posto_fiscal', 'simples_nacional', 'prefeitura_nfse', 'previdencia_social'] as $field) {
    $typeField = $this->request->getPost("tipo_{$field}");
    if ($typeField === 'texto') {
        $data[$field] = $this->request->getPost("{$field}_text");
    } elseif ($typeField === 'arquivo') {
        $file = $files["{$field}_file"] ?? null; // Use the null coalescing operator to handle undefined index
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if ($file->move($dirPath, $newName)) {
                $data[$field] = $dirPath . '/' . $newName;
            } else {
                log_message('error', "Falha ao mover o arquivo $field");
            }
        } else {
            // Handle cases where no file is uploaded but 'arquivo' is selected
            if (!$file) {
                log_message('error', "Nenhum arquivo enviado para $field, mas 'arquivo' foi selecionado.");
            }
        }
    }
}


    // Salvar ou atualizar os dados no banco
    if (!$documentModel->save($data)) {
        log_message('error', 'Falha ao salvar os dados do documento no banco de dados.');
        return redirect()->back()->with('error', 'Falha ao salvar os documentos.');
    }

    return redirect()->to(previous_url())->with('success', 'Documentos atualizados com sucesso.');
}






   public function deleteDocument()
{
    $json = $this->request->getJSON();
    $docKey = $json->docKey;
    $empresaId = $json->empresaId;

    $documentModel = new Documents();
    $document = $documentModel->where('empresa_id', $empresaId)->first();

    if (!$document) {
        return $this->response->setJSON(['success' => false, 'message' => 'Documento não encontrado.']);
    }

    if (empty($document[$docKey])) {
        return $this->response->setJSON(['success' => false, 'message' => 'Arquivo não encontrado ou já excluído.']);
    }

    if (file_exists($document[$docKey])) {
        unlink($document[$docKey]);
    }

    $updateData = [$docKey => null];
    if ($documentModel->update($document['id'], $updateData)) {
        session()->setFlashdata('success', 'Documento excluído com sucesso.');
        return $this->response->setJSON(['success' => true]);
    }

    return $this->response->setJSON(['success' => false, 'message' => 'Falha ao atualizar o registro.']);
}




}