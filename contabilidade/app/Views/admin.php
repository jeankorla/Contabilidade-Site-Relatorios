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
<body style="background-color: #eee;">

    <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #024A7F; z-index: 1;">
  <div class="container-fluid navbar-container">
    <a class="navbar-brand" href="<?= base_url('admincontroller') ?>">
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
        <form action="<?= base_url('logincontroller/updateUsername') ?>" method="post">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Novo nome de usuário:</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Nome de Usuário</button>
        </form>

        <!-- Formulário para atualizar a senha -->
        <form action="<?= base_url('logincontroller/updatePassword') ?>" method="post" class="mt-3">
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
    </div>
  </div>
</nav>


<section >


 <div class="jp1"></div>
    <div class="jp1 jp2"></div>
    <div class="jp1 jp3"></div>

   

<div class="container d-flex justify-content-center align-items-center ">



    <!-- Botões -->
<button class="btn btn-primary" id="btnShowDiv1" style="z-index: 2;">Mostrar Div 1</button>
<button id="btnShowDiv2"  style="z-index: 2;">Mostrar Div 2</button>





</div>
<div id="div1" style="display:block;">
<div class="container d-flex justify-content-center align-items-center ">
  <div class="card" style="border-radius: 2vh; width: 100%;">
    <div class="card-body m-lg-5 text-center">
      
      <div class="table-responsive"> <!-- Adicione esta div -->

      <div class="mb-3">
        <h1>Troca de Contabilidade</h1>
        <label for="pesquisa" class="form-label">Pesquisar:</label>
        <input type="text" id="pesquisa" class="form-control" placeholder="Digite sua pesquisa...">
      </div>

        <table class="table table-striped ">
          <thead>
            <tr>
              <th>ID</th>
              <th style="text-align: center;">Ações</th>
              <th>Nome</th>
              <th>Data</th>
              <th>INDICE_POUPANCA</th>
              <th>INDICE_LIQUIDEZ_CORRENTE</th>
              <th>INDICE_ENDIVIDAMENTO</th>
              <th>INDICE_COBERTURA</th>
              <th>PATRIMONIO_LIQUIDO</th>              
            </tr>
          </thead>
          <tbody>
         
              <tr>
                <td></td>
                <td>
                  <div style="display: flex; gap: 10px">
                    <a href="<?php echo base_url('/autenticacao/gerar/') ?>" class="btn btn-primary">Relatório</a>
                    <a href="<?= base_url('autenticacao/edit/') ?>" class="btn btn-warning">Editar</a>
                    <a href="<?= base_url("autenticacao/excluir/") ?>" class="btn btn-danger">Excluir</a>
                  </div>
                </td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            

            </tbody>

          </table>

        </div> <!-- Fim da div .table-responsive -->

      </div>

    </div>

  </div>
</div>





<div id="div2" style="display:none;">
<div class="container d-flex justify-content-center align-items-center ">
  <div class="card" style="border-radius: 2vh; width: 100%;">
    <div class="card-body m-lg-5 text-center">
      
      <div class="table-responsive"> <!-- Adicione esta div -->

      <div class="mb-3">
        <h1>Abertura de Empresa</h1>
        <label for="pesquisa" class="form-label">Pesquisarrrrrrrrrrrrr:</label>
        <input type="text" id="pesquisa" class="form-control" placeholder="Digite sua pesquisa...">
      </div>

        <table class="table table-striped ">
          <thead>
            <tr>
              <th>ID</th>
              <th style="text-align: center;">Ações</th>
              <th>Nome</th>
              <th>Data</th>
              <th>INDICE_POUPANCA</th>
              <th>INDICE_LIQUIDEZ_CORRENTE</th>
              <th>INDICE_ENDIVIDAMENTO</th>
              <th>INDICE_COBERTURA</th>
              <th>PATRIMONIO_LIQUIDO</th>              
            </tr>
          </thead>
          <tbody>
         
              <tr>
                <td></td>
                <td>
                  <div style="display: flex; gap: 10px">
                    <a href="<?php echo base_url('/autenticacao/gerar/') ?>" class="btn btn-primary">Relatório</a>
                    <a href="<?= base_url('autenticacao/edit/') ?>" class="btn btn-warning">Editar</a>
                    <a href="<?= base_url("autenticacao/excluir/") ?>" class="btn btn-danger">Excluir</a>
                  </div>
                </td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            

            </tbody>

          </table>

        </div> <!-- Fim da div .table-responsive -->

      </div>

    </div>

  </div>
</div>

</section>




</body>
</html>
<script>
  document.getElementById('btnShowDiv1').addEventListener('click', function() {
    document.getElementById('div1').style.display = 'block';
    document.getElementById('div2').style.display = 'none';
});

document.getElementById('btnShowDiv2').addEventListener('click', function() {
    document.getElementById('div2').style.display = 'block';
    document.getElementById('div1').style.display = 'none';
});


</script>