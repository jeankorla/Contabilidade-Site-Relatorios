<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<style>
    html, body {
      font-size: 90%;
    }

    .Documents-btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: fit-content;
  height: 45px;
  border: none;
  padding: 0px 15px;
  border-radius: 5px;
  background-color: rgb(49, 49, 83);
  gap: 10px;
  cursor: pointer;
  transition: all 0.3s;
}
.folderContainer {
  width: 40px;
  height: fit-content;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-end;
  position: relative;
}
.fileBack {
  z-index: 1;
  width: 80%;
  height: auto;
}
.filePage {
  width: 50%;
  height: auto;
  position: absolute;
  z-index: 2;
  transition: all 0.3s ease-out;
}
.fileFront {
  width: 85%;
  height: auto;
  position: absolute;
  z-index: 3;
  opacity: 0.95;
  transform-origin: bottom;
  transition: all 0.3s ease-out;
}
.text {
  color: white;
  font-size: 14px;
  font-weight: 600;
  letter-spacing: 0.5px;
}
.Documents-btn:hover .filePage {
  transform: translateY(-5px);
}
.Documents-btn:hover {
  background-color: rgb(58, 58, 94);
}
.Documents-btn:active {
  transform: scale(0.95);
}
.Documents-btn:hover .fileFront {
  transform: rotateX(30deg);
}

    .continue-application {
  --color: #fff;
  --background: #404660;
  --background-hover: #3A4059;
  --background-left: #2B3044;
  --folder: #F3E9CB;
  --folder-inner: #BEB393;
  --paper: #FFFFFF;
  --paper-lines: #BBC1E1;
  --paper-behind: #E1E6F9;
  --pencil-cap: #fff;
  --pencil-top: #275EFE;
  --pencil-middle: #fff;
  --pencil-bottom: #5C86FF;
  --shadow: rgba(13, 15, 25, .2);
  border: none;
  outline: none;
  cursor: pointer;
  position: relative;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 500;
  line-height: 19px;
  -webkit-appearance: none;
  -webkit-tap-highlight-color: transparent;
  padding: 17px 29px 17px 69px;
  transition: background 0.3s;
  color: var(--color);
  background: var(--bg, var(--background));
}

.continue-application > div {
  top: 0;
  left: 0;
  bottom: 0;
  width: 53px;
  position: absolute;
  overflow: hidden;
  border-radius: 5px 0 0 5px;
  background: var(--background-left);
}

.continue-application > div .folder {
  width: 23px;
  height: 27px;
  position: absolute;
  left: 15px;
  top: 13px;
}

.continue-application > div .folder .top {
  left: 0;
  top: 0;
  z-index: 2;
  position: absolute;
  transform: translateX(var(--fx, 0));
  transition: transform 0.4s ease var(--fd, 0.3s);
}

.continue-application > div .folder .top svg {
  width: 24px;
  height: 27px;
  display: block;
  fill: var(--folder);
  transform-origin: 0 50%;
  transition: transform 0.3s ease var(--fds, 0.45s);
  transform: perspective(120px) rotateY(var(--fr, 0deg));
}

.continue-application > div .folder:before, .continue-application > div .folder:after,
.continue-application > div .folder .paper {
  content: "";
  position: absolute;
  left: var(--l, 0);
  top: var(--t, 0);
  width: var(--w, 100%);
  height: var(--h, 100%);
  border-radius: 1px;
  background: var(--b, var(--folder-inner));
}

.continue-application > div .folder:before {
  box-shadow: 0 1.5px 3px var(--shadow), 0 2.5px 5px var(--shadow), 0 3.5px 7px var(--shadow);
  transform: translateX(var(--fx, 0));
  transition: transform 0.4s ease var(--fd, 0.3s);
}

.continue-application > div .folder:after,
.continue-application > div .folder .paper {
  --l: 1px;
  --t: 1px;
  --w: 21px;
  --h: 25px;
  --b: var(--paper-behind);
}

.continue-application > div .folder:after {
  transform: translate(var(--pbx, 0), var(--pby, 0));
  transition: transform 0.4s ease var(--pbd, 0s);
}

.continue-application > div .folder .paper {
  z-index: 1;
  --b: var(--paper);
}

.continue-application > div .folder .paper:before, .continue-application > div .folder .paper:after {
  content: "";
  width: var(--wp, 14px);
  height: 2px;
  border-radius: 1px;
  transform: scaleY(0.5);
  left: 3px;
  top: var(--tp, 3px);
  position: absolute;
  background: var(--paper-lines);
  box-shadow: 0 12px 0 0 var(--paper-lines), 0 24px 0 0 var(--paper-lines);
}

