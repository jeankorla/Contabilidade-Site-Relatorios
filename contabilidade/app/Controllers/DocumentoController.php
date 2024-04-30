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
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                table { width: 100%; border-collapse: collapse; }
                th, td { border: 1px solid #dddddd; padding: 8px; text-align: left; }
                h1, h2, h3 { text-align: center; }
            </style>
        </head>
        <body>
            <h1>Contrato de Prestação de Serviços Profissionais</h1>
            <p><strong>Contratante:</strong> ' . ($cliente['nome'] ?? 'Nome do Cliente') . '</p>
            <p><strong>Contratado:</strong> ' . ($cliente['nome_empresa'] ?? 'Nome da Empresa do cliente') . '</p>
            <h2>Cláusulas e Condições</h2>
            <p>Aqui você pode adicionar todo o texto do seu contrato, formatado em parágrafos e listas como necessário.</p>
            <p><strong>Duração:</strong> Este contrato é feito por tempo indeterminado, iniciando-se em ' . date("d/m/Y") . '.</p>
            <h3>Serviços</h3>
            <p>Os serviços a serem prestados incluem, mas não estão limitados a:</p>
            <ul>
                <li>Contabilidade Geral</li>
                <li>Obrigações Fiscais</li>
                <li>Departamento de Pessoal</li>
            </ul>
            <p><strong>Valor dos Serviços:</strong> R$ ' . ($cliente['faturamento'] ?? '0,00') . '</p>
            <p>Este documento foi gerado automaticamente e não requer assinatura.</p>
        </body>
        </html>';

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
