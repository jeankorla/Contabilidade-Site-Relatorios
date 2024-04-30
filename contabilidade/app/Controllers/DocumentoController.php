<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Trocar;
use Dompdf\Dompdf;
require_once __DIR__. '/../../vendor/sysborg/autentiquev2/src/autoloader.php';
use sysborg\autentiquev2\autentique;
use sysborg\autentiquev2\createDoc;

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
    <div>
        <p><strong>CLÁUSULA PRIMEIRA.</strong> O profissional contratado obriga-se a prestar seus serviços profissionais ao contratante, nas seguintes áreas:</p>
       
            <p><strong>1. CONTABILIDADE</strong></p>
            <p>1.1. Elaboração da Contabilidade de acordo com as Normas Brasileiras de Contabilidade.</p>
            <p>1.2. Emissão de balancetes.</p>
            <p>1.3. Elaboração de Balanço Patrimonial e demais Demonstrações Contábeis obrigatórias.</p>
       
        
            <p><strong>2. OBRIGAÇÕES FISCAIS</strong></p>
            <p>2.1. Orientação e controle de aplicação dos dispositivos legais vigentes, sejam federais, estaduais ou municipais.</p>
            <p>2.2. Elaboração dos registros fiscais obrigatórios, eletrônicos ou não, perante os órgãos municipais, estaduais e federais, bem como as demais obrigações que se fizerem necessárias, exceto obrigações acessórias de outras áreas técnicas, tais como: Declaração Ibama, Cetesb, etc...</p>
            <p>2.3. Atendimento às demais exigências previstas na legislação, bem como aos eventuais procedimentos fiscais.</p> 


            <p><strong>3. DEPARTAMENTO DE PESSOAL</strong></p>
            <p>3.1. Registros de empregados e serviços correlatos. </p>
            <p>3.2. Elaboração da folha de pagamento dos empregados e de pró-labore, bem como das guias de recolhimento dos encargos sociais e tributos afins.</p>
            <p>3.3. Elaboração, orientação e controle da aplicação dos preceitos da Consolidação das Leis do Trabalho, bem como daqueles atinentes à Previdência Social e de outros aplicáveis às relações de trabalho mantidas pela contratante.</p> 

            
            <p><strong>CLÁUSULA SEGUNDA.</strong> O(A) contratado(a) assume inteira responsabilidade pelos serviços técnicos a que se obrigou, assim como pelas orientações que prestar.</p>
            
            
            <p><strong>CLÁUSULA TERCEIRA.</strong> O(A) contratante se obriga a preparar, mensalmente, toda a documentação fisco-contábil e de pessoal, que deverá ser disponibilizada ao contratado(a) em tempo hábil, conforme cronograma pactuado entre as partes, a fim de que possa executar seus serviços na conformidade com o citado neste instrumento, tais como: Notas Fiscais de Entrada, Saída e de Serviços Prestados e Contratados, Notas de Locações Emitidas e Contratados, outros documentos em forma de faturamento e ou de reembolso à empresa, relatório de variações cambiais ativas e passivas,  Extratos de Conta Corrente e de Aplicações Financeiras, Contratos de Empréstimos, Financiamentos, Câmbio e dentre outros, Livro Caixa e de Duplicatas, Relatório de Boletos emitidos com os respectivos borderôs/francesinhas emitidos pelo banco quando de seu recebimento ou baixa e tudo pertinente a movimentação do Caixa e Banco, tais como: cópias de cheques, depósitos bancários efetuados ou recebidos identificados ou não, notas de débito ou documento fiscal de débito em C/C, etc..., bem como, o Livro de Inventário, Estoque e Produção mensal com o respectivo custo das mercadorias vendidas e ou industrializas, Bloco K e FCI quando importador, memorando de exportação, Laudos de Medicina do Trabalho, LTCAT, PCMSO, PPP, AVCB, Laudo de Vistoria Técnico do Estabelecimento da Empresa elaborado por Engenheiro, Licença do IBAMA, CETESP, Entidade de Classe e demais órgãos necessários ao início das atividades.</p>
            <p>Reembolsar ou antecipar despesas em gerais, tais como: fotocópias, autenticações, reconhecimentos de firma, impostos, taxas e contribuições necessários às despesas judiciais ou administrativas que o CONTRATADO tiver que contrair para a realização e andamento dos trabalhos, bem como, realização de cadastros e alterações cadastrais em órgãos públicos, fornecedores e demais entidades.</p>


            <p><strong>PARÁGRAFO PRIMEIRO.</strong> Responsabilizar-se-á o(a) contratado(a) por todos os documentos a ele(a) entregue pelo(a) contratante, enquanto permanecerem sob sua guarda para a consecução dos serviços pactuados, salvo comprovados casos fortuitos e motivos de força maior.</p>
            

            <p><strong>PARÁGRAFO SEGUNDO.</strong> O(A) Contratante tem ciência da Lei 9.613/98, alterada pela Lei 12.683/2012, especificamente no que trata da lavagem de dinheiro, regulamentada pela Resolução CFC n.º 1.445/13 do Conselho Federal de Contabilidade.</p>


            <p><strong>CLÁUSULA QUARTA.</strong> O(A) contratante(a) se obriga, antes do encerramento do exercício social, a fornecer ao contratado(a) a Carta de Responsabilidade da Administração.</p>


            <p><strong>CLÁUSULA QUINTA.</strong> As orientações dadas pelo(a) contratado(a) deverão ser seguidas pela contratante, eximindo-se o(a) primeiro(a) das consequências da não observância do seu cumprimento.</p>


            <p><strong>CLÁUSULA SEXTA.</strong> O (A) contratado (a) se obriga a entregar ao contratante, mediante protocolo, com tempo hábil, os balancetes, o Balanço Patrimonial e as demais demonstrações contábeis, documentos necessários para que este efetue os devidos pagamentos e recolhimentos obrigatórios, bem como comprovante de entrega das obrigações acessórias.</p>


            <p><strong>PARÁGRAFO ÚNICO.</strong> As multas decorrentes da entrega fora do prazo contratado das obrigações previstas no caput deste artigo, ou que forem decorrentes da imperfeição ou inexecução dos serviços por parte do(a) contratado(a), serão de sua responsabilidade, exceto, se causados pelo contratante por omissão de entrega ao contratado de documentos fiscais e contábeis, bem como, documentos faltantes e solicitações com antecedência de 5 (cinco) dias úteis relacionados ao departamento pessoal.</p>


            


            <p><strong>CLÁUSULA SÉTIMA.</strong> O (A) contratante pagará ao contratado (a) pelos serviços prestados mensalmente os honorários mensais como pacote o valor de R$ 4.200,00 (Quatro mil e duzentos reais), para até 20 (vinte) funcionários em folha, sendo acrescido do valor de R$ 88,00 (Oitenta e oito reais) por funcionário excedente aos 20 já inclusos nos honorários mensais, conforme apontado pelo Depto. Pessoal, para cobrança no mês subsequente ao fechamento.
            Os honorários mensais terão seu vencimento todo dia 05 (cinco) de cada mês. 
            </p>




            
            <p><strong>PARÁGRAFO PRIMEIRO.</strong> Fica acordado que as despesas acessórias supracitadas na Cláusula Sétima serão integradas ao valor dos honorários contábeis, não sendo cobradas à parte, conforme tabela vigente. 
            Em caso de novas obrigações acessórias por parte do erário público, como também, alteração contratual e encerramento de atividade, as mesmas serão cobradas à parte ou serão acrescidas nos honorários, de comum acordo entre as partes.
            </p>


            <p><strong>PARÁGRAFO SEGUNDO:</strong> Os honorários mensais e demais honorários cobrados à parte, serão reajustados anualmente, utilizando-se com base a correção do Salário Mínimo, conforme determinações do Governo Federal.</p>


            <p><strong>CLÁUSULA OITAVA.</strong> Todos os serviços extraordinários não contratados que forem necessários ou solicitados pelo contratante serão cobrados à parte, com preços previamente convencionados.</p>


            <p><strong>CLÁUSULA NONA.</strong> No caso de atraso no pagamento dos honorários, incidirá multa de 10% e Juros de 1% ao mês em atraso. Persistindo o atraso, por período de 3 (três) meses, o contratado (a) poderá rescindir o contrato sem prévio aviso, por motivo justificado, eximindo-se de qualquer responsabilidade técnica mensal ou anual a partir da data da rescisão.</p>


            


            <p><strong>CLÁUSULA DÉCIMA.</strong> Este instrumento é feito por tempo indeterminado, iniciando-se em 04/05/2023, podendo ser rescindido em qualquer época, por qualquer uma das partes, mediante Aviso Prévio de 60 (sessenta) dias, por escrito.</p>





            <p><strong>PARÁGRAFO PRIMEIRO.</strongA parte que não comunicar por escrito a intenção de rescindir o contrato ou efetuá-la de forma sumária fica obrigada ao pagamento de multa compensatória no valor de uma parcela mensal dos honorários, inclusive sobre valor dos honorários do departamento pessoal quando cobrados à parte, vigentes à época, por cada mês pela falta do cumprimento do aviso prévio. Considera-se início da contagem do prazo de avio prévio, sempre primeiro dia do mês seguinte do comunicado.</p>


            <p><strong>PARÁGRAFO SEGUNDO.</strong> O rompimento do vínculo contratual obriga as partes à celebração de distrato com a especificação da cessação das responsabilidades dos contratantes.</p>


            <p><strong>PARÁGRAFO TERCEIRO.</strong> O(A) contratado(a) obriga-se a entregar os documentos, Livros Contábeis e Fiscais e/ou arquivos eletrônicos ao contratante ou a outro profissional da Contabilidade por ele(a) indicado(a), após a assinatura do distrato entre as partes, ficando sobre a responsabilidade do contratante o registro dos livros contábeis e fiscais nos órgãos competentes, tais como: JUCESP, etc....</p>


            <p><strong>CLÁUSULA DÉCIMA PRIMEIRA.</strong> Os casos omissos serão resolvidos de comum acordo, ou, não sendo possível, na forma da legislação vigente.</p>


            <p><strong>CLÁUSULA DÉCIMA SEGUNDA – DA LEI GERAL DE PROTEÇÃO DE DADOS (LGPD)</strong> </p>
            <p>O CONTRATANTE declara, por meio da assinatura do respectivo CONTRATO DE PRESTAÇÃO DE SERVIÇOS PROFISSIONAIS, que foi informado quanto ao tratamento de dados que será realizado pela  CONTRATADA, nos termos da Lei Geral de Proteção de Dados Pessoais (LGPD) nº 13.709/2018. Declara também ser manifestação livre, informada e inequívoca a autorização do tratamento de seus dados pessoais.
            A CONTRATADA observará o dever de zelar estritamente pelo sigilo inerente ao Contrato de Prestação de Serviços Profissionais e pela confidencialidade quanto aos dados e informações do CONTRATANTE, empregando todos os meios e tecnologias necessárias para assegurar este direito dos usuários.
            </p>


            <p><strong>PARÁGRAFO PRIMEIRO:</strong> O CONTRATANTE autoriza a coleta de dados pessoais imprescindíveis a execução deste Contrato de Prestação de Serviços Profissionais, tendo sido informado quanto ao tratamento de dados que será realizado pela CONTRATADA, nos termos da Lei Geral de Proteção de Dados Pessoais (LGPD)  nº 13. 709/2018, especificamente quanto a coleta dos seguintes dados: Dados relacionados à sua identificação pessoal, a fim de que se garanta a fiel contratação pelo respectivo titular do contrato; Dados relacionados ao endereço do CONTRATANTE tendo em vista a necessidade da CONTRATADA identificar o local de cobrança dos serviços, envio de documentos/notificações e outras garantias necessárias ao fiel cumprimento do contrato ora assinado; Os dados coletados poderão ser utilizados para identificação de terrorismo, compartilhamento para órgãos de segurança, conforme solicitação legal pertinente, compartilhamento com autoridade administrativa e judicial no âmbito de suas competências com base no extrito cumprimento do dever legal, bem como com os órgãos de proteção ao crédito a fim de garantir a adimplência do CONTRATANTE perante esta CONTRATADA.</p>


            <p><strong>PARÁGRAFO SEGUNDO:</strong> Os dados coletados com base no legítimo interesse do CONTRATANTE, bem como para garantir a fiel execução do contrato por parte da CONTRATADA, fundamentam-se no artigo 7º da LGPD, razão pela qual as finalidades descritas no Paragráfo Primeiro  não são exaustivas. A CONTRATADA informa que todos os dados pessoais solicitados e coletados são os estritamente necessários para os fins almejados neste contrato; O CONTRATANTE autoriza o compartilhamento de seus dados, para os fins descritos nesta cláusula, com terceiros legalmente legítimos para defender os interesses da CONTRATADA bem como do CONTRATANTE</p>


            <p><strong>PARÁGRAFO TERCEIRO:</strong> O CONTRATANTE possui tempo determinado de 05 (cinco) anos conforme o Art.º 206 da Lei nº 10.406/2002 para acesso aos próprios dados armazenados, podendo também solicitar a exclusão de dados que foram previamente coletados com seu consentimento; A exclusão de dados será efetuada sem que haja prejuízo por parte da CONTRATADA, tendo em vista a necessidade de guarda de documentos por prazo determinado de 05 (cinco) anos, conforme lei civil nº 10.406/2002. 
            Para tanto, caso o CONTRATANTE deseje efetuar a revogação de algum dado, deverá preencher uma declaração neste sentido, ciente que a revogação de determinados dados poderá importar em eventuais prejuízos na prestação de serviços.
            </p>


            <p><strong>PARÁGRAFO QUARTO:</strong> O CONTRATANTE autoriza, neste mesmo ato, a guarda dos documentos (contratos/documentos fiscais/notificações/protocolos/ordens de serviços) - em que neles possuam dados pessoais - por parte da CONTRATADA a fim de que ela cumpra com o determinado nas demais normas que regulam o presente contrato, bem como para o cumprimento da obrigação legal nos termos do artigo 16 da LGPD.</p>


            <p><strong>PARÁGRAFO QUINTO:</strong> Em eventual vazamento indevido de dados a CONTRATADA se compromete a comunicar seus CONTRATANTE sobre o ocorrido, bem como sobre qual o dado vertido;</p>


            <p><strong>PARÁGRAFO SEXTO:</strong> A CONTRATADA informa que a gerência de dados ocorrerá através de uma pasta exclusiva do CONTRANTE que colherá e tratará os dados na forma da lei; A CONTRATADA informa que efetuará a manutenção do registro das operações de tratamento de dados pessoais da forma mencionada na cláusula anterior.</p>


            <p><strong>PARÁGRAFO SÉTIMO:</strong> Rescindido o contrato os dados pessoais coletados serão armazenados pelo tempo determinado no Paragráfo Terceiro Passado o termo de guarda pertinente a CONTRATADA se compromete a efetuar o descarte dos dados adequadamente.</p>


            <p><strong>CLÁUSULA DÉCIMA TERCEIRA</strong> Fica eleito o foro de <strong>Santos/SP</strong>  para o exercício e o cumprimento dos direitos e obrigações resultantes deste contrato.</p>

 </div>
