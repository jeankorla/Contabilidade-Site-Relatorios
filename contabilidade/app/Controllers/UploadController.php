<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UploadController extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        
        $data = [];
        $rules = [
            'file' => 'uploaded[file]|max_size[file,100000]|ext_in[file,jpg,jpeg,png,gif,rar,zip,pdf,xml,docx,doc,docm,csv,xlsx,mp4,txt,mp3]'
        ];
        
        if (!$this->validate($rules)) {
            $data['error'] = $this->validator->getError();
        } else {
            $file = $this->request->getFile('file');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);

                $data['message'] = 'Arquivo enviado com sucesso, Copie seu Link.';
                $data['url'] = base_url('gerador/index/' . $newName);
            } else {
                $data['error'] = 'Erro ao enviar o arquivo.';
            }
        }
        echo view('link_upload', $data);
    }
}
