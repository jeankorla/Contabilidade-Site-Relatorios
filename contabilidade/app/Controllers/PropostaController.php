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
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.9.4, mobirise.com">
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:image:src" content="assetsClientes/images/index-meta.png">
  <meta property="og:image" content="assetsClientes/images/index-meta.png">
  <meta name="twitter:title" content="Página Inicial">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assetsClientes/images/design-sem-nome-8-128x128.png" type="image/x-icon">
  <meta name="description" content="25 anos no mercado, englobando uma rede de empresas! TUDO QUE VOCÊ PRECISA, EM UM SÓ LUGAR! > SC CONTABILIDADE > SPOLAOR CONSULT > SPOLAOR IMOVÉIS > SC COWORKING">
  <meta property="og:title" content="SC Contabilidade" />
  <meta property="og:description" content="Acesse nosso site!" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:url" content="https://spolaorcompany.com.br">
  <meta property="og:image" content="https://spolaorcompany.com.br/assets/images/banner-capa.png" />
  <meta property="og:image:type" content="https://spolaorcompany.com.br/assets/images/banner-capa.png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:alt" content="Imagem ilustrativa" />
  
  <title>Página Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assetsClientes/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assetsClientes/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assetsClientes/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assetsClientes/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assetsClientes/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assetsClientes/parallax/jarallax.css">
  <link rel="stylesheet" href="assetsClientes/dropdown/css/style.css">
  <link rel="stylesheet" href="assetsClientes/socicon/css/styles.css">
  <link rel="stylesheet" href="assetsClientes/theme/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel="stylesheet"">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assetsClientes/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assetsClientes/mobirise/css/mbr-additional.css" type="text/css">


  <style>
    /* Estilo para dispositivos móveis */
    @media (max-width: 767px) { /* limite para celular */
        .features12 .image-wrapper img {
            width: 100%; /* Certifica-se de que a largura é adequada para a tela do celular */
            height: auto; /* Mantém a proporção da imagem */
            max-width: 300px; /* Limita o tamanho máximo da imagem */
        }
    }

    /* Estilo para aplicar a fonte Montserrat à tabela */
.table-wrapper {
    font-family: "Montserrat", sans-serif; /* Define a fonte para a tabela */
}
#input{
    background-color: #eee;
}
    </style>
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu3 cid-tPyWbr8wEr" once="menu" id="menu3-3">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg" style="background-color: #232323 !important;">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html#top">
                        <img src="assetsClientes/images/png-transparente-sc-fundo-azul-removebg-preview-90x64.webp" alt="Logo da página inicial" style="height: 3.9rem;">
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
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="https://www.canva.com/design/DAF6047mnK4/bR11P-sWup_XI64qHHE6dw/view?utm_content=DAF6047mnK4&utm_campaign=designshare&utm_medium=link&utm_source=editor#2" target="_blank">QUEM SOMOS</a></li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://www.instagram.com/spolaorcompany/?igshid=NzZhOTFlYzFmZQ%3D%3D" target="_blank">
                        <span class="p-2 mbr-iconfont"><i class="bi bi-instagram"></i></span>
                    <a class="iconfont-wrapper" href="https://www.linkedin.com/company/spolaor-contabilidade/" target="_blank">
                        <span class="p-2 mbr-iconfont"><i class="bi bi-linkedin"></i></span>
                    <a class="iconfont-wrapper" href="https://api.whatsapp.com/send?phone=551333614324&text=Ol%C3%A1." target="_blank">
                        <span class="p-2 mbr-iconfont"><i class="bi bi-whatsapp"></i></span>
                    </a>
                </div>
                
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="header4 mbr-fullscreen mbr-parallax-background" id="header4-2" style="position: relative;">
    <img src="assetsClientes/images/contabilidade.webp" class="img-fluid" alt="Imagem responsiva" style="width: 100%">
    
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap">
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="slider4 mbr-embla cid-ub5dqf75K9" id="slider4-v">
    
    
    <div class="position-relative text-center">
        
        <div class="embla mt-4" data-skip-snaps="true" data-align="center" data-contain-scroll="trimSnaps" data-loop="true" data-auto-play="true" data-auto-play-interval="6" data-draggable="true">
            <div class="embla__viewport container-fluid">
                <div class="embla__container">
                    <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                        <div class="slide-content">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="assetsClientes/images/11-800x500.webp" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="item-content">
                                
                                <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><em>Nosso departamento contábil está pronto a atender as necessidades legais da sua empresa</em></h6>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                        <div class="slide-content">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="assetsClientes/images/21-800x500.webp" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="item-content">
                                
                                <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><em>Imprescindível para qualquer empresa, sendo responsável pela execução de toda a rotina de departamento de pessoal.</em></h6>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                        <div class="slide-content">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="assetsClientes/images/31-800x500.webp" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="item-content">
                                
                                <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><em>Sua empresa com uma assessoria completa para atender a todas as obrigações fiscais.</em></h6>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                        <div class="slide-content">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="assetsClientes/images/41-800x500.webp" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="item-content">
                                
                                <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><em>Abra sua empresa com a estrutura societária mais adequada, sempre com foco na economia tributária.</em></h6>
                                
                            </div>
                            
                        </div>
                    </div><div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                        <div class="slide-content">
                            <div class="item-wrapper">
                                <div class="item-img">
                                    <img src="assetsClientes/images/51-800x500.webp" alt="Mobirise Website Builder" data-slide-to="4" data-bs-slide-to="5">
                                </div>
                            </div>
                            <div class="item-content">
                                
                                <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><em>Está buscando soluções específicas para o seu negócio? Os melhores planos de trabalho para o seu ramo de atuação.</em></h6>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <button class="embla__button embla__button--prev">
                <span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont" aria-hidden="true"></span>
                <span class="sr-only visually-hidden visually-hidden">Previous</span>
            </button>
            <button class="embla__button embla__button--next">
                <span class="mobi-mbri mobi-mbri-arrow-next mbr-iconfont" aria-hidden="true"></span>
                <span class="sr-only visually-hidden visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