.continue-application > div .folder .paper:after {
  --tp: 6px;
  --wp: 10px;
}

.continue-application > div .pencil {
  height: 2px;
  width: 3px;
  border-radius: 1px 1px 0 0;
  top: 8px;
  left: 105%;
  position: absolute;
  z-index: 3;
  transform-origin: 50% 19px;
  background: var(--pencil-cap);
  transform: translateX(var(--pex, 0)) rotate(35deg);
  transition: transform 0.4s ease var(--pbd, 0s);
}

.continue-application > div .pencil:before, .continue-application > div .pencil:after {
  content: "";
  position: absolute;
  display: block;
  background: var(--b, linear-gradient(var(--pencil-top) 55%, var(--pencil-middle) 55.1%, var(--pencil-middle) 60%, var(--pencil-bottom) 60.1%));
  width: var(--w, 5px);
  height: var(--h, 20px);
  border-radius: var(--br, 2px 2px 0 0);
  top: var(--t, 2px);
  left: var(--l, -1px);
}

.continue-application > div .pencil:before {
  -webkit-clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
  clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
}

.continue-application > div .pencil:after {
  --b: none;
  --w: 3px;
  --h: 6px;
  --br: 0 2px 1px 0;
  --t: 3px;
  --l: 3px;
  border-top: 1px solid var(--pencil-top);
  border-right: 1px solid var(--pencil-top);
}

.continue-application:before, .continue-application:after {
  content: "";
  position: absolute;
  width: 10px;
  height: 2px;
  border-radius: 1px;
  background: var(--color);
  transform-origin: 9px 1px;
  transform: translateX(var(--cx, 0)) scale(0.5) rotate(var(--r, -45deg));
  top: 26px;
  right: 16px;
  transition: transform 0.3s;
}

.continue-application:after {
  --r: 45deg;
}

.continue-application:hover {
  --cx: 2px;
  --bg: var(--background-hover);
  --fx: -40px;
  --fr: -60deg;
  --fd: .15s;
  --fds: 0s;
  --pbx: 3px;
  --pby: -3px;
  --pbd: .15s;
  --pex: -24px;
}



.jp1 {
    animation:slide 3s ease-in-out infinite alternate;
    background-image: linear-gradient(-60deg, #024A7F 50%, #0097C4 50%);
    bottom:0;
    left:-50%;
    opacity:.5;
    position:fixed;
    right:-50%;
    top:0;
    z-index:0;
    animation-duration: 5s;
}

.jp2 {
    animation-direction:alternate-reverse;
    animation-duration:6s;
}

.jp3 {
    animation-duration: 7s;
}

 @keyframes slide {
    0% {
        transform:translateX(-25%);
    }
    100% {
        transform:translateX(25%);
    }
}

#input, #situacao{
    background-color: #eee;
}
</style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #024A7F; z-index: 1;">
    <div class="container-fluid navbar-container">
        <a class="navbar-brand" href="https://sccontab.com.br/">
            <img class="img-fluid" src="<?php echo base_url('img/logo-nav.svg') ?>" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
            </ul>

        </div>
    </div>
</nav>

<section >

    <div class="jp1"></div>
    <div class="jp1 jp2"></div>
    <div class="jp1 jp3"></div>

    <div class="container">
    <div class="card mt-5 mb-5 p-5 shadow-lg">
        <div class="alert alert-danger" style="display: none;"> 
            <ul>
                <li>Erro exemplo</li>
            </ul>
        </div>

        <!-- Exibe a mensagem de erro, caso exista -->
      <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger" role="alert">
          <?= session('error') ?>
        </div>
      <?php endif; ?>



      <!-- Exibe a mensagem de erro, caso exista -->
      <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session('success') ?>
        </div>
      <?php endif; ?>
      
      
