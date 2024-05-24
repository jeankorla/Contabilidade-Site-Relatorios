<?php

namespace App\Controllers;

use App\Models\Cliente_lead;
use App\Models\Empresa;
use App\Models\Contabilidade;
use App\Models\Socio_ass;
use CodeIgniter\Controller;


date_default_timezone_set('America/Sao_Paulo');

class PropostaController extends Controller
{
   public function store()
    {
        // Obtém o valor de `empresa_id` do formulário
        $empresaId = $this->request->getPost('empresa_id');

        // Dados do novo sócio ou atualização do existente
        $socioData = [
            'nome' => $this->request->getPost('socio_asses_nome'),
            'email' => $this->request->getPost('socio_asses_email'),
            'nacionalidade' => $this->request->getPost('socio_asses_nacional'),
            'idade' => $this->request->getPost('socio_asses_idade'),
            'rg' => $this->request->getPost('socio_asses_rg'),
            'cpf' => $this->request->getPost('socio_asses_cpf'),
            'endereco_cep' => $this->request->getPost('socio_asses_endereco_cep'),
            'endereco_cidade' => $this->request->getPost('socio_asses_endereco_cidade'),
            'endereco_bairro' => $this->request->getPost('socio_asses_endereco_bairro'),
            'endereco_rua' => $this->request->getPost('socio_asses_endereco_rua'),
            'endereco_complemento' => $this->request->getPost('socio_asses_endereco_complemento'),
            'endereco_numero' => $this->request->getPost('socio_asses_endereco_numero'),
            'endereco_estado' => $this->request->getPost('socio_asses_endereco_estado'),
            'empresa_id' => $empresaId,
        ];

        // Instancia o modelo de sócios
        $socioModel = new Socio_ass();
        $existingSocio = $socioModel->where('empresa_id', $empresaId)->first();

        // Verifica se o sócio já existe ou se é um novo registro
        if ($existingSocio) {
            // Atualiza os dados do sócio existente
            $result = $socioModel->update($existingSocio['id'], $socioData);
            $updatedId = $existingSocio['id'];
        } else {
            // Insere um novo sócio
            $result = $socioModel->insert($socioData);
            $updatedId = $socioModel->getInsertID();
        }

        // Se a operação de inserção/atualização foi bem-sucedida
        if ($result) {
            // Atualiza a situação da empresa para "Contrato"
            $empresaModel = new Empresa();
            $empresaUpdateData = ['situacao' => 'Contrato'];
            $empresaUpdated = $empresaModel->update($empresaId, $empresaUpdateData);

            // Verifica se a atualização foi bem-sucedida antes de prosseguir
            if ($empresaUpdated) {
                $documentoController = new DocumentoController();
                // Gera o documento passando o ID do sócio e o ID da empresa
                return $documentoController->gerarDoc($updatedId, $empresaId);
            } else {
                return redirect()->back()->withInput()->with('errors', 'Falha ao atualizar situação da empresa para Contrato.');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $socioModel->errors());
        }
    }

    public function gerarProposta($clienteId)
{
    $clienteModel = new Cliente_lead();
    $cliente = $clienteModel->find($clienteId);

    $empresaModel = new Empresa();
    $empresa = $empresaModel->where('cliente_id', $clienteId)->first();

    $contabilidadeModel = new Contabilidade();
    $contabilidade = $contabilidadeModel->where('empresa_id', $empresa['id'])->first();

    $dataAtual = date('d/m/Y');

    if (!$cliente || !$empresa) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Cliente ou empresa não encontrados!'
        ]);
    }

    $cnpj = preg_replace('/[^0-9]/', '', $empresa['cnpj']);
    $fileName = $cnpj . '.php';

        // Conteúdo do arquivo
        $htmlContent = '
         <!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.9.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.9.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/design-sem-nome-10.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/parallax/jarallax.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  
  
    <style>
    .custom-btn-outline {
    border: 2px solid #FF931E; /* A cor primária do Bootstrap */
    color: #FF931E;
    background-color: transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: all .15s ease-in-out;
}

