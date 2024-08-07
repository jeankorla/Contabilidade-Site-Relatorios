<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<style>

    html, body {
      font-size: 90%;
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
                <li class="nav-item">
                    <a class="nav-link" href="https://sccontab.com.br/ClienteController" style="color: white; font-size: 20px;">Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://sccontab.com.br/UploadController" style="color: white; font-size: 20px;">Gerar Link</a>
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
      <div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="configModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configModalLabel">Configurações</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <!-- Formulário para atualizar o nome de usuário -->
        <form action="<?= base_url('LoginController/updateUsername') ?>" method="post" >
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


    <div id="div1" class="mt-3" style="display:block;">
      <div class="container d-flex justify-content-center align-items-center ">
        <div class="card" style="border-radius: 2vh; width: 100%;">
          <div class="card-body m-lg-5 text-center">
            <div class="table-responsive">


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

      

      <div class="mb-3">
        <h1>Lead</h1>
      </div>

      <div class="container mt-4 mb-4">
    <div class="d-flex justify-content-between">
        <div>
            <label for="filterMotivo" class="form-label">Filtrar por Motivo:</label>
            <select id="filterMotivo" class="form-select" onchange="applyFilters()">
                <option value="all">Todos</option>
                <option value="Abertura">Abertura</option>
                <option value="Trocar">Trocar</option>
            </select>
        </div>
        <div>
            <label for="filterSituacao" class="form-label">Filtrar por Situação:</label>
            <select id="filterSituacao" class="form-select" onchange="applyFilters()">
                <option value="all">Todos</option>
                <option value="Lead">Lead</option>
                <option value="Arquivado">Arquivado</option>
                <option value="Proposta">Proposta</option>
                <option value="Contrato">Contrato</option>
                <option value="Cliente">Cliente</option>
            </select>
        </div>
    </div>
</div>

        <table class="table table-striped ">
          <thead>
            <tr>
              <th style="text-align: center;">Ações</th>
              <th>Motivo</th>
              <th>Empresa</th>
              <th>Faturamento</th> 
              <th>Tributação</th> 
              <th>Estado</th> 
              <th>Cidade</th>
              <th>Data</th>   
              <th>Situação</th>       
            </tr>
          </thead>
          <tbody>
         <?php foreach ($data as $item) : ?>
    <tr>
        <td>
            <div style="display: flex; gap: 10px">
                <a href="<?php echo base_url('ClienteController/arquivarCliente/' . ($item['empresa']['id'] ?? '')) ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                <a href="<?php echo base_url('ClienteController/editarCliente/' . ($item['cliente']['id'] ?? '')) ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            </div>
        </td>
         
                <td><?= $item['cliente']['motivo'] ?? 'N/A' ?></td>
                <td><?= $item['empresa']['nome'] ?? 'N/A' ?></td>
                <td id="faturamento"><?= $item['empresa']['faturamento'] ?? 'N/A' ?></td>
                <td><?= $item['empresa']['tributacao'] ?? 'N/A' ?></td>
                <td><?= $item['empresa']['endereco_estado'] ?? 'N/A' ?></td>
                <td><?= $item['empresa']['endereco_cidade'] ?? 'N/A' ?></td>
                <td><?= date('d/m/Y', strtotime($item['cliente']['created_at'] ?? 'N/A'));  ?></td>
                <td><?= $item['empresa']['situacao'] ?? 'N/A' ?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>

          </table>

        </div> <!-- Fim da div .table-responsive -->

      </div>

    </div>

  </div>
</div>

</section>


<script>
  function applyFilters() {
    var motivoFilter = document.getElementById('filterMotivo').value;
    var situacaoFilter = document.getElementById('filterSituacao').value;
    var rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        var motivoCell = row.cells[1].textContent; // Ajuste o índice conforme necessário
        var situacaoCell = row.cells[8].textContent; // Ajuste o índice conforme necessário
        var displayRow = true;

        // Altera a lógica para a situação 'all' para excluir 'Arquivado' e 'Cliente'
        if (situacaoFilter === 'all' && (situacaoCell.trim() === 'Arquivado' || situacaoCell.trim() === 'Cliente')) {
            displayRow = false;
        } else if (situacaoFilter !== 'all' && situacaoFilter !== situacaoCell.trim()) {
            displayRow = false;
        }

        if (motivoFilter !== 'all' && motivoCell.trim() !== motivoFilter) {
            displayRow = false;
        }

        row.style.display = displayRow ? '' : 'none';
    });
}

document.addEventListener('DOMContentLoaded', function() {
    applyFilters(); // Aplica os filtros iniciais ao carregar a página
});


</script>


<script>
function formatarMoeda() {
    var elemento = document.getElementById('faturamento');
    var valor = elemento.textContent.replace(/\D/g, '');
    valor = parseInt(valor, 10) / 100;

    if (isNaN(valor)) {
        elemento.textContent = '';
        return;
    }

    valor = valor.toFixed(2);
    valor = valor.replace('.', ',');
    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

    elemento.textContent = 'R$ ' + valor;
}

document.addEventListener('DOMContentLoaded', function() {
    formatarMoeda();
});
</script>
</body>
</html>


