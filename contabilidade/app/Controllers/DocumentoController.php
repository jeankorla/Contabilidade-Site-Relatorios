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

        $cliente = $trocar->find($id);

        if (!$trocar) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        $dompdf = new Dompdf();

        $dompdf->loadHtml('hello world');

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }
}