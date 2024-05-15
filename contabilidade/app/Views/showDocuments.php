<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    

<style>
    html, body {
      font-size: 90%;
    }
.accordion{
  margin: 40px 0;
}
.accordion .item {
    border: none;
    margin-bottom: 50px;
    background: none;
}
.t-p{
  color: rgb(193 206 216);
  padding: 40px 30px 0px 30px;
}
.accordion .item .item-header h2 button.btn.btn-link {
    background: #333435;
    color: white;
    border-radius: 0px;
    font-family: 'Poppins';
    font-size: 16px;
    font-weight: 400;
    line-height: 2.5;
    text-decoration: none;
}
.accordion .item .item-header {
    border-bottom: none;
    background: transparent;
    padding: 0px;
    margin: 2px;
}

.accordion .item .item-header h2 button {
    color: white;
    font-size: 20px;
    padding: 15px;
    display: block;
    width: 100%;
    text-align: left;
}

.accordion .item .item-header h2 i {
    float: right;
    font-size: 30px;
    color: #eca300;
    background-color: black;
    width: 60px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
}

button.btn.btn-link.collapsed i {
    transform: rotate(0deg);
}

button.btn.btn-link i {
    transform: rotate(180deg);
    transition: 0.5s;
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
        <a class="navbar-brand" href="<?= base_url('AdminController') ?>">
            <img class="img-fluid" src="<?php echo base_url('img/logo-nav.svg') ?>" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Itens de navegação -->
                <li class="nav-item">
                    <a class="nav-link" href="https://sccontab.com.br/AdminController" style="color: white; font-size: 20px;">Lead</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://sccontab.com.br/ContatoController" style="color: white; font-size: 20px;">Contato</a>
                </li>
            </ul>

            <!-- Botão de Configurações -->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#configModal">
                Configurações
            </button>
        </div>
    </div>
</nav>

<!-- Formulário de pesquisa -->
      <div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="configModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configModalLabel">Configurações</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulário para atualizar o nome de usuário -->
        <form action="<?= base_url('LoginController/updateUsername') ?>" method="post">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Novo nome de usuário:</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Nome de Usuário</button>
        </form>

        <!-- Formulário para atualizar a senha -->
        <form action="<?= base_url('LoginController/updatePassword') ?>" method="post" class="mt-3">
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nova senha:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Senha</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>





<section >

    <div class="jp1"></div>
    <div class="jp1 jp2"></div>
    <div class="jp1 jp3"></div>

    <div class="container">
    <div class="card mt-5 mb-5 p-5 shadow-lg">
        <div class="col-12 mb-5">
            <a class="btn btn-danger" href="<?= base_url('AdminController/index') ?>">Voltar</a>
        </div>
        <h1 class="mb-5">Documentos</h1>

        <div class="alert alert-danger" style="display: none;"> 
            <ul>
                <li>Erro exemplo</li>
            </ul>
        </div>
        
        <form class="row g-3" action="<?= base_url('ClienteController/atualizarCliente/' . $data['cliente']['id']) ?>" method="post" >

        <input type="hidden" name="empresa_id" value="<?= $data['empresa']['id'] ?>">

            <div class="container">
    <div class="accordion" id="accordionInfo">
        <!-- Collapse for Contact Information -->
        <div class="item">
            <div class="item-header" id="headingContact">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                        Contato
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseContact" class="collapse show" aria-labelledby="headingContact" data-parent="#accordionInfo">
                <div class="t-p">
                    <div class="col-md-6">
                        <label for="nome_contato" class="form-label">Nome de Contato:</label>
                        <p class="form-control-static"><?= $data['cliente']['nome'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <label for="email_contato" class="form-label">Email de Contato:</label>
                        <p class="form-control-static"><?= $data['cliente']['email'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="tel_contato" class="form-label">Telefone do Contato:</label>
                        <p class="form-control-static"><?= $data['cliente']['tel'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="cpf_contato" class="form-label">CPF do Contato:</label>
                        <p class="form-control-static"><?= $data['cliente']['cpf'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collapse for Company Information -->
        <div class="item">
            <div class="item-header" id="headingCompany">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="false" aria-controls="collapseCompany">
                        Empresa Informações
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseCompany" class="collapse" aria-labelledby="headingCompany" data-parent="#accordionInfo">
                <div class="t-p">
                    <!-- Add all your company information sections here as shown previously -->
                    <!-- Example for a few fields -->
                    <!-- CNPJ -->
                    <div class="col-4">
                        <label for="cnpj" class="form-label">CNPJ:</label>
                        <p class="form-control-static"><?= $data['empresa']['cnpj'] ?></p>
                    </div>

                    <!-- Nome da Empresa -->
                    <div class="col-4">
                        <label for="nome_empresa" class="form-label">Nome da Empresa:</label>
                        <p class="form-control-static"><?= $data['empresa']['nome'] ?></p>
                    </div>

                    <!-- Nome Fantasia -->
                    <div class="col-4">
                        <label for="fantasia" class="form-label">Nome Fantasia:</label>
                        <p class="form-control-static"><?= $data['empresa']['fantasia'] ?></p>
                    </div>

                    <!-- Telefone da Empresa -->
                    <div class="col-3">
                        <label for="tel_empresa" class="form-label">Telefone da Empresa:</label>
                        <p class="form-control-static"><?= $data['empresa']['tel'] ?></p>
                    </div>

                    <!-- Faturamento -->
                    <div class="col-3">
                        <label for="faturamento" class="form-label">Faturamento:</label>
                        <p class="form-control-static"><?= $data['empresa']['faturamento'] ?></p>
                    </div>

                    <!-- Funcionários -->
                    <div class="col-3">
                        <label for="funcionarios" class="form-label">Funcionários:</label>
                        <p class="form-control-static"><?= $data['empresa']['funcionarios'] ?></p>
                    </div>

                    <!-- Tributação -->
                    <div class="col-3">
                        <label for="tributacao" class="form-label">Tributação:</label>
                        <p class="form-control-static"><?= $data['empresa']['tributacao'] ?></p>
                    </div>

                    <!-- Quantidade de Notas-Fiscais -->
                    <div class="col-3">
                        <label for="nfe" class="form-label">Quantidade de Notas-Fiscais:</label>
                        <p class="form-control-static"><?= $data['empresa']['nfe'] ?></p>
                    </div>

                    <!-- Lançamentos -->
                    <div class="col-md-3">
                        <label for="lancamento" class="form-label">Lançamentos:</label>
                        <p class="form-control-static"><?= $data['empresa']['lancamento'] ?></p>
                    </div>

                    <!-- Natureza Jurídica -->
                    <div class="col-md-5">
                        <label for="natureza_juridica" class="form-label">Natureza Jurídica:</label>
                        <p class="form-control-static"><?= $data['empresa']['natureza_juridica'] ?></p>
                    </div>

                    <!-- Capital Social -->
                    <div class="col-md-2">
                        <label for="capital_social" class="form-label">Capital Social:</label>
                        <p class="form-control-static"><?= $data['empresa']['capital_social'] ?></p>
                    </div>

                    <!-- Abertura -->
                    <div class="col-md-2">
                        <label for="abertura" class="form-label">Abertura:</label>
                        <p class="form-control-static"><?= $data['empresa']['abertura'] ?></p>
                    </div>

                    <!-- Tipo -->
                    <div class="col-md-3">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <p class="form-control-static"><?= $data['empresa']['tipo'] ?></p>
                    </div>

                    <!-- Porte -->
                    <div class="col-md-4">
                        <label for="porte" class="form-label">Porte:</label>
                        <p class="form-control-static"><?= $data['empresa']['porte'] ?></p>
                    </div>

                    <!-- Situação -->
                    <div class="col-md-7">
                        <label for="situacao" class="form-label">Situação:</label>
                        <p class="form-control-static"><?= $data['empresa']['situacao'] ?></p>
                    </div>

                    <!-- Section for Secondary Activities -->
                    <div class="col-md-12">
                        <h2 class="mb-5">Atividades Secundárias</h2>
                    </div>
                    <?php foreach ($data['atividades'] as $index => $atividade): ?>
                        <div class="col-md-3">
                            <label for="atividade_secundaria_<?= $index ?>_codigo" class="form-label">Código Atividade:</label>
                            <p class="form-control-static"><?= $atividade['codigo'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="atividade_secundaria_<?= $index ?>_texto" class="form-label">Atividade Secundária:</label>
                            <p class="form-control-static"><?= $atividade['texto'] ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

<!-- Collapse for Address Information -->
        <div class="item">
            <div class="item-header" id="headingAddress">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
                        Empresa Endereço
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseAddress" class="collapse" aria-labelledby="headingAddress" data-parent="#accordionInfo">
                <div class="t-p">
                    <div class="col-2">
                        <label for="endereco_empresa_cep" class="form-label">Empresa CEP:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_cep'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="endereco_empresa_rua" class="form-label">Empresa Rua:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_rua'] ?></p>
                    </div>
                    <div class="col-md-2">
                        <label for="endereco_empresa_numero" class="form-label">Empresa Numero:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_numero'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="endereco_empresa_complemento" class="form-label">Complemento:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_complemento'] ?></p>
                    </div>
                    <div class="col-md-5">
                        <label for="endereco_empresa_bairro" class="form-label">Empresa Bairro:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_bairro'] ?></p>
                    </div>
                    <div class="col-md-5">
                        <label for="endereco_empresa_cidade" class="form-label">Empresa Cidade:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_cidade'] ?></p>
                    </div>
                    <div class="col-md-2">
                        <label for="endereco_empresa_estado" class="form-label">Empresa Estado:</label>
                        <p class="form-control-static"><?= $data['empresa']['endereco_estado'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collapse for Sócios da Empresa -->
        <div class="item">
            <div class="item-header" id="headingAddress">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
                        Sócios da Empresa
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseAddress" class="collapse" aria-labelledby="headingAddress" data-parent="#accordionInfo">
                <div class="t-p">
                    <!-- Section for Partners -->
                <?php foreach ($data['socios'] as $index => $socio): ?>
                    <div class="col-md-7">
                        <label for="socio_<?= $index ?>_nome" class="form-label">Nome do Sócio:</label>
                        <p class="form-control-static"><?= $socio['nome'] ?></p>
                    </div>
                    <div class="col-3">
                        <label for="socio_<?= $index ?>_qualifica" class="form-label">Qualificação:</label>
                        <p class="form-control-static"><?= $socio['qualifica'] ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
                </div>
            </div>
        </div>



        <!-- Collapse for Representante da Contratante -->
        <div class="item">
            <div class="item-header" id="headingAddress">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
                        Representante da Contratante
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseAddress" class="collapse" aria-labelledby="headingAddress" data-parent="#accordionInfo">
                <div class="t-p">
                    <div class="col-md-7">
                    <label for="socio_asses_nome" class="form-label">Nome do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['nome'] ?? 'N/A' ?></p>
                </div>
                <div class="col-3">
                    <label for="socio_asses_nacional" class="form-label">Nacionalidade do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['nacionalidade'] ?? 'N/A' ?></p>
                </div>
                <div class="col-2">
                    <label for="socio_asses_idade" class="form-label">Idade do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['idade'] ?? 'N/A' ?></p>
                </div>
                <div class="col-6">
                    <label for="socio_asses_rg" class="form-label">RG do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['rg'] ?? 'N/A' ?></p>
                </div>
                <div class="col-6">
                    <label for="socio_asses_cpf" class="form-label">CPF do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['cpf'] ?? 'N/A' ?></p>
                </div>
                <div class="col-3">
                    <label for="socio_asses_endereco_cep" class="form-label">CEP do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_cep'] ?? 'N/A' ?></p>
                </div>
                <div class="col-md-6">
                    <label for="socio_asses_endereco_cidade" class="form-label">Cidade do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_cidade'] ?? 'N/A' ?></p>
                </div>
                <div class="col-md-5">
                    <label for="socio_asses_endereco_bairro" class="form-label">Bairro do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_bairro'] ?? 'N/A' ?></p>
                </div>
                <div class="col-5">
                    <label for="socio_asses_endereco_rua" class="form-label">Rua do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_rua'] ?? 'N/A' ?></p>
                </div>
                <div class="col-5">
                    <label for="socio_asses_endereco_complemento" class="form-label">Complemento do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_complemento'] ?? 'N/A' ?></p>
                </div>
                <div class="col-md-2">
                    <label for="socio_asses_endereco_numero" class="form-label">Número do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_numero'] ?? 'N/A' ?></p>
                </div>
                <div class="col-3">
                    <label for="socio_asses_endereco_estado" class="form-label">Estado do Sócio:</label>
                    <p class="form-control-static"><?= $data['socio_asses']['endereco_estado'] ?? 'N/A' ?></p>
                </div>
                </div>
            </div>
        </div>

 <!-- Collapse for Contabilidade -->
        <div class="item">
            <div class="item-header" id="headingAddress">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
                        Contabilidade
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseAddress" class="collapse" aria-labelledby="headingAddress" data-parent="#accordionInfo">
                <div class="t-p">
                    <div class="col-4">
                    <label for="inicio_contabilidade" class="form-label">Início na Contabilidade:</label>
                    <p class="form-control-static"><?= $data['contabilidade']['inicio_contabilidade'] ?? 'N/A' ?></p>
                </div>
                <div class="col-4">
                    <label for="competencia" class="form-label">Competência:</label>
                    <p class="form-control-static"><?= $data['contabilidade']['competencia'] ?? 'N/A' ?></p>
                </div>
                <div class="col-4">
                    <label for="honorario" class="form-label">Honorário:</label>
                    <p class="form-control-static"><?= $data['contabilidade']['honorario'] ?? 'N/A' ?></p>
                </div>
                <div class="col-12">
                    <label for="honorario_texto" class="form-label">Honorário Texto:</label>
                    <p class="form-control-static"><?= $data['contabilidade']['honorario_texto'] ?? 'N/A' ?></p>
                </div>
                </div>
            </div>
        </div>



    </div>
</div>


            <!-- BOTÃO GERAR PROPOSTA -->
           

            <div class="d-flex justify-content-between">
                <div class="col-6">
                    <a class="btn btn-danger" href="<?= base_url('AdminController/index') ?>">Cancelar</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-clockwise" style="margin-right: 5px;"></i>Atualizar</button>
                    
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                   <a type="button" href="javascript:void(0);" class="continue-application" id="generateProposalBtn" style="text-decoration: none;">
                        <div>
                            <div class="pencil"></div>
                            <div class="folder">
                                <div class="top">
                                    <svg viewBox="0 0 24 27">
                                        <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 1.01453063e-16,0.44771525 1,0 Z"></path>
                                    </svg>
                                </div>
                                <div class="paper"></div>
                            </div>
                        </div>
                        Gerar Proposta
                    </a>
                    </div>
                    </div>

                    <!-- Código HTML do modal -->
                    <div class="modal fade" id="proposalModal" tabindex="-1" aria-labelledby="proposalModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="proposalModalLabel">Proposta Gerada</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3 id="proposalMessage"></h3>
                                    <a id="proposalLink" href="#" target="_blank">Clique aqui para ver a proposta</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="d-flex justify-content-center align-items-center" style="margin-top: 30vh;">
                        <h1>Gerar Contrato <span style="color: red;">SEM</span> criar Proposta!</h1>
                    </div>

                <!-- BOTÃO GERAR CONTRATO -->

                        <div class="col-md-12 d-flex justify-content-center">
                            
                            <a type="button" class="Documents-btn" onclick="confirmarEnvio()" style="text-decoration: none;">
                                        <span class="folderContainer">
                                            <svg
                                            class="fileBack"
                                            width="146"
                                            height="113"
                                            viewBox="0 0 146 113"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <path
                                                d="M0 4C0 1.79086 1.79086 0 4 0H50.3802C51.8285 0 53.2056 0.627965 54.1553 1.72142L64.3303 13.4371C65.2799 14.5306 66.657 15.1585 68.1053 15.1585H141.509C143.718 15.1585 145.509 16.9494 145.509 19.1585V109C145.509 111.209 143.718 113 141.509 113H3.99999C1.79085 113 0 111.209 0 109V4Z"
                                                fill="url(#paint0_linear_117_4)"
                                            ></path>
                                            <defs>
                                                <linearGradient
                                                id="paint0_linear_117_4"
                                                x1="0"
                                                y1="0"
                                                x2="72.93"
                                                y2="95.4804"
                                                gradientUnits="userSpaceOnUse"
                                                >
                                                <stop stop-color="#8F88C2"></stop>
                                                <stop offset="1" stop-color="#5C52A2"></stop>
                                                </linearGradient>
                                            </defs>
                                            </svg>
                                            <svg
                                            class="filePage"
                                            width="88"
                                            height="99"
                                            viewBox="0 0 88 99"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <rect width="88" height="99" fill="url(#paint0_linear_117_6)"></rect>
                                            <defs>
                                                <linearGradient
                                                id="paint0_linear_117_6"
                                                x1="0"
                                                y1="0"
                                                x2="81"
                                                y2="160.5"
                                                gradientUnits="userSpaceOnUse"
                                                >
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="#686868"></stop>
                                                </linearGradient>
                                            </defs>
                                            </svg>

                                            <svg
                                            class="fileFront"
                                            width="160"
                                            height="79"
                                            viewBox="0 0 160 79"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <path
                                                d="M0.29306 12.2478C0.133905 9.38186 2.41499 6.97059 5.28537 6.97059H30.419H58.1902C59.5751 6.97059 60.9288 6.55982 62.0802 5.79025L68.977 1.18034C70.1283 0.410771 71.482 0 72.8669 0H77H155.462C157.87 0 159.733 2.1129 159.43 4.50232L150.443 75.5023C150.19 77.5013 148.489 79 146.474 79H7.78403C5.66106 79 3.9079 77.3415 3.79019 75.2218L0.29306 12.2478Z"
                                                fill="url(#paint0_linear_117_5)"
                                            ></path>
                                            <defs>
                                                <linearGradient
                                                id="paint0_linear_117_5"
                                                x1="38.7619"
                                                y1="8.71323"
                                                x2="66.9106"
                                                y2="82.8317"
                                                gradientUnits="userSpaceOnUse"
                                                >
                                                <stop stop-color="#C3BBFF"></stop>
                                                <stop offset="1" stop-color="#51469A"></stop>
                                                </linearGradient>
                                            </defs>
                                            </svg>
                                        </span>
                                        <p class="text">Contrato</p>
                                </a>
                            </div>

                </div>
                
            </div>
        </form>
    </div>
    </div>
                
    


</section>
<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
function confirmarEnvio() {
    var confirmacao1 = confirm("Você está prestes a Enviar um Contrato SEM gerar Proposta, antes disso ATUALIZE as informações que forem alteradas, e depois disso clique em 'OK'.");
    if (confirmacao1) {
        var confirmacao2 = confirm("Você está prestes a Enviar um Contrato SEM gerar Proposta, caso tenha certeza da sua ação clique em 'OK'.");
        if (confirmacao2) {
            // Redirecionar para a URL após a confirmação do usuário
            window.location.href = "<?= base_url('PropostaController/contratoSemProposta/' . $data['empresa']['id']) ?>";
        }
    }
}
</script>

<script>
    document.getElementById("generateProposalBtn").onclick = function() {
        const confirmation = confirm("Você clicou em gerar proposta, antes de continuar com a proposta, atualize os dados que foram modificados, caso já tenha atualizado clique em OK para continuar, caso não tenha atualizado, clique em CANCELAR e atualize.");

        // Verifica se o usuário confirmou
        if (confirmation) {
            const clienteId = "<?= $data['cliente']['id'] ?>";
            fetch(`<?= base_url('PropostaController/gerarProposta/') ?>${clienteId}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                // Mostrar mensagem e link no modal
                if (data.status === 'success') {
                    document.getElementById("proposalMessage").innerText = data.message;
                    document.getElementById("proposalLink").href = data.link;
                } else {
                    document.getElementById("proposalMessage").innerText = data.message;
                    document.getElementById("proposalLink").style.display = 'none';
                }

                // Criar uma instância do modal e exibi-lo
                var modal = new bootstrap.Modal(document.getElementById("proposalModal"));
                modal.show();
            });
        }
    };
</script>


<script>
function aplicarMascaraCPF(input) {
    var valor = input.value;

    valor = valor.replace(/\D/g, ""); // Remove tudo o que não é dígito
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após o terceiro dígito
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após os seis primeiros dígitos
    valor = valor.replace(/(\d{3})(\d)/, "$1-$2"); // Coloca um hífen após os nove primeiros dígitos

    input.value = valor; // Atualiza o valor do input
}
</script>

  <script>
function aplicarMascaraCNPJ(input) {
    var valor = input.value;

    valor = valor.replace(/\D/g, ""); // Remove tudo o que não é dígito
    valor = valor.replace(/^(\d{2})(\d)/, "$1.$2"); // Coloca ponto entre o segundo e o terceiro dígitos
    valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3"); // Coloca ponto entre o quinto e o sexto dígitos
    valor = valor.replace(/\.(\d{3})(\d)/, ".$1/$2"); // Coloca uma barra entre o oitavo e o nono dígitos
    valor = valor.replace(/(\d{4})(\d)/, "$1-$2"); // Coloca um hífen depois do bloco de quatro dígitos

    input.value = valor; // Atualiza o valor do input
}
</script>

<script>
function formatarMoeda() {
    var elemento = document.getElementById('faturamento');
    var valor = elemento.value.replace(/\D/g, ''); // Remove tudo o que não é dígito
    valor = parseInt(valor, 10) / 100; // Divide por 100 para mover os dois últimos dígitos para depois da vírgula
    
    // Verifica se o valor é NaN, se for, retorna vazio
    if (isNaN(valor)) {
        elemento.value = '';
        return;
    }

    // Converte para string e usa expressão regular para formatar
    valor = valor.toFixed(2); // Garante duas casas decimais
    valor = valor.replace('.', ','); // Troca ponto por vírgula
    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'); // Adiciona ponto como separador de milhares

    elemento.value = 'R$ ' + valor;
}
</script>

<script>
function mascaraTelefone(event) {
    var valor = event.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
    var tamanho = valor.length;

    // Adiciona parênteses ao DDD
    if (tamanho > 2) {
        valor = '(' + valor.substring(0,2) + ') ' + valor.substring(2);
    }

    // Decide a posição do hífen baseado na quantidade de dígitos
    // Telefones fixos possuem o formato (XX) XXXX-XXXX
    // Telefones celulares possuem o formato (XX) XXXXX-XXXX
    if (tamanho > 6) {
        if (tamanho >= 11) {  // Para celulares com 11 dígitos
            valor = valor.replace(/(\d{4})$/, '-$1'); // Coloca o hífen antes dos últimos quatro dígitos
        } else {  // Para telefones fixos com menos de 11 dígitos
            valor = valor.replace(/(\d{4})$/, '-$1'); // Coloca o hífen antes dos últimos quatro dígitos
        }
    }

    // Limita o tamanho do valor para se adequar ao formato de celular com DDD
    if (tamanho > 11) {
        valor = valor.substring(0, valor.length - (tamanho - 11));
    }

    event.target.value = valor; // Atualiza o valor do input
}
</script>

</body>
</html>