<section data-bs-version="5.1" class="info1 cid-ub4XNbd3ep mbr-parallax-background" id="info1-n">
    

    
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(68, 121, 217);"></div>
    <div class="align-center container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h3 class="mbr-section-title mb-4 mbr-fonts-style display-5">
                    <strong>TECNOLOGIA E INOVAÇÃO</strong></h3>
                
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features12 cid-ub50lfSgbA" id="features12-o">
    <div class="container">
        <div class="m-0 row align-items-center">
            <div class="col-12 col-lg">
                <div class="card-wrapper">
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mb-4 display-5"><strong>AUTOMAÇÕES</strong></h4>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            Foco em desenvolver recursos "automatizados" e não "robotizados", trazendo agilidade e precisão com interação pessoal e não robótica, nossa equipe está sempre preparada para melhor lhe atender.
                        </p>
                        <div class="mbr-text mbr-fonts-style counter-container display-7">
                            <ul>
                                <li><span style="font-size: 1rem;">Busca de notas</span></li>
                                <li><span style="font-size: 1rem;">Importação da Movimentação Financeira com extratos bancários</span></li>
                                <li><span style="font-size: 1rem;">Verifica situação fiscal</span></li>
                                <li><span style="font-size: 1rem;">Baixas e envio de CND’s</span></li>
                                <li><span style="font-size: 1rem;">Aplicativo <em>Próprio</em> para comunicação e entrega de documentos</span></li>
                                <li>Parceiro oficial Omie</li>
                                <li><span style="font-size: 1rem;">Entrega de Holerites por e-mail ou APP</span></li>
                                <li><span style="font-size: 1rem;">RH Online</span></li>
                                <li>Documentos em Nuvem</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-0 col-12 col-lg-4 md-pb">
                <div class="image-wrapper"  style="display: flex; justify-content: center; align-items: center;"> <!-- Centraliza a imagem -->
                    <img src="assetsClientes/images/mbr-858x572.webp" alt="Imagem representando automações" style="width: 65%; height: auto;"> <!-- Tamanho adaptável -->
                </div>
            </div>
        </div>
    </div>