</body>
</html>
';

// Conteúdo da nova página com CSS para quebra de página
$lastPageHtml = '
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
        .linha-assinatura { border-bottom: 1px solid black; width: 300px; margin: auto; display: block; }
        .testemunhas { margin-top: 50px; }
        .assinatura-container { display: flex; justify-content: space-around; }
        .assinatura-box { text-align: center; width: 45%; }
    </style>
</head>
<body>
    <p>E, para firmeza e como prova de assim haverem contratado, firmam este instrumento particular, assinado digitalmente pelas partes contratantes e pelas testemunhas abaixo.</p>
    <p>Santos/SP, 09 de Maio de 2023.</p>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    <div class="testemunhas">
        <table>
            <tr>
                <td>
                    <div class="linha-assinatura"></div>
                       SPOLAOR CONTABILIDADE LTDA - EPP
                </td> 
                <td>
                    <div class="linha-assinatura"></div>
                       PRO ATIVA ARQUITETURA LTDA.
                </td>
            </tr>
        </table>
    </div>
        <br/>
        <br/>
    <div class="testemunhas">
        <h3>TESTEMUNHAS</h3>
        <br/>
        <br/>
        <br/>
        <table>
            <tr>
                <td>
                    <div class="linha-assinatura"></div>
                    Amanda Cristina Machado <br/>
                    CPF: 386.895.648-45
                </td>
                <td>
                    <div class="linha-assinatura"></div>
                    Hugo Rangel Filho<br/>
                    CPF: 026.057.688-30
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
';



