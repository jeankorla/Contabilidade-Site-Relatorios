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

#input{
    background-color: #eee;
}
</style>
</head>

<body>

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
        <h1 class="mb-5">Editar Cliente</h1>

        <div class="alert alert-danger" style="display: none;"> 
            <ul>
                <li>Erro exemplo</li>
            </ul>
        </div>
        
        <form class="row g-3" action="<?= base_url('ClienteController/atualizarCliente/' . $data['cliente']['id']) ?>" method="post" >

        <input type="hidden" name="empresa_id" value="<?= $data['empresa']['id'] ?>">

            <div class="col-md-6">
                <label for="nome_contato" class="form-label">Nome de Contato:</label>
                <input id="input" type="text" class="form-control" id="nome_contato" name="nome_contato" value="<?= $data['cliente']['nome'] ?>">
            </div>

            <div class="col-md-6">
                <label for="email_contato" class="form-label">Email de Contato:</label>
                <input id="input" type="email" class="form-control" id="email_contato" name="email_contato" value="<?= $data['cliente']['email'] ?>">
            </div>
            <div class="col-md-4">
                <label for="tel_contato" class="form-label">Telefone do Contato:</label>
                <input id="input" type="text" class="form-control" id="tel_contato" name="tel_contato" value="<?= $data['cliente']['tel'] ?>" oninput= "mascaraTelefone(event);" maxlength="15">
            </div>
            <div class="col-md-4">
                <label for="cpf_contato" class="form-label">CPF do Contato:</label>
                <input id="input" type="text" id="cpf_contato" class="form-control" name="cpf_contato" oninput= "aplicarMascaraCPF(this)" value="<?= $data['cliente']['cpf'] ?>" maxlength="14">
            </div>


            <br>
                <div class="col-md-12">
                <h2 class="mb-5">Empresa Informações</h2>
                </div>


            <div class="col-4">
                <label for="cnpj" class="form-label">CNPJ:</label>
               <input id="input" type="text" id="cnpj" class="form-control" name="cnpj" value="<?= $data['empresa']['cnpj'] ?>" oninput= "aplicarMascaraCNPJ(this)" maxlength="18">
            </div>
            <div class="col-4">
                <label for="nome_empresa" class="form-label">Nome da Empresa:</label>
                <input id="input" type="text" id="nome_empresa" class="form-control" name="nome_empresa" value="<?= $data['empresa']['nome'] ?>">
            </div>
            <div class="col-4">
                <label for="fantasia" class="form-label">Nome Fantasia:</label>
                <input id="input" type="text" id="fantasia" class="form-control" name="fantasia" value="<?= $data['empresa']['fantasia'] ?>">
            </div>



            <div class="col-3">
                <label for="tel_empresa" class="form-label">Telefone da Empresa:</label>
                <input id="input" type="text" id="tel_empresa" class="form-control" name="tel_empresa" value="<?= $data['empresa']['tel'] ?>" onkeyup="formatarMoeda();" maxlength="18">
            </div>
            <div class="col-3">
                <label for="faturamento" class="form-label">Faturamento:</label>
                <input id="input" type="text" id="faturamento" class="form-control" name="faturamento" value="<?= $data['empresa']['faturamento'] ?>" onkeyup="formatarMoeda();" maxlength="18">
            </div>
            <div class="col-3">
                <label for="funcionarios" class="form-label">Funcionários:</label>
                <input id="input" type="number" id="funcionarios" class="form-control" name="funcionarios" value="<?= $data['empresa']['funcionarios'] ?>">
            </div>
            <div class="col-3">
                <label for="tributacao" class="form-label">Tributação:</label>
                <input id="input" type="text" id="tributacao" class="form-control" name="tributacao" value="<?= $data['empresa']['tributacao'] ?>">
            </div>



            <div class="col-3">
                <label for="nfe" class="form-label">Quantidade de Notas-Fiscais:</label>
                <input id="input" type="number" id="nfe" class="form-control" name="nfe" value="<?= $data['empresa']['nfe'] ?>">
            </div>
            <div class="col-md-3">
                <label for="atividade_principal_codigo" class="form-label">Côdigo Atividade:</label>
                <input id="input" type="text" id="atividade_principal_codigo" class="form-control" name="atividade_principal_codigo" value="<?= $data['empresa']['atividade_principal_codigo'] ?>">
            </div>
            <div class="col-md-6">
                <label for="atividade_principal_texto" class="form-label">Atividade Principal:</label>
                <input id="input" type="text" id="atividade_principal_texto" class="form-control" name="atividade_principal_texto" value="<?= $data['empresa']['atividade_principal_texto'] ?>">
            </div>



            <div class="col-md-3">
                <label for="lancamento" class="form-label">Lançamentos:</label>
                <input id="input" type="number" id="lancamento" class="form-control" name="lancamento" value="<?= $data['empresa']['lancamento'] ?>">
            </div>
            <div class="col-md-5">
                <label for="natureza_juridica" class="form-label">Natureza Jurdica:</label>
                <input id="input" type="text" id="natureza_juridica" class="form-control" name="natureza_juridica" value="<?= $data['empresa']['natureza_juridica'] ?>">
            </div>
            <div class="col-md-2">
                <label for="capital_social" class="form-label">Capital Social:</label>
                <input id="input" type="text" id="capital_social" class="form-control" name="capital_social" value="<?= $data['empresa']['capital_social'] ?>">
            </div>
            <div class="col-md-2">
                <label for="abertura" class="form-label">Abertura:</label>
                <input id="input" type="text" id="abertura" class="form-control" name="abertura" value="<?= $data['empresa']['abertura'] ?>">
            </div>

            <div class="col-md-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <input id="input" type="text" id="tipo" class="form-control" name="tipo" value="<?= $data['empresa']['tipo'] ?>">
            </div>
            <div class="col-md-4">
                <label for="porte" class="form-label">Porte:</label>
                <input id="input" type="text" id="porte" class="form-control" name="porte" value="<?= $data['empresa']['porte'] ?>">
            </div>



                <br>
                <div class="col-md-12">
                    <h2 class="mb-5">Atividades Secundárias</h2>
                </div>

                <?php foreach ($data['atividades'] as $index => $atividade): ?>
                    <div class="col-md-3">
                        <label for="atividade_secundaria_<?= $index ?>_codigo" class="form-label">Código Atividade:</label>
                        <input id="input" type="text" id="atividade_secundaria_<?= $index ?>_codigo" class="form-control" name="atividades[<?= $index ?>][codigo]" value="<?= $atividade['codigo'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="atividade_secundaria_<?= $index ?>_texto" class="form-label">Atividade Secundária:</label>
                        <input id="input" type="text" id="atividade_secundaria_<?= $index ?>_texto" class="form-control" name="atividades[<?= $index ?>][texto]" value="<?= $atividade['texto'] ?>">
                    </div>
                    <hr>
                <?php endforeach; ?>



    
              
                <br>
                <div class="col-md-12">
                <h2 class="mb-5">Empresa Endereço</h2>
                </div>



            <div class="col-2">
                <label for="endereco_empresa_cep" class="form-label">Empresa Cep:</label>
                <input id="input" type="text" id="endereco_empresa_cep" class="form-control" name="endereco_empresa_cep" value="<?= $data['empresa']['endereco_cep'] ?>">
            </div>
            <div class="col-md-4">
                <label for="endereco_empresa_rua" class="form-label">Empresa Rua:</label>
                <input id="input" type="text" id="endereco_empresa_rua" class="form-control" name="endereco_empresa_rua" value="<?= $data['empresa']['endereco_rua'] ?>">
            </div>
            <div class="col-md-2">
                <label for="endereco_empresa_numero" class="form-label">Empresa Numero:</label>
                <input id="input" type="text" id="endereco_empresa_numero" class="form-control" name="endereco_empresa_numero" value="<?= $data['empresa']['endereco_numero'] ?>">
            </div>
            <div class="col-md-4">
                <label for="endereco_empresa_complemento" class="form-label">Complemento:</label>
                <input id="input" type="text" id="endereco_empresa_complemento" class="form-control" name="endereco_empresa_complemento" value="<?= $data['empresa']['endereco_complemento'] ?>">
            </div>

            <div class="col-md-5">
                <label for="endereco_empresa_bairro" class="form-label">Empresa Bairro:</label>
                <input id="input" type="text" id="endereco_empresa_bairro" class="form-control" name="endereco_empresa_bairro" value="<?= $data['empresa']['endereco_bairro'] ?>">
            </div>
            <div class="col-md-5">
                <label for="endereco_empresa_cidade" class="form-label">Empresa Cidade:</label>
                <input id="input" type="text" id="endereco_empresa_cidade" class="form-control" name="endereco_empresa_cidade" value="<?= $data['empresa']['endereco_cidade'] ?>">
            </div>
                <div class="col-md-2">
                <label for="endereco_empresa_estado" class="form-label">Empresa Estado:</label>
                <input id="input" type="text" id="endereco_empresa_estado" class="form-control" name="endereco_empresa_estado" value="<?= $data['empresa']['endereco_estado'] ?>">
            </div>
            
                <br>
            <div class="col-md-12">
                <h2 class="mb-5">Sócios da Empresa</h2>
            </div>

            <?php foreach ($data['socios'] as $index => $socio): ?>
                <div class="col-md-7">
                    <label for="socio_<?= $index ?>_nome" class="form-label">Nome do Sócio:</label>
                    <input id="input" type="text" id="socio_<?= $index ?>_nome" class="form-control" name="socios[<?= $index ?>][nome]" value="<?= $socio['nome'] ?>">
                </div>
                <div class="col-3">
                    <label for="socio_<?= $index ?>_qualifica" class="form-label">Qualificação:</label>
                    <input id="input" type="text" id="socio_<?= $index ?>_qualifica" class="form-control" name="socios[<?= $index ?>][qualifica]" value="<?= $socio['qualifica'] ?>">
                </div>
                <hr>
            <?php endforeach; ?>


            <div class="col-md-12">
                <h2 class="mb-5">Representante da Contratante</h2>
            </div>

            <div class="col-md-7">
                <label for="socio_asses_nome" class="form-label">Nome do Sócio:</label>
                <input id="input" type="text" id="socio_asses_nome" class="form-control" name="socio_asses_nome" value="<?= $data['socio_asses']['nome'] ?? 'N/A' ?>">
            </div>
            <div class="col-3">
                <label for="socio_asses_nacional" class="form-label">Nacionalidade do Sócio:</label>
                <input id="input" type="text" id="socio_asses_nacional" class="form-control" name="socio_asses_nacional" value="<?= $data['socio_asses']['nacionalidade'] ?? 'N/A' ?>">
            </div>
            <div class="col-2">
                <label for="socio_asses_idade" class="form-label">Idade do Sócio:</label>
                <input id="input" type="text" id="socio_asses_idade" class="form-control" name="socio_asses_idade" value="<?= $data['socio_asses']['idade'] ?? 'N/A' ?>">
            </div>
            <div class="col-6">
                <label for="socio_asses_rg" class="form-label">RG do Sócio:</label>
                <input id="input" type="text" id="socio_asses_rg" class="form-control" name="socio_asses_rg" value="<?= $data['socio_asses']['rg'] ?? 'N/A' ?>">
            </div>
            <div class="col-6">
                <label for="socio_asses_cpf" class="form-label">CPF do Sócio:</label>
                <input id="input" type="text" id="socio_asses_cpf" class="form-control" name="socio_asses_cpf" value="<?= $data['socio_asses']['cpf']  ?? 'N/A' ?>">
            </div>

            

            <div class="col-3">
                <label for="socio_asses_endereco_cep" class="form-label">CEP do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_cep" class="form-control" name="socio_asses_endereco_cep" value="<?= $data['socio_asses']['endereco_cep'] ?? 'N/A' ?>">
            </div>
            <div class="col-md-6">
                <label for="socio_asses_endereco_cidade" class="form-label">Cidade do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_cidade" class="form-control" name="socio_asses_endereco_cidade" value="<?= $data['socio_asses']['endereco_cidade'] ?? 'N/A' ?>">
            </div>
            <div class="col-md-5">
                <label for="socio_asses_endereco_bairro" class="form-label">Bairro do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_bairro" class="form-control" name="socio_asses_endereco_bairro" value="<?= $data['socio_asses']['endereco_bairro'] ?? 'N/A' ?>">
            </div>
            <div class="col-5">
                <label for="socio_asses_endereco_rua" class="form-label">Rua do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_rua" class="form-control" name="socio_asses_endereco_rua" value="<?= $data['socio_asses']['endereco_rua'] ?? 'N/A' ?>">
            </div>
            <div class="col-5">
                <label for="socio_asses_endereco_complemento" class="form-label">Complemento do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_complemento" class="form-control" name="socio_asses_endereco_complemento" value="<?= $data['socio_asses']['endereco_complemento'] ?? 'N/A' ?>">
            </div>
            <div class="col-md-2">
                <label for="socio_asses_endereco_numero" class="form-label">Número do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_numero" class="form-control" name="socio_asses_endereco_numero" value="<?= $data['socio_asses']['endereco_numero'] ?? 'N/A' ?>">
            </div>
            <div class="col-3">
                <label for="socio_asses_endereco_estado" class="form-label">Estado do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_estado" class="form-control" name="socio_asses_endereco_estado" value="<?= $data['socio_asses']['endereco_estado'] ?? 'N/A' ?>">
            </div>

            <br>
            <div class="col-md-12">
                <h2 class="mb-5">Contabilidade</h2>
            </div>
            

            <div class="col-4">
                <label for="inicio_contabilidade" class="form-label">Início na Contabilidade:</label>
                <input id="input" type="text" id="inicio_contabilidade" class="form-control" name="inicio_contabilidade" value="<?= $data['contabilidade']['inicio_contabilidade'] ?? 'N/A' ?>">
            </div>
            <div class="col-4">
                <label for="competencia" class="form-label">Competência:</label>
                <input id="input" type="text" id="competencia" class="form-control" name="competencia" value="<?= $data['contabilidade']['competencia'] ?? 'N/A' ?>">
            </div>

            <div class="col-4">
                <label for="honorario" class="form-label">Honorário:</label>
                <input id="input" type="text" id="honorario" class="form-control" name="honorario" value="<?= $data['contabilidade']['honorario'] ?? 'N/A' ?>">
            </div>
           <div class="col-12">
                <label for="honorario_texto" class="form-label">Honorário Texto:</label>
                <textarea id="honorario_texto" class="form-control" name="honorario_texto" rows="4"><?= $data['contabilidade']['honorario_texto'] ?? 'como pacote o valor de R$ 4.200,00 (Quatro mil e duzentos reais), para até 20 (vinte) funcionários em folha, sendo acrescido do valor de R$ 88,00 (Oitenta e oito reais) por funcionário excedente aos 20 já inclusos nos honorários mensais, conforme apontado pelo Depto. Pessoal, para cobrança no mês subsequente ao fechamento.
                Os honorários mensais terão seu vencimento todo dia 05 (cinco) de cada mês.'?></textarea>
            </div>

            
           

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


                </div>
                <div class="col-md-12 d-flex justify-content-center">
                            <button class="Documents-btn">
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
                                </button>
                            </div>
            </div>
        </form>
    </div>
    </div>
                
    


</section>

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