</section>
<section data-bs-version="5.1" class="features12 cid-ub5267iwYJ" id="features12-p">
    
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
                <div class="image-wrapper" style="display: flex; justify-content: center; align-items: center;">
                    <img src="assetsClientes/images/sc-smarth-1073x604.webp" alt="Mobirise Website Builder"  style="width: 75%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="slider4 mbr-embla cid-ub5nWaI3EZ" id="slider4-w" style="background-color: #fdfdfd;">
    
    
    <div class="position-relative text-center">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5">
                <strong>ACESSE</strong></h4>
            
        </div>
        <div class="embla mt-4" 
        data-skip-snaps="true" 
        data-align="center" 
        data-contain-scroll="trimSnaps" 
        data-loop="true" 
        data-auto-play="true" 
        data-auto-play-interval="4" 
        data-draggable="true">
        
        <div class="embla__viewport container-fluid">
            <div class="embla__container" style="display: flex;"> <!-- Flexbox para centralizar os slides -->
                <!-- Slide 1 -->
                <div class="embla__slide slider-image item" style="margin: 1rem;">
                    <div class="slide-content">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <a href="https://play.google.com/store/apps/details?id=com.spolaorcontabilidade&pli=1">
                                    <img src="assetsClientes/images/2-1-800x500.webp" alt="ANDROID">
                                </a>
                            </div>
                        </div>
                        <div class="mbr-section-btn item-footer mt-2" style="display: flex; justify-content: center;"> <!-- Centraliza o botão -->
                            <a href="https://play.google.com/store/apps/details?id=com.spolaorcontabilidade&pli=1" class="btn item-btn btn-danger display-7" target="_blank">Android</a>
                        </div>
                    </div>
                </div>
    
                <!-- Slide 2 -->
                <div class="embla__slide slider-image item" style="margin: 1rem;">
                    <div class="slide-content">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <a href="https://apps.apple.com/br/app/spolaor-contabilidade/id1592899809?l=en&platform=iphone">
                                    <img src="assetsClientes/images/1-400x250.webp" alt="Apple Store">
                                </a>
                            </div>
                        </div>
                        <div class="mbr-section-btn item-footer mt-2" style="display: flex; justify-content: center;"> <!-- Centraliza o botão -->
                            <a href="https://apps.apple.com/br/app/spolaor-contabilidade/id1592899809?l=en&platform=iphone" class="btn item-btn btn-danger display-7" target="_blank">IOS</a>
                        </div>
                    </div>
                </div>
    
                <!-- Slide 3 -->
                <div class="embla__slide slider-image item" style="margin: 1rem;">
                    <div class="slide-content">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <a href="https://apps.apple.com/br/app/spolaor-contabilidade/id1592899809?l=en&platform=iphone">
                                    <img src="assetsClientes/images/internet-400x250.webp" alt="Apple Store">
                                </a>
                            </div>
                        </div>
                        <div class="mbr-section-btn item-footer mt-2" style="display: flex; justify-content: center;"> <!-- Centraliza o botão -->
                            <a href="https://vip.acessorias.com/spolaorcontabilidade" class="btn item-btn btn-danger display-7" target="_blank">Web</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Botões de navegação -->
        <button class="embla__button embla__button--prev">
            <span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont" aria-hidden="true"></span>
            <span class="sr-only visually-hidden">Previous</span>
        </button>
        
        <button class="embla__button embla__button--next">
            <span class="mobi-mbri mobi-mbri-arrow-next mbr-iconfont" aria-hidden="true"></span>
            <span class="sr-only visually-hidden">Next</span>
        </button>
    </div>
</section>


