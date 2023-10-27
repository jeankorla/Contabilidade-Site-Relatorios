<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class EmailController extends Controller
{

    public function getEmailSignature()
        {
             return "
        <div style='margin-top: 20px; border-top: 1px solid #ddd; padding-top: 20px;'>
            <img alt='' src='https://scia.com.br/assinatura/assinatura.png'>
        </div>
    ";
        }
    public function sendEmail()
    {
        $email = \Config\Services::email();

        $email->setFrom('jean@sccontab.com.br', 'Jean SC'); // E-mail e nome do remetente
        $email->setTo('ti@sccontab.com.br'); // E-mail do destinatário

         $mensagem = 'É um prazer ter você como nosso futuro cliente. Que esse vínculo da Spolaor Contabilidade com a  possa ser grandioso. Segue abaixo os serviços que faremos para tornar o futuro da sua empresa melhor.';

          // Anexar a assinatura ao final da mensagem
        $mensagem .= $this->getEmailSignature();

        $email->setSubject('CodeIgniter 4 EMAIL'); // Assunto do e-mail
       

        $email->setMessage($mensagem, 'html');
       

        // Anexando o arquivo
        $pathToAttachment = WRITEPATH . 'uploads/marcos.png';

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
