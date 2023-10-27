<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Abrir;

class AbrirController extends BaseController
{


    public function store()
    {
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cpf = $this->request->getPost('cpf');
        $estado = $this->request-> getPost('estado');

        $abrirModel = new Abrir;

        $data = [
            
            'nome' => $nome,
            'email' => $email,
            'tel' => $tel,
            'cpf' => $cpf,
            'estado' => $estado
        ];

        $abrirModel->insert($data);

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }

   
}
