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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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

   

<div class="container d-flex justify-content-center align-items-center ">


</div>
<div id="div1" class="mt-3" style="display:block;">
<div class="container d-flex justify-content-center align-items-center ">
  <div class="card" style="border-radius: 2vh; width: 100%;">
    <div class="card-body m-lg-5 text-center">
      
      <div class="table-responsive"> <!-- Adicione esta div -->
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

              <!-- Submit button -->



      <div class="mb-3">
        <h1>Contatos</h1>
        <label for="pesquisa" class="form-label">Pesquisar:</label>
        <input type="text" id="pesquisa" class="form-control" placeholder="Digite sua pesquisa...">
      </div>

        <table class="table table-striped ">
          <thead>
            <tr>
              <th>ID</th>
              <th style="text-align: center;">Ações</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Mensagem</th>
              <th>Enviado em</th>         
            </tr>
          </thead>
          <tbody>
         <?php foreach ($contato as $c) : ?>
<tr>
    <td><?php echo $c['id']; ?></td>
    <td>
        <div style="display: flex; justify-content: center; gap: 10px">
            <!-- Botão Responder com ativador de modal -->
            <button class="btn btn-primary" onclick="openResponseModal('<?php echo $c['email']; ?>', '<?php echo addslashes($c['name']); ?>')">Responder</button>
            <a href="<?php echo base_url('ContatoController/excluirContato/' . $c['id']); ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o contato de <?php echo addslashes($c['name']); ?>?');">
                Excluir
            </a>
        </div>
    </td>
    <td><?php echo $c['name']; ?></td>
    <td><?php echo $c['email']; ?></td>
    <td><?php echo $c['textarea']; ?></td>
    <td><?php echo $c['created_at']; ?></td>
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

<!-- Modal de Resposta -->
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="responseModalLabel">Responder a Mensagem</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="responseForm">
            <div class="mb-3">
                <label for="recipientEmail" class="col-form-label">Para:</label>
                <input type="email" class="form-control" id="recipientEmail" name="recipientEmail" readonly>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Mensagem:</label>
                <textarea class="form-control" id="message-text" name="messageText"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="sendResponse()">Enviar Resposta</button>
      </div>
    </div>
  </div>
</div>



<script>
function openResponseModal(email, name) {
    document.getElementById('recipientEmail').value = email;
    document.getElementById('message-text').value = ''; // Limpa a mensagem anterior
    $('#responseModal').modal('show');
}

function sendResponse() {
    var email = document.getElementById('recipientEmail').value;
    var message = document.getElementById('message-text').value;
    $.post('<?= base_url("ContatoController/sendResponse") ?>', { email: email, message: message }, function(response) {
        $('#responseModal').modal('hide');
        if (response.status === 'success') {
            window.location.reload(true); // Força a recarga da página para mostrar a mensagem de sucesso
        } else {
            alert(response.message); // Mostra uma mensagem de erro
        }
    });
}


</script>
</body>
</html>
