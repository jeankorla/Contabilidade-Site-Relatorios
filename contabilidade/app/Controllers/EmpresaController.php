<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Controllers\EmailController;

date_default_timezone_set('America/Sao_Paulo');

class EmpresaController extends BaseController
{   
    public function fetchCnpjData($cnpj)
    {
        // Remove pontos, traços e barras do CNPJ
        $cleanCnpj = preg_replace('/[\.\/\-]/', '', $cnpj);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://receitaws.com.br/v1/cnpj/" . $cleanCnpj,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $this->processCnpjResponse(json_decode($response, true));
        }
    }


    private function processCnpjResponse($data)
    {
        if ($data['status'] !== 'OK') {
            return ['error' => 'Não foi possível obter dados do CNPJ'];
        }

        // Mapeamento de DE PARA conforme seu banco de dados
        $data = [

            'cnpj'                                  => $data['cnpj'],
            'nome'                                  => $data['nome'],
            'email'                                 => $data['email'],
            'tel'                                   => $data['telefone'],
            'fantasia'                              => $data['fantasia'],
            'tributacao'                            => $data['porte'],
            'endereco_cep'                          => $data['cep'],
            'endereco_rua'                          => $data['logradouro'],
            'endereco_numero'                       => $data['numero'],
            'endereco_complemento'                  => $data['complemento'],
            'endereco_bairro'                       => $data['bairro'],
            'endereco_cidade'                       => $data['municipio'],
            'endereco_estado'                       => $data['uf'],
            'natureza_juridica'                     => $data['natureza_juridica'],
            'atividade_principal_codigo'            => $data['atividade_principal'][0]['code'],
            'atividade_principal_texto'             => $data['atividade_principal'][0]['text'],
            'capital_social'                        => $data['capital_social'],
            'abertura'                              => $data['abertura'],
            'tipo'                                  => $data['tipo'],
            
        ];

        $empresaModel = new Empresa();
        $empresaModel->insert($data);
    }

}