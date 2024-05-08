<?php

namespace App\Controllers;

use App\Models\Cliente_lead;
use CodeIgniter\Controller;

class PropostaController extends Controller
{
    public function gerarProposta($clienteId)
    {
        // Carregar o modelo do cliente
        $clienteModel = new Cliente_lead();
        $cliente = $clienteModel->find($clienteId);

        // Verificar se o cliente existe
        if (!$cliente) {
            return "Cliente não encontrado!";
        }

        // Nome do arquivo será o nome do cliente
        $fileName = preg_replace('/\s+/', '_', $cliente['nome']) . '.php';

        // Conteúdo do arquivo
        $content = "<?php\n\n";
        $content .= "// Informações do cliente\n";
        $content .= "\$nomeContato = '{$cliente['nome']}';\n";
        $content .= "\$emailContato = '{$cliente['email']}';\n";
        $content .= "\$telefoneContato = '{$cliente['tel']}';\n";
        $content .= "\$cpfContato = '{$cliente['cpf']}';\n";
        $content .= "\n?>";

        // Caminho do arquivo onde será salvo
        $filePath = './propostas/' . $fileName;

        // Certifique-se de que a pasta exista
        if (!is_dir('propostas')) {
            mkdir('propostas', 0755, true);
        }

        // Escrever o arquivo no caminho especificado
        file_put_contents($filePath, $content);

        return "Proposta gerada com sucesso! <a href='" . base_url("./propostas/$fileName") . "'>Download Proposta</a>";
    }
}