.custom-btn-outline:hover {
    color: #fff;
    background-color: #FF931E;
    border-color: #FF931E;
}

.custom-btn-outline:focus, .custom-btn-outline:active {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* O foco "glow" do Bootstrap */
}

 .custom-btn-outline2 {
    border: 2px solid #08B81A; /* A cor primária do Bootstrap */
    color: #08B81A;
    background-color: transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: all .15s ease-in-out;
}

.custom-btn-outline2:hover {
    color: #fff;
    background-color: #08B81A;
    border-color: #08B81A;
}

.custom-btn-outline2:focus, .custom-btn-outline:active {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* O foco "glow" do Bootstrap */
}
  </style>
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-sFCw1qGFAI" once="menu" id="menu2-23">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="https://mobiri.se">
                        <img src="assets/images/design-sem-nome-10.png" alt="Mobirise Website Builder" style="height: 3rem;">
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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="https://www.canva.com/design/DAF6047mnK4/bR11P-sWup_XI64qHHE6dw/view?utm_content=DAF6047mnK4&utm_campaign=designshare&utm_medium=link&utm_source=editor#2" target="_blank">QUEM SOMOS</a>
                    </li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://www.instagram.com/spolaorcompany" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://www.linkedin.com/company/spolaor-contabilidade/" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-linkedin socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://www.facebook.com/SCspolaorCompany/" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    
                </div>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-warning-outline display-4" href="https://api.whatsapp.com/send?phone=551333614324&text=Ol%C3%A1,%20vim%20do%20site%20sccontab.com.br%20e%20tenho%20d%C3%BAvidas%20sobre%20algum%20assunto!" target="_blank">Dúvidas</a></div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="header14 cid-sFzxmVl7J6" id="header14-1f">

    

    

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 image-wrapper">
                <img src="assets/images/contabilidade.png" alt="Mobirise Website Builder">
            </div>
            <div class="col-12 col-md">
                <div class="text-wrapper">
                    <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2" style="font-size: 4rem;"><strong><strong><span style="color: #FF931E;">Descomplique</span></strong> seu Negócio</strong></h1>
                    <div class="text-wrapper">
                    <p class="mbr-text mbr-fonts-style display-7" style="font-size: 2.5rem;">Tudo que você precisa <span style="color: #0097C4">num só lugar!</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features1 cid-udH04OHeuI" id="features1-z">
    

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-1"><strong>Nossos serviços</strong></h3>
                
            </div>
        </div>
        <div class="row">
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span style="color: #FF931E;" class="mbr-iconfont mobi-mbri-contact-form mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-5"><strong>Contábil</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Nosso departamento contábil está pronto a atender as necessidades legais da sua empresa.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span style="color: #FF931E;" class="mbr-iconfont mobi-mbri-growing-chart mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-5"><strong>Fiscal</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Sua empresa com uma assessoria completa para atender a todas as obrigações fiscais.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span style="color: #FF931E;" class="mbr-iconfont mobi-mbri-cash mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-5"><strong>Pessoal</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Imprescindível para qualquer empresa, sendo responsável pela execução de toda a rotina de departamento de pessoal.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features1 cid-udH0bViU0e" id="features1-10">
    

    
    <div class="container-fluid">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span style="color: #FF931E;" class="mbr-iconfont mbrib-briefcase"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-5"><strong>Abertura de Empresa</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Abra sua empresa com a estrutura societária mais adequada, sempre com foco na economia tributária.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span style="color: #FF931E;" class="mbr-iconfont mobi-mbri-growing-chart mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-5"><strong>Consultoria e Assessoria</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Está buscando soluções específicas para o seu negócio? Os melhores planos de trabalho para o seu ramo de atuação.</p>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="info1 cid-udH2HVPxWO mbr-parallax-background" id="info1-12">
    

    
    <div class="mbr-overlay" style="opacity: 0.6; background-color: #0097C4;"></div>
    <div class="align-center container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h3 class="mbr-section-title mb-4 mbr-fonts-style display-5">
                    <strong>TECNOLOGIA E INOVAÇÃO</strong></h3>
                
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features12 cid-udH2QFLQyR" id="features12-13">

    

    
    
    <div class="container">
        <div class="m-0 row align-items-center">
            <div class="col-12 col-lg">
                <div class="card-wrapper">
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mb-4 display-5">
                            <strong>AUTOMAÇÕES</strong></h4>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            Foco em desenvolver recursos "automatizados" e não "robotizados", trazendo agilidade e precisão com interação pessoal e não robótica, nossa equipe esta sempre preparada para melhor lhe atender. </p>
                        <div class="mbr-text mbr-fonts-style counter-container display-7">
                            <ul>
                                <li><span style="font-size: 1rem;">Busca de notas&nbsp;</span></li><li><span style="font-size: 1rem;">Importação da Movimentação Financeira com extratos bancários</span></li><li><span style="font-size: 1rem;">Verifica situação fiscal</span></li><li><span style="font-size: 1rem;">Baixas e envio de CND’s</span></li><li><span style="font-size: 1rem;">Aplicativo <em>Próprio </em>para comunicação e entrega de documentos</span><br></li><li>Parceiro oficial Omie</li><li><span style="font-size: 1rem;">Entrega de Holerites por e-mail ou APP&nbsp;</span></li><li><span style="font-size: 1rem;">RH Online</span><br></li><li>Documentos em Nuvem</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="p-0 col-12 col-lg-4 md-pb">
                <div class="image-wrapper">
                    <img src="assets/images/mbr-858x572.webp" alt="Automacoes">
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features12 cid-udH2S3hxRd" id="features12-14">

    

    
    
    <div class="container">
        <div class="m-0 row align-items-center">
            <div class="col-12 col-lg">
                <div class="card-wrapper">
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mb-4 display-5">
                            <strong>APLICATIVO PRÓPRIO</strong></h4>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            O App conta com às seguintes funcionalidades: </p>
                        <div class="mbr-text mbr-fonts-style counter-container display-7">
                            <ul>
                                <li><span style="font-size: 1rem;">Calendário contendo todas às obrigações da empresa perante a legislação;</span></li><li>Possibilidade de enviar solicitações para o Escritório Contábil e também responder as demandas enviadas;</li><li><span style="font-size: 1rem;">Gerenciamento Eletrônico de documentos onde todo documento enviado pelo app é armazenado em Cloud;</span></li><li><span style="font-size: 1rem;">Por Intermédio do app a Empresa receberá comunicados do escritório contábil em diversas orientações fiscais.</span></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="p-0 col-12 col-lg-6 md-pb">
                <div class="image-wrapper">
                    <img src="assets/images/sc-smarth-1073x604.webp" alt="app">
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features10 cid-tT91nc5Sk7" id="features010-9">
  

  
  
  <div class="container">
    <div class="row mb-5 mt-5">
      <div class="col-12 mb-0">
        <h3 class="mbr-section-title mbr-fonts-style align-center display-2"><strong>Área do cliente</strong></h3>
        <h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-4 display-2">Aplicativos para nossos clientes!</h5>
      </div>
    </div>
    <div class="row">
      <div class="item features-without-image col-12 col-md-6 col-lg-4 active">
        <div class="item-wrapper">
          <div class="card-box align-left">
            <div class="iconfont-wrapper mb-3" style="text-align: center;font-size: 48px; color: #FF931E;">
              <span class="mbr-iconfont socicon-apple socicon" ></span>
            </div>
            <h5 class="card-title mbr-fonts-style display-5" style="text-align: center;">
              <strong>iOS</strong>
            </h5>
            <p class="card-text mbr-fonts-style mb-3 display-7" style="text-align: center;" >
              <a class="btn custom-btn-outline display-4" href="https://apps.apple.com/br/app/spolaor-contabilidade/id1592899809?l=en" >Clique aqui</a>
            </p>
            
          </div>
        </div>
      </div>
      
      <div class="item features-without-image col-12 col-md-6 col-lg-4">
        <div class="item-wrapper">
          <div class="card-box align-left">
            <div class="iconfont-wrapper mb-3" style="text-align: center;font-size: 48px; color: #FF931E;">
              <span class="mbr-iconfont socicon-android socicon"></span>
            </div>
            <h5 class="card-title mbr-fonts-style display-5" style="text-align: center;">
              <strong>Android</strong>
            </h5>
            <p class="card-text mbr-fonts-style mb-3 display-7" style="text-align: center;">
              <a class="btn custom-btn-outline display-4" href="https://play.google.com/store/apps/details?id=com.spolaorcontabilidade">Clique aqui</a>
            </p>
            
          </div>
        </div>
      </div><div class="item features-without-image col-12 col-md-6 col-lg-4">
        <div class="item-wrapper">
          <div class="card-box align-left">
            <div class="iconfont-wrapper mb-3" style="text-align: center;font-size: 48px; color: #FF931E;">
              <span class="mbr-iconfont mobi-mbri-cursor-click mobi-mbri"></span>
            </div>
            <h5 class="card-title mbr-fonts-style display-5" style="text-align: center;">
              <strong>Web</strong></h5>
            <p class="card-text mbr-fonts-style mb-3 display-7" style="text-align: center;">
             <a class="btn custom-btn-outline display-4" href="https://vip.acessorias.com/spolaorcontabilidade" >Clique aqui</a>
            </p>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section data-bs-version="5.1" class="content16 cid-udH6gFl6uq" id="content16-19">

    

    
    
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="mbr-section-head align-center mb-4">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-5"><span style="font-size: 2rem;"><strong>À ' . $empresa['nome'] . '</strong></span><div><strong>A/C DIRETORES</strong></div></h3>
                    <h4 class="mbr-section-subtitle mb-0 mt-2 mbr-fonts-style display-7">Ref.: Proposta de Prestação de Serviços Contábeis para empresa Tributada pelo Regime Federal do ' . $empresa['tributacao'] . '.<br><br><strong>DO OBJETO<br></strong><br>
