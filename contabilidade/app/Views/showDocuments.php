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

label {
    font-weight: bold;
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
  color: black;
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
    color: blue;
    background-color: white;
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

        <div class="container mt-3">
                
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5><strong>Empresa:</strong> <?= $data['empresa']['nome'] ?? 'N/A' ?></h5>
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
        
        <form class="row g-3" action="<?= base_url('ClienteController/atualizarCliente/' . $data['cliente']['id']) ?>" method="post" >

        <input type="hidden" name="empresa_id" value="<?= $data['empresa']['id'] ?>">

            <div class="container mt-3">
            <h2>Gestão de Documentos</h2>
            <div class="list-group">
                <?php if (!empty($data['documents']) && is_array($data['documents'])): ?>
                    <?php foreach ($data['documents'] as $key => $docPath): ?>
                        <?php if (file_exists($docPath)): ?>
                            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><?= ucwords(str_replace('_', ' ', $key)) ?>:</strong>
                                    <a href="<?= base_url($docPath) ?>" class="btn btn-primary btn-sm">Baixar</a>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteDocument('<?= $key ?>', '<?= $data['empresa']['id'] ?>')">Excluir</button>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum documento disponível para mostrar.</p>
                <?php endif; ?>
            </div>
        </div>


           

            <div class="d-flex justify-content-between">
                <div class="col-6">
                    <a class="btn btn-danger" href="<?= base_url('AdminController/index') ?>">Cancelar</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-clockwise" style="margin-right: 5px;"></i>Atualizar</button>


                    <a href="<?= base_url('DocumentsController/formView/' . $data['cliente']['id']) ?>">Abrir Forms</a>
                </div>
            </div>

            
        </form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


        <!-- COLLAPSE START -->

        <div class="container">
    <div class="accordion" id="accordionCliente">
<!-- Collapse for Mãe -->
        <div class="item">
            <div class="item-header" id="headingCliente">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseCliente" aria-expanded="false" aria-controls="collapseCliente">
                        Informações Completas do Cliente
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseCliente" class="collapse" aria-labelledby="headingCliente" data-parent="#accordionCliente">
                <div class="t-p">
                

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
            <div class="item-header" id="headingSocios">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSocios" aria-expanded="false" aria-controls="collapseSocios">
                        Sócios da Empresa
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseSocios" class="collapse" aria-labelledby="headingSocios" data-parent="#accordionInfo">
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
            <div class="item-header" id="headingSocio">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSocio" aria-expanded="false" aria-controls="collapseSocio">
                        Representante da Contratante
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseSocio" class="collapse" aria-labelledby="headingSocio" data-parent="#accordionInfo">
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
            <div class="item-header" id="headingContabilidade">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseContabilidade" aria-expanded="false" aria-controls="collapseContabilidade">
                        Contabilidade
                        <i class="fa fa-angle-down"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseContabilidade" class="collapse" aria-labelledby="headingContabilidade" data-parent="#accordionInfo">
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
        </div>
    </div>
</div>
<!-- COLLAPSE FIM -->



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
function deleteDocument(docKey, empresaId) {
    if (confirm('Tem certeza que deseja excluir este documento?')) {
        // Enviar requisição para o servidor para excluir o documento
        fetch(`<?= base_url('DocumentsController/deleteDocument') ?>`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ docKey: docKey, empresaId: empresaId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Documento excluído com sucesso.');
                location.reload(); // Recarrega a página para atualizar a lista
            } else {
                alert('Falha ao excluir o documento.');
            }
        });
    }
}
</script>


</body>
</html>