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

    $data = ['empresa_id' => $id];
    $files = $this->request->getFiles();
    $postData = $this->request->getPost();
    
    foreach ($files as $fileKey => $file) {
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            if (!$file->move($dirPath, $newName)) {
                log_message('error', "Falha ao mover o arquivo $fileKey");
                continue; // Não interrompe o loop, tenta processar os próximos arquivos
            }
            $data[$fileKey] = $dirPath . '/' . $newName;
        }
    }

    // Coletar e validar dados de texto
    foreach ($postData as $key => $value) {
        if (in_array($key, $documentModel->allowedFields) && !empty($value)) {
            $data[$key] = $value;
        }
    }

    // Checando se há dados válidos para atualizar ou inserir
    if (empty($data)) {
        log_message('error', 'Nenhum dado válido para atualização ou inserção.');
        return redirect()->back()->with('error', 'Nenhum dado válido para atualização ou inserção.');
    }

    // Atualizar ou inserir os dados
    if ($existingDocument = $documentModel->where('empresa_id', $id)->first()) {
        if (!$documentModel->update($existingDocument['id'], $data)) {
            log_message('error', 'Falha ao atualizar os dados do documento no banco de dados.');
            return redirect()->back()->with('error', 'Falha ao atualizar os documentos.');
        }
    } else {
        if (!$documentModel->insert($data)) {
            log_message('error', 'Falha ao inserir os dados do documento no banco de dados.');
            return redirect()->back()->with('error', 'Falha ao inserir os documentos.');
        }
    }

    // Redirecionar de volta para a mesma página com uma mensagem de sucesso
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