<div>O objeto da presente consiste em propor prestação de Serviços Contábeis pela <strong>SPOLAOR CONTABILIDADE LTDA, CNPJ nº 39.897.569/0001-37, CRC nº 2SP042992/O-6,</strong> à favor da <strong>' . $empresa['nome'] . ', CNPJ nº ' . $empresa['cnpj'] . ', </strong>dos seguintes serviços profissionais:</div></h4>
                </div>
                <div id="bootstrap-accordion_8" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_8" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>1 - 	ÁREA CONTÁBIL</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse1_8" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_8">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4"><strong>1.1.1</strong> - Classificação e escrituração da contabilidade de acordo com as normas e princípios contábeis vigentes;
<br><strong>	1.1.2</strong> - Apuração de balancetes;
<br><strong>	1.1.3 </strong>- Elaboração do Balanço Anual e Demonstrativo de Resultados.&nbsp;<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse2_8" aria-expanded="false" aria-controls="collapse2">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>2 - 	ÁREA FISCAL</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse2_8" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_8">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4"><strong>2.2.1</strong> - Orientação e controle da aplicação dos dispositivos legais vigentes, sejam federais, estaduais ou municipais;
<br><strong>	2.2.2</strong> - Escrituração dos registros fiscais quando devido, do IPI, ICMS, ISS e elaboração das guias de informação e de recolhimento dos tributos devidos;
<br><strong>	2.2.3</strong> - Atendimento das demais exigências previstas em atos normativos, bem como de eventuais procedimentos de fiscalização tributária.&nbsp;<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_8" aria-expanded="false" aria-controls="collapse3">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>3 - 	ÁREA DO IMPOSTO DE RENDA PESSOA JURÍDICA</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse3_8" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_8">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4"><strong>3.3.1 </strong>- Orientação e controle de aplicação dos dispositivos legais vigentes;
<br><strong>	3.3.2 </strong>- Elaboração da declaração anual de rendimentos e documentos correlatos;
<br><strong>	3.3.3 </strong>- Atendimento das demais exigências previstas em atos normativos, bem como de eventuais procedimentos de fiscalização.&nbsp;<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse4_8" aria-expanded="false" aria-controls="collapse4">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>4 - 	DO VALOR DOS SERVIÇOS</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse4_8" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_8">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4"><strong>4.1</strong> - Para a execução dos serviços constantes nos itens 1 à 3, relacionados acima, <strong>à partir da competência '. $contabilidade['competencia']  .' à Spolaor Contabilidade </strong>propõe os honorários profissionais mensais correspondentes à <strong>' . $contabilidade['honorario'] .' </strong>(Hum mil e oitocentos reais) até o dia 01 do mês subsequente ao vencido, podendo a cobrança ser veiculada através de cobrança bancária.<br>  
<br><strong>4.2</strong> - Para a execução dos serviços em cumprimento das obrigações acessórias mensais e anuais, os serviços não serão cobrados à parte, exceto, caso seja criado nova obrigação acessória pelo erário público e o imposto de renda da pessoa física, caso seja feito pela contabilidade.<br> 
<br><strong>4.3 </strong>– Os Honorários serão reajustados de acordo com o índice de reajuste do salário mínimo vigente, desta forma, sempre que atualizar o salário mínimo e independentemente do tempo de contrato com a contabilidade, será aplicado o reajuste nos honorários da época vigente.<br>
<br><strong>4.4 </strong>– Sem prejuízo do previsto no item 4.3, os honorários poderão ser aumentados de comum acordo entre as partes, conforme volume de aumento do trabalho executado pela contabilidade.&nbsp;<br></p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <p>Os parâmetros de fixação dos honorários tiveram como base o volume de papéis e informações fornecidas pela CONTRATANTE, como segue:</p>
                        </div>
                        <div class="table-wrapper mt-5"> 
                    <div class="table-wrapper"> 
                    <table class="table"> 
                        <tbody>
                            <tr>
                                <td>Quantidade de Funcionários:</td>
                                <td style="background-color: yellow;">' . $empresa['funcionarios'] . '</td> <!-- Quantidade de funcionários -->
                            </tr>
                            <tr>
                                <td>Quantidade de Notas-Fiscais - mês (Entrada/Saída/Serviços):</td>
                                <td style="background-color: yellow;">' . $empresa['nfe'] . '</td> <!-- Quantidade de notas-fiscais -->
                            </tr>
                            <tr>
                                <td>Quantidade de Lançamentos Contábeis:</td>
                                <td style="background-color: yellow;">' . $empresa['lancamento'] .'</td> <!-- Quantidade de lançamentos contábeis -->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-5">
                    <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7"><strong>' . $dataAtual . '</strong><br></h4>
                </div>

                <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="image-wrapper">
                    <img src="assetsClientes/images/captura-de-tela-2024-04-29-160727-407x307.webp" alt="Mobirise Website Builder">
                    
                </div>
            </div>
        </div>
    </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>