<section data-bs-version="5.1" class="content16 cid-ubmk1R3QRS" id="content16-x" style="background-color: #fdfdfd">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="mbr-section-head align-center mb-4">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-5">
                        <span style="font-size: 2rem;">
                            <strong>À <span style="background-color: yellow; font-weight: bold;">' . $empresa['nome'] . '</span> </strong> 
                        </span>
                        <div>
                            <strong>A/C DIRETORES</strong>
                        </div>
                    </h3>
                    <h4 class="mbr-section-subtitle mb-0 mt-2 mbr-fonts-style display-7">
                        Ref.: Proposta de Prestação de Serviços Contábeis para empresa Tributada pelo Regime Federal 
                        <span style="background-color: yellow;">
                            <strong>do ' . $empresa['tributacao'] . '</strong>.
                        </span>
                        <br><br>
                        <span style="text-decoration: underline;">
                        <strong>DO OBJETO<br></strong><br>
                    </span>
                        <div>
                            O objeto da presente consiste em propor prestação de Serviços Contábeis pela 
                            <strong>SPOLAOR CONTABILIDADE LTDA, CNPJ nº 39.897.569/0001-37, CRC nº 2SP042992/O-6,</strong> à favor da 
                            <span style="background-color: yellow;">
                                <strong>' . $empresa['nome'] . ', CNPJ nº ' . $empresa['cnpj'] . '</strong>
                            </span>, dos seguintes serviços profissionais:
                        </div>
                    </h4>
                </div>
                <div id="bootstrap-accordion_7" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_7" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>1 - ÁREA CONTÁBIL</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse1_7" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_7">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    <strong>1.1.1</strong> - Classificação e escrituração da contabilidade de acordo com as normas e princípios contábeis vigentes;
                                    <br><strong>1.1.2</strong> - Apuração de balancetes;
                                    <br><strong>1.1.3</strong> - Elaboração do Balanço Anual e Demonstrativo de Resultados.&nbsp;<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse2_7" aria-expanded="false" aria-controls="collapse2">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>2 - ÁREA FISCAL</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse2_7" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_7">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    <strong>2.2.1</strong> - Orientação e controle da aplicação dos dispositivos legais vigentes, sejam federais, estaduais ou municipais;
                                    <br><strong>2.2.2</strong> - Escrituração dos registros fiscais quando devido, do IPI, ICMS, ISS e elaboração das guias de informação e de recolhimento dos tributos devidos;
                                    <br><strong>2.2.3</strong> - Atendimento das demais exigências previstas em atos normativos, bem como de eventuais procedimentos de fiscalização tributária.&nbsp;<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_7" aria-expanded="false" aria-controls="collapse3">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>3 - ÁREA DO IMPOSTO DE RENDA PESSOA JURÍDICA</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse3_7" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_7">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    <strong>3.3.1</strong> - Orientação e controle de aplicação dos dispositivos legais vigentes;
                                    <br><strong>3.3.2</strong> - Elaboração da declaração anual de rendimentos e documentos correlatos;
                                    <br><strong>3.3.3</strong> - Atendimento das demais exigências previstas em atos normativos, bem como de eventuais procedimentos de fiscalização.&nbsp;<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse4_7" aria-expanded="false" aria-controls="collapse4">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>4 - DO VALOR DOS SERVIÇOS</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse4_7" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_7">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    <strong>4.1</strong> - Para a execução dos serviços constantes nos itens 1 à 3, relacionados acima, <b>à partir da competência </b>
                                    <span style="background-color: yellow;">
                                        <strong>'. $contabilidade['competencia']  .'</strong>
                                    </span> 
                                    à <b>Spolaor Contabilidade</b> propõe os honorários profissionais mensais correspondentes à 
                                    <span style="background-color: yellow;">
                                        <strong>' . $contabilidade['honorario'] .'</strong>
                                    </span> 

                                    até o dia 01 do mês subsequente ao vencido, podendo a cobrança ser veiculada através de cobrança bancária.
                                    <br>
                                    <strong>4.2</strong> - Para a execução dos serviços em cumprimento das obrigações acessórias mensais e anuais, os serviços <b>não serão cobrados à parte, exceto,</b> caso seja criado nova obrigação acessória pelo erário público e o imposto de renda da pessoa física, caso seja feito pela contabilidade.
                                    <br>
                                    <strong>4.3</strong> – Os Honorários serão reajustados de acordo com o índice de reajuste do salário mínimo vigente, desta forma, sempre que atualizar o salário mínimo e independentemente do tempo de contrato com a contabilidade, será aplicado o reajuste nos honorários da época vigente.
                                    <br>
                                    <strong>4.4</strong> – Sem prejuízo do previsto no item 4.3, os honorários poderão ser aumentados de comum acordo entre as partes, conforme volume de aumento do trabalho executado pela contabilidade.
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="content4 cid-ubmq0U5pmr" id="content4-11">
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-12">
                
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">Os parâmetros de fixação dos honorários tiveram como base o volume de papéis e informações fornecidas pela CONTRATANTE, como segue:</h4>
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="image3 cid-ubmpPj7caV" id="image3-10">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="table-wrapper"> <!-- Substituição da imagem por uma tabela -->
                    <div class="table-wrapper"> <!-- Aplicando a fonte Montserrat -->
                    <table class="table"> <!-- Criação da tabela -->
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
            </div>
        </div>
    </div>
