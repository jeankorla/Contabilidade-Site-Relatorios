<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Trocar;

class TrocarController extends BaseController
{
    public function store()
    {
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cnpj = $this->request->getPost('cnpj');
        $nome_empresa = $this->request->getPost('nome_empresa');
        $faturamento = $this->request->getPost('faturamento');
        $funcionarios = $this->request->getPost('funcionarios');
        $tributacao = $this->request->getPost('tributacao');
        $estado = $this->request->getPost('estado');

        $trocarModel = new Trocar;

        $data = [
            'nome' => $nome,
            'email' => $email,
            'tel' => $tel,
            'cnpj' => $cnpj,
            'nome_empresa' => $nome_empresa,
            'faturamento' => $faturamento,
            'funcionarios' => $funcionarios,
            'tributacao' => $tributacao,
            'estado' => $estado
        ];

        $trocarModel->insert($data);

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }
}
