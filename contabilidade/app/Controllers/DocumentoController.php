<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Socio_ass;
use App\Models\Empresa;
use App\Models\Contabilidade;
use App\Models\Cliente_lead;
use Dompdf\Dompdf;

class DocumentoController extends BaseController
{
    public function gerarDoc($insertedId, $empresaId, $clienteLeadId)
    {   
        $socioModel = new Socio_ass();
        $socio= $socioModel->find($insertedId);

        $empresaModel = new Empresa(); 
        $empresa = $empresaModel->find($empresaId);

        $contabilidadeModel = new Contabilidade(); 
        $contabilidade = $contabilidadeModel->where('empresa_id', $empresaId)->first();

        if (!$socio) {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        // Criar uma instância do Dompdf
        $dompdf = new Dompdf();

        var_dump($empresa);

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
    <p>Pelo presente instrumento particular de Contrato de Prestação de Serviços Contábeis, de acordo com a Resolução CFC n.º 1.457/13 publicada no DOU 13/12/2013, de um lado ' . $empresa['nome'] . ', CNPJ nº ' . $empresa['cnpj'] .', estabelecida à ' . $empresa['endereco_rua']  .', ' . $empresa['endereco_numero'] .', ' . $empresa['endereco_bairro'] .', ' . $empresa['endereco_cidade']  .' - ' . $empresa['endereco_estado']  .' – CEP: ' . $empresa['endereco_cep'] .', doravante denominada CONTRATANTE, neste ato representada pelo titular ' . $socio['nome'] . ', ' . $socio['nacionalidade'] .', maior, portados do R.G. nº ' . $socio['rg'] . ' e do CPF/MF nº ' . $socio['cpf']  . ', residente e domiciliado à ' . $socio['endereco_rua'] . ', ' . $socio['endereco_numero'] . ', ' . $socio['endereco_bairro'] . ', ' . $socio['endereco_cidade'] . ' - ' . $socio['endereco_estado'] . ' – CEP: ' . $socio['endereco_cep'] . '; e do outro lado, a empresa contábil SPOLAOR CONTABILIDADE LTDA - EPP, inscrita no CNPJ n.º 39.897.569/0001-37 e no CRC/SP 2SP042992/O-6, representada neste ato pelo Único Sócio e Responsável Técnico Sr. Marcos Roberto Spolaor Antunes, brasileiro, maior, casado, CONTADOR, estabelecido à Rua Guaió n.º 66 Sala 915/916 – Aparecida – 11.035-260 – Santos/SP, inscrito no CRC/SP sob n°1SP191034/O-2, portador da C.I.R.G. n.º 23.834.604-3 SSP/SP e do CPF n.º 159.081.408-80, doravante CONTRATADO(A), mediante as cláusulas e condições seguintes, tem justo e contratado que se segue:</p>
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


            


            <p><strong>CLÁUSULA SÉTIMA.</strong> O (A) contratante pagará ao contratado (a) pelos serviços prestados mensalmente os honorários mensais ' . $contabilidade['honorario_texto']  . '
            </p>




            
            <p><strong>PARÁGRAFO PRIMEIRO.</strong> Fica acordado que as despesas acessórias supracitadas na Cláusula Sétima serão integradas ao valor dos honorários contábeis, não sendo cobradas à parte, conforme tabela vigente. 
            Em caso de novas obrigações acessórias por parte do erário público, como também, alteração contratual e encerramento de atividade, as mesmas serão cobradas à parte ou serão acrescidas nos honorários, de comum acordo entre as partes.
            </p>


            <p><strong>PARÁGRAFO SEGUNDO:</strong> Os honorários mensais e demais honorários cobrados à parte, serão reajustados anualmente, utilizando-se com base a correção do Salário Mínimo, conforme determinações do Governo Federal.</p>


            <p><strong>CLÁUSULA OITAVA.</strong> Todos os serviços extraordinários não contratados que forem necessários ou solicitados pelo contratante serão cobrados à parte, com preços previamente convencionados.</p>


            <p><strong>CLÁUSULA NONA.</strong> No caso de atraso no pagamento dos honorários, incidirá multa de 10% e Juros de 1% ao mês em atraso. Persistindo o atraso, por período de 3 (três) meses, o contratado (a) poderá rescindir o contrato sem prévio aviso, por motivo justificado, eximindo-se de qualquer responsabilidade técnica mensal ou anual a partir da data da rescisão.</p>


            


            <p><strong>CLÁUSULA DÉCIMA.</strong> Este instrumento é feito por tempo indeterminado, iniciando-se em ' . $contabilidade['inicio_contabilidade'] . ', podendo ser rescindido em qualquer época, por qualquer uma das partes, mediante Aviso Prévio de 60 (sessenta) dias, por escrito.</p>





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

// Carregar o conteúdo HTML completo no Dompdf
$dompdf->loadHtml($htmlContent);

// Definir o tipo de papel e orientação
$dompdf->setPaper('A4', 'portrait');

// Renderizar o PDF
$dompdf->render();

$pdfName = uniqid() . '.pdf';
        $pdfPath = WRITEPATH . 'contratos/' . $pdfName;

        file_put_contents($pdfPath, $dompdf->output());

        $socioEmail = $socio['email'];
        $socioNome = $socio['nome'];

        // Call createDocument directly after saving the file
        return $this->createDocument($pdfPath, $socioEmail, $socioNome, $clienteLeadId);
    }

    
    public function createDocument($filePath, $socioEmail, $socioNome, $clienteLeadId)
    {
        $token = getenv('GRAPHQL_BEARER_TOKEN');
        $url = 'https://api.autentique.com.br/v2/graphql';

        $mutation = 'mutation CreateDocumentMutation($document: DocumentInput!, $signers: [SignerInput!]!, $file: Upload!) {' .
  ' createDocument(sandbox: true, document: $document, signers: $signers, file: $file) {' .
    ' id name refusable sortable created_at ' .
    ' signatures {' .
      ' public_id name email created_at action { name } link { short_link } user { id name email }' .
    ' }' .
  ' }' .
'}';

$variables = [
    'document' => [
        'name' => 'Contrato de Prestação de Serviços'
    ],
    'signers' => [
        [
            'email' => $socioEmail,
            'action' => 'SIGN'
        ]
    ]
];

        $operations = json_encode([
            'query' => $mutation,
            'variables' => $variables,
        ]);

        $map = json_encode(['0' => ['variables.file']]);

        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;

        $postdata = "--$delimiter\r\n"
                    . "Content-Disposition: form-data; name=\"operations\"\r\n\r\n"
                    . $operations . "\r\n"
                    . "--$delimiter\r\n"
                    . "Content-Disposition: form-data; name=\"map\"\r\n\r\n"
                    . $map . "\r\n"
                    . "--$delimiter\r\n"
                    . "Content-Disposition: form-data; name=\"0\"; filename=\"" . basename($filePath) . "\"\r\n"
                    . "Content-Type: application/octet-stream\r\n\r\n"
                    . file_get_contents($filePath) . "\r\n"
                    . "--$delimiter--";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: multipart/form-data; boundary=' . $delimiter,
            'Authorization: Bearer ' . $token
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

         return $this->gerarPaginaParabens($socioNome, $socioEmail, $clienteLeadId);
    }

    public function gerarPaginaParabens($socioNome, $socioEmail, $clienteLeadId) {

        $fileName = preg_replace('/[^A-Za-z0-9]/', '', $socioNome) . 'Congratulations.php';
        $filePath = './parabens/' . $fileName;

        if (!is_dir('parabens')) {
            mkdir('parabens', 0755, true);
        }

        $htmlContent = '
        <!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.9.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/design-sem-nome-10.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-sFCw1qGFAI" once="menu" id="menu2-23">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="">
                        <img src="assets/images/design-sem-nome-10.png" style="height: 3rem;">
                    </a>
                </span>
                
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="https://sccontab.com.br/cliente">Baixe nosso App</a>
                    </li></ul>
                
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-warning-outline display-4" href="https://api.whatsapp.com/send?phone=551333614324&text=Ol%C3%A1,%20vim%20do%20site%20sccontab.com.br%20e%20tenho%20d%C3%BAvidas%20sobre%20algum%20assunto!" target="_blank">Dúvidas</a></div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="header14 cid-sFzxmVl7J6" id="header14-1f">

    

    

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 image-wrapper">
                <img src="assets/images/contabilidade.png" alt="">
            </div>
            <div class="col-12 col-md">
                <div class="text-wrapper">
                    <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>Prezado(a) ' . $socioNome . '</strong></h1>
                    <p class="mbr-text mbr-fonts-style display-7">Nós, da<strong style="color: #FF931E "> Spolaor Company</strong>, não podemos deixar de agradecer por essa nova parceria de <strong style="color: #FF931E ">sucesso </strong> que estamos firmando! Com certeza, trata-se de uma nova oportunidade de sucesso para ambas as partes e que colheremos muitos frutos dela.
Esperamos que seja somente o início de uma longa jornada juntos e saibam que podem contar conosco <strong style="color: #FF931E "> sempre!</strong>
<br>
Você irá receber um e-mail em <strong style="color: #FF931E "> ' . $socioEmail . '</strong> com seu contrato!
<br>Grande abraço,</p>    
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="info3 cid-tT8UmQ9Xzs" id="info3-2">

    

    
    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-12 col-lg-10">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <h4 class="card-title mbr-fonts-style align-center mb-4 display-1"><strong>A Contabilidade pode ajudar</strong></h4>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            Entender a necessidade da sua empresa, encontrar soluções inovadoras e compatíveis com o mercado, associados à melhor solução técnica, faz parte da essência da Spolaor Contabilidade, uma empresa diferenciada e moderna, pois sempre busca a satisfação do cliente na sua expectativa máxima.</p>
                        <div class="mbr-section-btn mt-3"><a class="btn btn-warning-outline display-4" href="">Entrar em contato</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="map2 cid-sFAxp7Y5iM" id="map2-1y">
    
    
    <div>
        
        <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.4965324667614!2d-46.31189452582563!3d-23.97823727703765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce11ab76a86761%3A0x3d8b4329ea300dc3!2sSpolaor%20Contabilidade!5e0!3m2!1spt-BR!2sbr!4v1697727091039!5m2!1spt-BR!2sbr" allowfullscreen=""></iframe></div>
    </div>
</section>

<section data-bs-version="5.1" class="footer3 cid-sFCygHrmNf" once="footers" id="footer3-24">

    

    

    <div class="container">
        <div class="row align-center mbr-white">
            
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    
                    
                    
                    
                    
                    
                <div class="soc-item">
                        <a href="https://www.facebook.com/spolaorcontabilidade/?paipv=0&eav=AfZgEast7gbz-AXXb65BoXmkE4Zm5qg-N_8k_BbPJ_4-nM1TF-0gjeER-aScEh12YVE&_rdr" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.instagram.com/sccontab/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://api.whatsapp.com/send?phone=551333614324&text=Ol%C3%A1,%20vim%20do%20site%20sccontab.com.br%20e%20tenho%20d%C3%BAvidas%20sobre%20algum%20assunto!" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-whatsapp socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.linkedin.com/company/spolaor-contabilidade/mycompany/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-linkedin socicon"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2025 SpolaorCompany. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>
    ';

        $this->emailDocumentosCliente($socioEmail, $clienteLeadId);

        file_put_contents($filePath, $htmlContent);

        // Redirecionar para a página de parabéns
        return redirect()->to(base_url("parabens/$fileName"));
    }


    public function emailDocumentosCliente($socioEmail, $clienteLeadId)
{
    $clienteLeadModel = new Cliente_lead();
    // Busca o registro do cliente pelo ID e recupera o token
    $clienteLead = $clienteLeadModel->find($clienteLeadId);
    if (!$clienteLead) {
        return redirect()->back()->with('error', 'Cliente não encontrado.');
    }
    $token = $clienteLead['token'];

    // Gera o link com o token do cliente
    $link = base_url('DocumentsController/formView/' . $token);


    $emailService = \Config\Services::email();

    $emailService->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
    $emailService->setTo($socioEmail);
    $emailService->setCC('ti@sccontab.com.br');
    $emailService->setSubject('Envie seus documentos');

        // Corpo do e-mail em HTML
        $htmlContent = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="pt">
        <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="x-apple-disable-message-reformatting">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="telephone=no" name="format-detection">
        <title>Nova mensagem</title>
        <!--[if (mso 16)]>
        <style type="text/css">
        a {text-decoration: none;}
        </style>
        <![endif]-->
        <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
        <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <style type="text/css">
        #outlook a { padding:0; }
        .es-button { mso-style-priority:100!important; text-decoration:none!important; }
        a[x-apple-data-detectors] { color:inherit!important; text-decoration:none!important; font-size:inherit!important; font-family:inherit!important; font-weight:inherit!important; line-height:inherit!important; }
        .es-desk-hidden { display:none; float:left; overflow:hidden; width:0; max-height:0; line-height:0; mso-hide:all; }
        @media only screen and (max-width:600px) {
            p, ul li, ol li, a { line-height:150%!important }
            h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% }
            h1 { font-size:36px!important; text-align:left }
            h2 { font-size:26px!important; text-align:left }
            h3 { font-size:20px!important; text-align:left }
            .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px!important; text-align:left }
            .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important; text-align:left }
            .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:left }
            .es-menu td a { font-size:12px!important }
            .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important }
            .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important }
            .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important }
            .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important }
            *[class="gmail-fix"] { display:none!important }
            .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important }
            .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important }
            .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important }
            .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important }
            .es-button-border { display:inline-block!important }
            a.es-button, button.es-button { font-size:20px!important; display:inline-block!important }
            .es-adaptive table, .es-left, .es-right { width:100%!important }
            .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important }
            .es-adapt-td { display:block!important; width:100%!important }
            .adapt-img { width:100%!important; height:auto!important }
            .es-m-p0 { padding:0!important }
            .es-m-p0r { padding-right:0!important }
            .es-m-p0l { padding-left:0!important }
            .es-m-p0t { padding-top:0!important }
            .es-m-p0b { padding-bottom:0!important }
            .es-m-p20b { padding-bottom:20px!important }
            .es-mobile-hidden, .es-hidden { display:none!important }
            tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important }
            tr.es-desk-hidden { display:table-row!important }
            table.es-desk-hidden { display:table!important }
            td.es-desk-menu-hidden { display:table-cell!important }
            .es-menu td { width:1%!important }
            table.es-table-not-adapt, .esd-block-html table { width:auto!important }
            table.es-social { display:inline-block!important }
            table.es-social td { display:inline-block!important }
            .es-m-p5 { padding:5px!important }
            .es-m-p5t { padding-top:5px!important }
            .es-m-p5b { padding-bottom:5px!important }
            .es-m-p5r { padding-right:5px!important }
            .es-m-p5l { padding-left:5px!important }
            .es-m-p10 { padding:10px!important }
            .es-m-p10t { padding-top:10px!important }
            .es-m-p10b { padding-bottom:10px!important }
            .es-m-p10r { padding-right:10px!important }
            .es-m-p10l { padding-left:10px!important }
            .es-m-p15 { padding:15px!important }
            .es-m-p15t { padding-top:15px!important }
            .es-m-p15b { padding-bottom:15px!important }
            .es-m-p15r { padding-right:15px!important }
            .es-m-p15l { padding-left:15px!important }
            .es-m-p20 { padding:20px!important }
            .es-m-p20t { padding-top:20px!important }
            .es-m-p20r { padding-right:20px!important }
            .es-m-p20l { padding-left:20px!important }
            .es-m-p25 { padding:25px!important }
            .es-m-p25t { padding-top:25px!important }
            .es-m-p25b { padding-bottom:25px!important }
            .es-m-p25r { padding-right:25px!important }
            .es-m-p25l { padding-left:25px!important }
            .es-m-p30 { padding:30px!important }
            .es-m-p30t { padding-top:30px!important }
            .es-m-p30b { padding-bottom:30px!important }
            .es-m-p30r { padding-right:30px!important }
            .es-m-p30l { padding-left:30px!important }
            .es-m-p35 { padding:35px!important }
            .es-m-p35t { padding-top:35px!important }
            .es-m-p35b { padding-bottom:35px!important }
            .es-m-p35r { padding-right:35px!important }
            .es-m-p35l { padding-left:35px!important }
            .es-m-p40 { padding:40px!important }
            .es-m-p40t { padding-top:40px!important }
            .es-m-p40b { padding-bottom:40px!important }
            .es-m-p40r { padding-right:40px!important }
            .es-m-p40l { padding-left:40px!important }
            .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important }
        }
        </style>
        </head>
        <body style="width:100%;font-family:arial, , helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
        <div dir="ltr" class="es-wrapper-color" lang="pt" style="background-color:#FAFAFA">
            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA">
            <tr>
                <td valign="top" style="padding:0;Margin:0">
                <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr>
                    <td align="center" style="padding:0;Margin:0">
                        <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                        <tr>
                            <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://sccontab.com.br/img/header_email.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="560" height="315"></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr>
                    <td align="center" style="padding:0;Margin:0">
                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                        <tr>
                            <td class="es-m-p20t" align="left" style="Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:30px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="left" class="es-m-p0r es-m-p0l" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px"><span style="font-size:15px">Prezado(a) cliente,<br><br>
    Temos o prazer de informar que seu contrato foi elaborado com sucesso! Estamos ansiosos para iniciar nossa parceria e contribuir para o sucesso de seus negócios. <br><br>
    Por favor, acesse o link abaixo para enviar os documentos necessários para darmos continuidade ao seu atendimento:<br>
    <a href="' . $link . '">Enviar Documentos</a><br><br></span></p>
                                       <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:23px;color:#333333;font-size:15px"><br>Agradecemos pela atenção!<br>Equipe gestora</p></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://sccontab.com.br/img/logo_email.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="200" height="200"></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-footer" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr>
                    <td align="center" style="padding:0;Margin:0">
                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:640px" role="none">
                        <tr>
                            <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td align="left" style="padding:0;Margin:0;width:600px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0">
                                        <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr>
                                            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.facebook.com/SCspolaorCompany/?paipv=0&eav=AfaHiF84IwzZKZd44XmR5BnzCHYhkdVU6NeSOLKLY7HUNr-JIzpwBq7dd9yq2ag7q10&_rdr" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Facebook" src="https://eihdwwg.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.instagram.com/spolaorcompany/?igshid=NzZhOTFlYzFmZQ%3D%3D" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Instagram" src="https://eihdwwg.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.linkedin.com/company/spolaor-contabilidade/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="LinkedIn" src="https://eihdwwg.stripocdn.email/content/assets/img/social-icons/logo-black/linkedin-logo-black.png" alt="In" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            <td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://spolaorcompany.com.br/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Website" src="https://eihdwwg.stripocdn.email/content/assets/img/other-icons/logo-black/link-logo-black.png" alt="Website" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;padding-bottom:35px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px">Copyright © 2024 Spolaor Company - All Rights Reserved.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px"><a href="https://www.google.com/search?sca_esv=619c697d276fe56b&sca_upv=1&sxsrf=ACQVn0_VqNObkvh2TaY7pO3fnHoDQRzc_w:1713983736549&q=spolaor+contabilidade+endere%C3%A7o&ludocid=4434712105378123203&sa=X&ved=2ahUKEwjz3ZH-vtuFAxVupJUCHS6nC4gQ6BN6BAhZEAI" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px">Endereço</a>: Alameda Armênio Mendes, 66 - sala 915 e 916 - Aparecida, Santos - SP, 11035-260</p></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </div>
        </body>
        </html>
        ';

    $emailService->setMessage($htmlContent);
    $emailService->send();
}

}
