<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Trocar;
use Dompdf\Dompdf;

class DocumentoController extends BaseController
{
    public function gerarDocTroca($id = null)
    {
        $trocar = new Trocar();

        // Buscando os dados do cliente pelo ID.
        $cliente = $trocar->find($id);

        if (!$cliente) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        // Criar uma instância do Dompdf
        $dompdf = new Dompdf();

        // Corpo do contrato em HTML
        $htmlContent = '
        <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Prestação de Serviços Profissionais</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #dddddd; padding: 8px; text-align: left; }
        h1, h2, h3 { text-align: center; }
        p { text-align: justify; margin: 20px; }
        .clausula { font-weight: bold; margin-top: 20px; }
        .assinatura { text-align: center; margin-top: 30px; }
        .linha-assinatura { border-bottom: 1px solid black; width: 300px; margin: 20px auto; }
        .testemunhas { margin-top: 50px; }
    </style>
</head>
<body>
    <h1>Contrato de Prestação de Serviços Profissionais</h1>
    <p>Pelo presente instrumento particular de Contrato de Prestação de Serviços Contábeis, de acordo com a Resolução CFC n.º 1.457/13 publicada no DOU 13/12/2013, de um lado PRO ATIVA ARQUITETURA LTDA., CNPJ nº 34.577.124/0001-56, estabelecida à Rua Robert Sandall, 161, Ponta da Praia, Santos - SP – CEP: 11.030-530, doravante denominada CONTRATANTE, neste ato representada pelo titular Carlos Aloise de Menezes Pereira, brasileiro, maior, portados do R.G. nº 37.948.605 SSP/SP e do CPF/MF nº 444.002.648-66, residente e domiciliado à Rua Robert Sandall, 161, Ponta da Praia, Santos - SP – CEP: 11.030-530; e do outro lado, a empresa contábil SPOLAOR CONTABILIDADE LTDA - EPP, inscrita no CNPJ n.º 39.897.569/0001-37 e no CRC/SP 2SP042992/O-6, representada neste ato pelo Único Sócio e Responsável Técnico Sr. Marcos Roberto Spolaor Antunes, brasileiro, maior, casado, CONTADOR, estabelecido à Rua Guaió n.º 66 Sala 915/916 – Aparecida – 11.035-260 – Santos/SP, inscrito no CRC/SP sob n°1SP191034/O-2, portador da C.I.R.G. n.º 23.834.604-3 SSP/SP e do CPF n.º 159.081.408-80, doravante CONTRATADO(A), mediante as cláusulas e condições seguintes, tem justo e contratado que se segue:</p>
    <!-- Exemplo de cláusula -->
    <div class="clausula">
        <p>CLÁUSULA PRIMEIRA. O profissional contratado obriga-se a prestar seus serviços profissionais ao contratante, nas seguintes áreas:</p>
       
            <p>1. CONTABILIDADE</p>
            <p>1.1. Elaboração da Contabilidade de acordo com as Normas Brasileiras de Contabilidade.</p>
            <p>1.2. Emissão de balancetes.</p>
            <p>1.3. Elaboração de Balanço Patrimonial e demais Demonstrações Contábeis obrigatórias.</p>
       
        
            <p>2. OBRIGAÇÕES FISCAIS</p>
            <p>2.1. Orientação e controle de aplicação dos dispositivos legais vigentes, sejam federais, estaduais ou municipais.</p>
            <p>2.2. Elaboração dos registros fiscais obrigatórios, eletrônicos ou não, perante os órgãos municipais, estaduais e federais, bem como as demais obrigações que se fizerem necessárias, exceto obrigações acessórias de outras áreas técnicas, tais como: Declaração Ibama, Cetesb, etc...</p>
            <p>2.3. Atendimento às demais exigências previstas na legislação, bem como aos eventuais procedimentos fiscais.</p>
        
    </div>
    <!-- Continuação das cláusulas -->
    <div class="assinatura">
        <p>Santos/SP, 09 de Maio de 2023.</p>
        <div class="linha-assinatura">SPOLAOR CONTABILIDADE LTDA - EPP</div>
        <div class="linha-assinatura">PRO ATIVA ARQUITETURA LTDA.</div>
    </div>
    <div class="testemunhas">
        <h3>Testemunhas</h3>
        <div class="linha-assinatura">1. Amanda Cristina Machado</div>
        <div class="linha-assinatura">2. Hugo
';

        // Carregar o conteúdo HTML no Dompdf
        $dompdf->loadHtml($htmlContent);

        // Definir o tipo de papel e orientação
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar o PDF
        $dompdf->render();

        // Enviar o PDF gerado para o navegador
        $dompdf->stream('contrato_servicos_profissionais.pdf');
    }
}