<section data-bs-version="5.1" class="content11 cid-ubmByrNyPh" id="content11-14">
    
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10"><div class="mbr-section-btn align-center"><button onclick="document.getElementById(\'formularioModal\').style.display=\'block\'" class="w3-button w3-large" style="font-family: \'Poppins\', sans-serif; background-color: #FF931E; color: white;">Aceitar Proposta</button>
</div>
               
            </div>
        </div>
    </div>
</section>

<!-- Modal Principal -->
<div id="formularioModal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:900px">
        <div class="w3-center"><br>
            <span onclick="document.getElementById(\'formularioModal\').style.display=\'none\'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <h5 class="w3-modal-title">Informações Necessárias</h5>
        </div>

        <form class="w3-container" id="propostaForm" action="' . base_url('PropostaController/store') . '" method="post">
            <input type="hidden" name="empresa_id" value="' . $empresa['id'] . '">
            <div class="w3-section">

          <div class="w3-row-padding">
            <div class="w3-col m7">
              <label for="socio_asses_nome" class="w3-label">Nome do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_nome" name="socio_asses_nome" required>
            </div>
            <div class="w3-col m3">
              <label for="socio_asses_nacional" class="w3-label">Nacionalidade do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_nacional" name="socio_asses_nacional" required>
            </div>
          </div>

          <div class="w3-row-padding">
            <div class="w3-col m6">
              <label for="socio_asses_rg" class="w3-label">RG do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_rg" name="socio_asses_rg" oninput="aplicarMascaraRG(this)" maxlength="12" required>
            </div>
            <div class="w3-col m6">
              <label for="socio_asses_cpf" class="w3-label">CPF do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_cpf" name="socio_asses_cpf" oninput="aplicarMascaraCPF(this)" maxlength="14" required>
            </div>
          </div>

          <div class="w3-row-padding">
            <div class="w3-col m3">
              <label for="socio_asses_endereco_cep" class="w3-label">CEP do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_cep" name="socio_asses_endereco_cep" oninput="aplicarMascaraCEP(this)" maxlength="9" required>
            </div>
            <div class="w3-col m6">
              <label for="socio_asses_endereco_cidade" class="w3-label">Cidade do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_cidade" name="socio_asses_endereco_cidade" required>
            </div>
            <div class="w3-col m3">
              <label for="socio_asses_endereco_estado" class="w3-label">Estado do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_estado" name="socio_asses_endereco_estado" required>
            </div>
          </div>

          <div class="w3-row-padding">
            <div class="w3-col m5">
              <label for="socio_asses_endereco_rua" class="w3-label">Rua do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_rua" name="socio_asses_endereco_rua" required>
            </div>
            <div class="w3-col m2">
              <label for="socio_asses_endereco_numero" class="w3-label">Número:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_numero" name="socio_asses_endereco_numero" required>
            </div>
            <div class="w3-col m5">
              <label for="socio_asses_endereco_bairro" class="w3-label">Bairro do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_bairro" name="socio_asses_endereco_bairro" required>
            </div>
          </div>

          <div class="w3-row-padding">
            <div class="w3-col m5">
              <label for="socio_asses_endereco_complemento" class="w3-label">Complemento do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_endereco_complemento" name="socio_asses_endereco_complemento" required>
            </div>
            <div class="w3-col m7">
              <label for="socio_asses_email" class="w3-label">E-mail do Sócio:</label>
              <input type="text" class="w3-input w3-border" id="socio_asses_email" name="socio_asses_email" required>
            </div>
          </div>

          <!-- Botão de submissão do formulário -->
          <div class="w3-container w3-padding-16" style="text-align: right;">
          <button type="submit" class="w3-button w3-green">Próximo Passo</button>
        </div>
        </div>
      </form>

    </div>
  </div>


<div id="confirmModal" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <div class="w3-container w3-teal">
      <span onclick="document.getElementById(\'confirmModal\').style.display=\'none\'"
      class="w3-button w3-display-topright">&times;</span>
      <h2>Confirmação de Dados</h2>
    </div>
    <div class="w3-container">
      <p>Por favor, confirme que todos os dados inseridos estão corretos e que você autoriza o uso desses dados de acordo com a nossa política de privacidade conforme a LGPD.</p>
      <div>
        <button onclick="document.getElementById(\'confirmModal\').style.display=\'none\'" class="w3-button w3-red">Cancelar</button>
        <button id="confirmarEnvio" class="w3-button w3-green">Confirmar</button>
      </div>
    </div>
  </div>
</div>




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
</section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/parallax/jarallax.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/theme/js/script.js"></script>  
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("propostaForm");

    // Intercepta o evento de submit do formulário
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Previne a submissão imediata do formulário
        document.getElementById("confirmModal").style.display = "block"; // Mostra o modal de confirmação
    });

    // Adiciona evento no botão de confirmação para submeter o formulário
    document.getElementById("confirmarEnvio").addEventListener("click", function() {
        form.submit(); // Submete o formulário após confirmação
    });

    // Evento para fechar o modal de confirmação e cancelar a operação
    document.getElementById("confirmModal").querySelector(".w3-display-topright").addEventListener("click", function() {
        document.getElementById("confirmModal").style.display = "none"; // Esconde o modal de confirmação
    });
});
</script>


