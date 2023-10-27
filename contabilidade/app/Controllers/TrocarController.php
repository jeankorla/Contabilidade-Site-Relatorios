<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Trocar;

class TrocarController extends BaseController
{
    public function store()
    {
        $nome = $this->request->getPost('nome');
        $destinatarioEmail = $this->request->getPost('email');
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
            'email' => $destinatarioEmail,
            'tel' => $tel,
            'cnpj' => $cnpj,
            'nome_empresa' => $nome_empresa,
            'faturamento' => $faturamento,
            'funcionarios' => $funcionarios,
            'tributacao' => $tributacao,
            'estado' => $estado
        ];

        $trocarModel->insert($data);

        $this->sendEmail($nome, $destinatarioEmail, $nome_empresa);

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }

     public function sendEmail($nome, $destinatarioEmail, $nome_empresa)
    {
        $email = \Config\Services::email();

        $email->setFrom('jean@sccontab.com.br', 'Jean SC'); // E-mail e nome do remetente
        $email->setTo($destinatarioEmail); // E-mail do destinatário

        $email->setSubject('Bem vindo a Spolaor ' . $nome); // Assunto do e-mail
        $email->setMessage('é um prazer ter voce como nosso futuro cliente, que esse vinculo da Spolaor Contabilidade com a ' . $nome_empresa . ' possa ser grandioso, segue abaixo
        os serviços que faremos para tornar o futuro da sua empresa melhor'); // Corpo do e-mail

        // Anexando o arquivo
        $pathToAttachment = WRITEPATH . 'uploads/proposta_trocar.pdf';

        // Verificando se o arquivo existe
        if (!file_exists($pathToAttachment)) {
            echo "Erro: O arquivo 'documento.pdf' não foi encontrado no caminho especificado.";
            return; // Encerra a execução do método aqui
        }
        
        $email->attach($pathToAttachment);

        if ($email->send()) {
            echo "E-mail enviado com sucesso!";
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data); // Mostra informações sobre possíveis erros
        }
    }
}
