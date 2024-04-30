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

        // Criar o conteúdo HTML incorporando os dados do cliente
        $html = '<h1>Informações do Cliente</h1>';
        $html .= '<table>';
        foreach ($cliente as $campo => $valor) {
            $html .= '<tr><td><strong>' . ucfirst($campo) . ':</strong></td><td>' . $valor . '</td></tr>';
        }
        $html .= '</table>';

        // Carregar o conteúdo HTML no Dompdf
        $dompdf->loadHtml($html);

        // Definir o tipo de papel e orientação
        $dompdf->setPaper('A4', 'landscape');

        // Renderizar o PDF
        $dompdf->render();

        // Enviar o PDF gerado para o navegador
        $dompdf->stream('documento_cliente.pdf');
    }
}