// Concatenar o conteúdo da última página ao conteúdo principal
$htmlContent .= $lastPageHtml;

// Carregar o conteúdo HTML completo no Dompdf
        $dompdf->loadHtml($htmlContent);

        // Definir o tipo de papel e orientação
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar o PDF
        $dompdf->render();

        // Gerar o caminho do arquivo temporário
        $tempDir = sys_get_temp_dir(); 
        $tempFile = tempnam($tempDir, 'contrato_');

        // Salvar o PDF em um arquivo temporário
        file_put_contents($tempFile, $dompdf->output());

        // Configuração para envio do documento para assinatura
        $createDoc = new createDoc();
        $createDoc->name = 'Contrato de Serviços Profissionais';
        $createDoc->file = $tempFile;
        $createDoc->setDevMode(false); // False para produção
        $createDoc->addSigners('jean@sccontab.com.br');

        $autentique = new autentique($createDoc);
        $autentique->token = '7d16f1a04fc31826ded1ed631bbc31678a79bbe92b7d5133a376bc397d8de817';
        $response = $autentique->transmit();

        if ($response) {
            echo "Documento enviado para assinatura com sucesso!";
        } else {
            echo "Erro ao enviar documento: " . $autentique->curlError;
        }

        // Apagar o arquivo temporário
        unlink($tempFile);
    }
}