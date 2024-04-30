<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Troca;
use Dompdf\Dompdf;

class DocumentoController extends BaseController
{
    public function gerarDocTroca($id = null)
    {
        $troca = new Troca();

        $cliente = $trocarModel->find($id);

        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        $dompdf = new Dompdf();

        $dompdf->loadHtml('hello world');

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }
}