<form class="row g-3" action="<?= base_url('DocumentsController/storeDocuments/' . $data['empresa']['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="container mt-3">
            <div class="row ">
                <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5><strong>Empresa:</strong> <?= $data['empresa']['nome'] ?? 'N/A' ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="container mt-3">
    <div class="row">
        <!-- Coluna das Informações Gerais -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5><strong>Informações:</strong></h5>
                </div>
                <div class="card-body">
                    <p class="card-title"><strong>Motivo:</strong> <?= $data['cliente']['motivo'] ?? 'N/A' ?></p>
                    <p class="card-text"><strong>Faturamento:</strong> <?= $data['empresa']['faturamento'] ?? 'N/A' ?></p>
                    <p class="card-text"><strong>Tributação:</strong> <?= $data['empresa']['tributacao'] ?? 'N/A' ?></p>
                    <p class="card-text"><strong>Estado:</strong> <?= $data['empresa']['endereco_estado'] ?? 'N/A' ?></p>
                    <p class="card-text"><strong>Cidade:</strong> <?= $data['empresa']['endereco_cidade'] ?? 'N/A' ?></p>
                    <p class="card-text"><strong>Data de Cadastro:</strong> <?= date('d/m/Y', strtotime($data['cliente']['created_at'] ?? 'N/A')); ?></p>
                    <p class="card-text"><strong>Situação:</strong> <?= $data['empresa']['situacao'] ?? 'N/A' ?></p>
                </div>
            </div>
        </div>

        <!-- Coluna dos Documentos -->
        <div class="col-md-9">
            <!-- Contrato Social Registrado -->
            <h4 class="mb-3"><strong>Arquivos Principais:</strong></h4>

            <div class="list-group mb-3">
                <?php if (isset($data['documents']['social_registrado']) && file_exists($data['documents']['social_registrado'])): ?>
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Contrato Social Registrado:</strong>
                            <a href="<?= base_url($data['documents']['social_registrado']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('social_registrado', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div class="w-100">
                            <label for="social_registrado" class="form-label"><strong>Contrato Social Registrado:</strong></label>
                            <input type="file" class="form-control" id="social_registrado" name="social_registrado" accept=".pdf,.doc,.docx">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Certificado Digital -->
            <div class="list-group mb-3">
                <?php if (isset($data['documents']['certificado_digital']) && file_exists($data['documents']['certificado_digital'])): ?>
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Certificado Digital:</strong>
                            <a href="<?= base_url($data['documents']['certificado_digital']) ?>" class="btn btn-primary btn-sm">Baixar Imagem</a>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('certificado_digital', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div class="w-100">
                            <label for="certificado_digital" class="form-label"><strong>Certificado Digital:</strong></label>
                            <input type="file" class="form-control" id="certificado_digital" name="certificado_digital" accept="image/jpeg,image/png">
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Senha Certificado Digital -->
            <div class="list-group">
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div class="w-100">
                        <label for="senha_certificado_digital" class="form-label"><strong>Senha Certificado Digital:</strong></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha_certificado_digital" name="senha_certificado_digital" value="<?= $data['documents']['senha_certificado_digital'] ?? '' ?>">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('senha_certificado_digital')"><i class="bi bi-eye-slash" id="togglePasswordIcon"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-group m-5">
            <button type="submit" class="btn btn-success">Postar</button>
            </div>
        </div>
    </div>
</div>


            <!-- senha certificado DEPOIS FAZER EINNN -->

            <!-- Dados de Acesso ao Posto Fiscal -->
            <div class="container mt-3">
                <div class="list-group">
                    <h4 class="mb-3"><strong>Restante dos Arquivos:</strong></h4>
                    </div>
            </div>


       <!-- Dados de Acesso ao Posto Fiscal -->
        <div class="container mt-3">
    <div class="list-group">
        <div class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <label for="posto_fiscal_texto" class="form-label">
                        <strong>Dados de Acesso ao Posto Fiscal (Texto):</strong>
                    </label>
                    <input type="text" class="form-control" id="posto_fiscal_texto" name="posto_fiscal_texto" value="<?= $data['documents']['posto_fiscal_texto'] ?? '' ?>" placeholder="Digite aqui os dados de acesso ao posto fiscal se preferir texto">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <?php if (isset($data['documents']['posto_fiscal']) && file_exists($data['documents']['posto_fiscal'])): ?>
                    <div>
                        <strong>Documento de Acesso ao Posto Fiscal:</strong>
                        <a href="<?= base_url($data['documents']['posto_fiscal']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('posto_fiscal', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="w-100">
                        <label for="posto_fiscal" class="form-label">
                            <strong>Envio de Documento de Acesso ao Posto Fiscal (Arquivo):</strong>
                        </label>
                        <input type="file" class="form-control" id="posto_fiscal" name="posto_fiscal" accept=".pdf,.doc,.docx">
                    </div>
                <?php endif; ?>
            </div>
            </div>
            </div>
            </div>

        <!-- Dados de Acesso ao Simples Nacional -->
<div class="container mt-3">
    <div class="list-group">
        <div class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <label for="simples_nacional_texto" class="form-label">
                        <strong>Dados de Acesso ao Simples Nacional (Texto):</strong>
                    </label>
                    <input type="text" class="form-control" id="simples_nacional_texto" name="simples_nacional_texto" value="<?= $data['documents']['simples_nacional_texto'] ?? '' ?>" placeholder="Digite aqui os dados de acesso ao Simples Nacional se preferir texto">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <?php if (isset($data['documents']['simples_nacional']) && file_exists($data['documents']['simples_nacional'])): ?>
                    <div>
                        <strong>Documento de Acesso ao Simples Nacional:</strong>
                        <a href="<?= base_url($data['documents']['simples_nacional']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('simples_nacional', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="w-100">
                        <label for="simples_nacional" class="form-label">
                            <strong>Envio de Documento de Acesso ao Simples Nacional (Arquivo):</strong>
                        </label>
                        <input type="file" class="form-control" id="simples_nacional" name="simples_nacional" accept=".pdf,.doc,.docx">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


        <!-- Dados de Acesso da Prefeitura em Emissão de NFSe -->
<div class="container mt-3">
    <div class="list-group">
        <div class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <label for="prefeitura_nfse_texto" class="form-label">
                        <strong>Dados de Acesso da Prefeitura em Emissão de NFSe (Texto):</strong>
                    </label>
                    <input type="text" class="form-control" id="prefeitura_nfse_texto" name="prefeitura_nfse_texto" value="<?= $data['documents']['prefeitura_nfse_texto'] ?? '' ?>" placeholder="Digite aqui os dados de acesso para emissão de NFSe se preferir texto">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <?php if (isset($data['documents']['prefeitura_nfse']) && file_exists($data['documents']['prefeitura_nfse'])): ?>
                    <div>
                        <strong>Documento de Emissão de NFSe:</strong>
                        <a href="<?= base_url($data['documents']['prefeitura_nfse']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('prefeitura_nfse', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="w-100">
                        <label for="prefeitura_nfse" class="form-label">
                            <strong>Envio de Documento de Emissão de NFSe (Arquivo):</strong>
                        </label>
                        <input type="file" class="form-control" id="prefeitura_nfse" name="prefeitura_nfse" accept=".pdf,.doc,.docx">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- Dados de Acesso à Prefeitura para o Portal de PF -->
<div class="container mt-3">
    <div class="list-group">
        <div class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <label for="prefeitura_pf_texto" class="form-label">
                        <strong>Dados de Acesso à Prefeitura para o Portal de PF (Texto):</strong>
                    </label>
                    <input type="text" class="form-control" id="prefeitura_pf_texto" name="prefeitura_pf_texto" value="<?= $data['documents']['prefeitura_pf_texto'] ?? '' ?>" placeholder="Digite aqui os dados de acesso ao Portal de PF se preferir texto">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <?php if (isset($data['documents']['prefeitura_pf']) && file_exists($data['documents']['prefeitura_pf'])): ?>
                    <div>
                        <strong>Documento de Acesso ao Portal de PF:</strong>
                        <a href="<?= base_url($data['documents']['prefeitura_pf']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('prefeitura_pf', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="w-100">
                        <label for="prefeitura_pf" class="form-label">
                            <strong>Envio de Documento de Acesso ao Portal de PF (Arquivo):</strong>
                        </label>
                        <input type="file" class="form-control" id="prefeitura_pf" name="prefeitura_pf" accept=".pdf,.doc,.docx">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



        <!-- Dados de Acesso a Previdência Social -->
<div class="container mt-3">
    <div class="list-group">
        <div class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <label for="previdencia_social_texto" class="form-label">
                        <strong>Dados de Acesso a Previdência Social (Texto):</strong>
                    </label>
                    <input type="text" class="form-control" id="previdencia_social_texto" name="previdencia_social_texto" value="<?= $data['documents']['previdencia_social_texto'] ?? '' ?>" placeholder="Digite aqui os dados de acesso à Previdência Social se preferir texto">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <?php if (isset($data['documents']['previdencia_social']) && file_exists($data['documents']['previdencia_social'])): ?>
                    <div>
                        <strong>Documento de Acesso à Previdência Social:</strong>
                        <a href="<?= base_url($data['documents']['previdencia_social']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('previdencia_social', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                    </div>
                <?php else: ?>
                    <div class="w-100">
                        <label for="previdencia_social" class="form-label">
                            <strong>Envio de Documento de Acesso à Previdência Social (Arquivo):</strong>
                        </label>
                        <input type="file" class="form-control" id="previdencia_social" name="previdencia_social" accept=".pdf,.doc,.docx">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>




            <!-- Ficha de Registro com a atualização da CTPS -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['ctps']) && file_exists($data['documents']['ctps'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Ficha de Registro com a atualização da CTPS:</strong>
                                <a href="<?= base_url($data['documents']['ctps']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('ctps', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="ctps" class="form-label"><strong>Ficha de Registro com a atualização da CTPS:</strong></label>
                                <input type="file" class="form-control" id="ctps" name="ctps" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Última Convenção Coletiva -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['convencao_coletiva']) && file_exists($data['documents']['convencao_coletiva'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Última Convenção Coletiva:</strong>
                                <a href="<?= base_url($data['documents']['convencao_coletiva']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('convencao_coletiva', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="convencao_coletiva" class="form-label"><strong>Última Convenção Coletiva:</strong></label>
                                <input type="file" class="form-control" id="convencao_coletiva" name="convencao_coletiva" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Alvará de Funcionamento -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['alvara_funcionamento']) && file_exists($data['documents']['alvara_funcionamento'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Alvará de Funcionamento:</strong>
                                <a href="<?= base_url($data['documents']['alvara_funcionamento']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('alvara_funcionamento', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="alvara_funcionamento" class="form-label"><strong>Alvará de Funcionamento:</strong></label>
                                <input type="file" class="form-control" id="alvara_funcionamento" name="alvara_funcionamento" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Balancete do último mês -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['balancete_ultimo']) && file_exists($data['documents']['balancete_ultimo'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Balancete do último mês:</strong>
                                <a href="<?= base_url($data['documents']['balancete_ultimo']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('balancete_ultimo', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="balancete_ultimo" class="form-label"><strong>Balancete do último mês:</strong></label>
                                <input type="file" class="form-control" id="balancete_ultimo" name="balancete_ultimo" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


             <!-- Balanço Patrimonial do último exercício encerrado -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['balanco_patrimonial']) && file_exists($data['documents']['balanco_patrimonial'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Balanço Patrimonial do último exercício encerrado:</strong>
                                <a href="<?= base_url($data['documents']['balanco_patrimonial']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('balanco_patrimonial', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="balanco_patrimonial" class="form-label"><strong>Balanço Patrimonial do último exercício encerrado:</strong></label>
                                <input type="file" class="form-control" id="balanco_patrimonial" name="balanco_patrimonial" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Livro diário do último exercício corrente -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['livro_corrente']) && file_exists($data['documents']['livro_corrente'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Livro diário do último exercício corrente:</strong>
                                <a href="<?= base_url($data['documents']['livro_corrente']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('livro_corrente', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="livro_corrente" class="form-label"><strong>Livro diário do último exercício corrente:</strong></label>
                                <input type="file" class="form-control" id="livro_corrente" name="livro_corrente" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Livro diário do último exerício encerrado -->

             <div class="container mt-3">
                <div class="list-group">
                    <?php if (isset($data['documents']['livro_encerrado']) && file_exists($data['documents']['livro_encerrado'])): ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Livro diário do último exercício encerrado:</strong>
                                <a href="<?= base_url($data['documents']['livro_encerrado']) ?>" class="btn btn-primary btn-sm">Baixar Documento</a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('livro_encerrado', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                        </div>
                    <?php else: ?>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <label for="livro_encerrado" class="form-label"><strong>Livro diário do último exercício encerrado:</strong></label>
                                <input type="file" class="form-control" id="livro_encerrado" name="livro_encerrado" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <input type="hidden" name="empresa_id" value="<?= $data['empresa']['id'] ?>">

            <button type="submit" class="btn btn-success">Postar</button>
        </form>

    </div>
    </div>
                
    <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este documento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Excluir</button>
      </div>
    </div>
  </div>
</div>


</section>

<script>
let docKeyToDelete;
let empresaIdToDelete;

function deleteDocument(docKey, empresaId) {
    docKeyToDelete = docKey;
    empresaIdToDelete = empresaId;
    // Abre o modal do Bootstrap
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

document.getElementById('confirmDeleteButton').addEventListener('click', function() {
    fetch(`<?= base_url('DocumentsController/deleteDocument') ?>`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ docKey: docKeyToDelete, empresaId: empresaIdToDelete })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Recarrega a página para atualizar a lista
        } else {
            alert('Falha ao excluir o documento.');
        }
    });
});
</script>
<script>
function togglePasswordVisibility(id) {
    var input = document.getElementById(id);
    var icon = document.getElementById('togglePasswordIcon');
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    } else {
        input.type = "password";
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    }
}
</script>
<script>
function toggleInputType(id) {
    var type = document.getElementById(id + '_type').value;
    if (type === 'file') {
        document.getElementById(id + '_file').style.display = 'flex';
        document.getElementById(id + '_text').style.display = 'none';
    } else {
        document.getElementById(id + '_file').style.display = 'none';
        document.getElementById(id + '_text').style.display = 'flex';
    }
}
</script>
</body>
</html>