<script>
function aplicarMascaraCPF(input) {
    var valor = input.value;
    
    valor = valor.replace(/\D/g, ""); // Remove tudo o que não é dígito
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após o terceiro dígito
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após os seis primeiros dígitos
    valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Coloca um hífen após os nove primeiros dígitos
    input.value = valor; // Atualiza o valor do input

    // Adiciona evento de perda de foco para verificar a validade do CPF
    input.onblur = function () {
        if (!validarCPF(valor)) {
            alert("CPF inválido. Por favor, verifique o número digitado.");
        }
    };
}

function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ""); // Remove caracteres não numéricos
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false; // Verifica tamanho e sequência

    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;

    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) return false;

    return true;
}
</script>
  <script>
function aplicarMascaraRG(input) {
    var valor = input.value;

    // Remove caracteres não numéricos e letras extras
    valor = valor.replace(/\D/g, "").replace(/([a-zA-Z])/g, "");

    // Coloca pontos e hífen no formato padrão
    valor = valor.replace(/(\d{2})(\d)/, "$1.$2");
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
    valor = valor.replace(/(\d{3})(\d)/, "$1-$2");

    // Atualiza o valor do input
    input.value = valor;
}

function aplicarMascaraCEP(input) {
    var valor = input.value;

    // Remove caracteres não numéricos
    valor = valor.replace(/\D/g, "");

    // Coloca o hífen no formato do CEP
    valor = valor.replace(/(\d{5})(\d)/, "$1-$2");

    // Atualiza o valor do input
    input.value = valor;
}
</script>
  