</section>


<section data-bs-version="5.1" class="content4 cid-ubmwTd017X" id="content4-12">
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-12">
                
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7"><strong>' . $dataAtual . '</strong><br></h4>
                
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="image3 cid-ubmxaARWoA" id="image3-13">
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="image-wrapper">
                    <img src="assetsClientes/images/captura-de-tela-2024-04-29-160727-407x307.webp" alt="Mobirise Website Builder">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="content11 cid-ubmByrNyPh" id="content11-14">
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="mbr-section-btn align-center"><a type="button" data-bs-toggle="modal" data-bs-target="#formularioModal" class="btn btn-danger display-4" href="">Aceitar Proposta</a></div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="formularioModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Informações Necessárias</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="propostaForm" action="' . base_url("PropostaController/store") . '" method="post">
        <input type="hidden" name="empresa_id" value="' . $empresa['id'] . '">
          <div class="row">
            <div class="col-md-7">
              <label for="socio_asses_nome" class="form-label">Nome do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_nome" name="socio_asses_nome" required>
            </div>
            <div class="col-3">
              <label for="socio_asses_nacional" class="form-label">Nacionalidade do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_nacional" name="socio_asses_nacional" required>
            </div>
            <div class="col-2">
              <label for="socio_asses_idade" class="form-label">Idade do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_idade" name="socio_asses_idade" required>
            </div>
            <div class="col-6">
              <label for="socio_asses_rg" class="form-label">RG do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_rg" name="socio_asses_rg" required oninput="aplicarMascaraRG(this)" maxlength="12">
            </div>
            <div class="col-6">
              <label for="socio_asses_cpf" class="form-label">CPF do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_cpf" name="socio_asses_cpf" required oninput="aplicarMascaraCPF(this)" maxlength="14">
            </div>
            <div class="col-3">
              <label for="socio_asses_endereco_cep" class="form-label">CEP do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_cep" name="socio_asses_endereco_cep" required oninput="aplicarMascaraCEP(this)" maxlength="9">
            </div>
            <div class="col-md-6">
              <label for="socio_asses_endereco_cidade" class="form-label">Cidade do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_cidade" name="socio_asses_endereco_cidade" required>
            </div>
            <div class="col-3">
              <label for="socio_asses_endereco_estado" class="form-label">Estado do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_estado" name="socio_asses_endereco_estado" required>
            </div>
            <div class="col-5">
              <label for="socio_asses_endereco_rua" class="form-label">Rua do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_rua" name="socio_asses_endereco_rua" required>
            </div>
            <div class="col-md-2">
              <label for="socio_asses_endereco_numero" class="form-label">Número:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_numero" name="socio_asses_endereco_numero" required>
            </div>
            <div class="col-md-5">
              <label for="socio_asses_endereco_bairro" class="form-label">Bairro do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_bairro" name="socio_asses_endereco_bairro" required>
            </div>
            
            <div class="col-5">
              <label for="socio_asses_endereco_complemento" class="form-label">Complemento do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_endereco_complemento" name="socio_asses_endereco_complemento" required>
            </div>
             <div class="col-md-7">
              <label for="socio_asses_email" class="form-label">E-mail do Sócio:</label>
              <input type="text" class="form-control" id="socio_asses_email" name="socio_asses_email" required>
            </div>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Próximo Passo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<section data-bs-version="5.1" class="footer7 cid-sFHu2wLoQp" once="footers" id="footer7-9">

    <div class="container">
        <div class="row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">Copyright © 2024 Spolaor Company&nbsp;- Todos os direitos reservados</p>
            </div>
        </div>
    </div>
</section><section class="display-7"><script src="assetsClientes/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assetsClientes/parallax/jarallax.js"></script>  <script src="assetsClientes/smoothscroll/smooth-scroll.js"></script>  <script src="assetsClientes/ytplayer/index.js"></script>  <script src="assetsClientes/dropdown/js/navbar-dropdown.js"></script>  <script src="assetsClientes/embla/embla.min.js"></script>  <script src="assetsClientes/embla/script.js"></script>  <script src="assetsClientes/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assetsClientes/theme/js/script.js"></script>  
    
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