</body>
</html>
        ';

        

    $filePath = './propostas/' . $fileName;

    if (!is_dir('propostas')) {
        mkdir('propostas', 0755, true);
    }

    file_put_contents($filePath, $htmlContent);

    // Atualizar situação para 'Proposta'
    $dataEmpresa = ['situacao' => 'Proposta'];
    $updated = $empresaModel->update($empresa['id'], $dataEmpresa);

    if (!$updated) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Falha ao atualizar a situação da empresa.'
        ]);
    }

    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Proposta gerada com sucesso!',
        'link' => base_url("propostas/$fileName")
    ]);
}

    public function contratoSemProposta($empresaId)
    {
        // Instancia o modelo de Empresa e busca a empresa pelo ID fornecido
        $empresaModel = new Empresa();
        $empresa = $empresaModel->find($empresaId);

        if (!$empresa) {
            return redirect()->back()->with('error', 'Empresa não encontrada.');
        }

        // Instancia o modelo de Socio_ass e verifica se existe um sócio associado a essa empresa
        $socioModel = new Socio_ass();
        $socio = $socioModel->where('empresa_id', $empresaId)->first();

        if (!$socio) {
            return redirect()->back()->with('error', 'Sócio não encontrado.');
        }

        // Instancia o modelo de Contabilidade e busca informações relacionadas
        $contabilidadeModel = new Contabilidade();
        $contabilidade = $contabilidadeModel->where('empresa_id', $empresaId)->first();

        // Atualiza a situação da empresa para "Contrato"
        $empresaUpdateData = ['situacao' => 'Contrato'];
        $empresaUpdated = $empresaModel->update($empresaId, $empresaUpdateData);

        // Verifica se a atualização foi bem-sucedida
        if ($empresaUpdated) {
            $documentoController = new DocumentoController();
            // Gera o documento, passando o ID do sócio e o ID da empresa
            return $documentoController->gerarDoc($socio['id'], $empresaId);
        } else {
            return redirect()->back()->with('error', 'Falha ao atualizar situação da empresa para Contrato.');
        }
    }

}
