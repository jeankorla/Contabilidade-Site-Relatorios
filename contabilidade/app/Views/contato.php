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
    button {
  font-family: inherit;
  font-size: 10px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
  cursor: pointer;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

button svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(5em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
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


      <div class="mb-3">
        <h1>Contatos</h1>
      </div>
<div class="container mt-4 mb-4">
    <div class="d-flex justify-content-end">
        <div>
            <label for="filterResponse" class="form-label">Filtrar Respostas:</label>
            <select id="filterResponse" class="form-select" onchange="applyFilter()">
                <option value="all">Nenhum filtro</option>
                <option value="not_responded" selected>Não Respondidas</option>
                <option value="responded">Respondidas</option>
            </select>
        </div>
    </div>
</div>

        <table class="table table-striped ">
          <thead>
            <tr>
              <th style="text-align: center;">Ações</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Mensagem</th>
              <th>Enviado em</th>
              <th>Respondido</th>
            </tr>
          </thead>
          <tbody>
         <?php foreach ($contato as $c) : ?>
<tr>
    <td>
        <div style="display: flex; justify-content: center; gap: 10px">
            <!-- Botão Responder com ativador de modal -->
            <button onclick="openResponseModal('<?php echo $c['email']; ?>', '<?php echo addslashes($c['name']); ?>', '<?php echo $c['id']; ?>', <?php echo json_encode($c['textarea']); ?>)">
            <div class="svg-wrapper-1">
              <div class="svg-wrapper">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path
                    fill="currentColor"
                    d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                  ></path>
                </svg>
              </div>
            </div>
            <span>Send</span>
          </button>

            <a href="<?php echo base_url('ContatoController/excluirContato/' . $c['id']); ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o contato de <?php echo addslashes($c['name']); ?>?');">
                <i class="bi bi-trash-fill"></i>
            </a>
        </div>
    </td>
    <td><?php echo $c['name']; ?></td>
    <td><?php echo $c['email']; ?></td>
    <td><?php echo $c['textarea']; ?></td>
    <td><?php echo $c['created_at']; ?></td>
    <td><?php
                // Compara se created_at é exatamente igual a updated_at
                if ($c['created_at'] === $c['updated_at']) {
                    echo 'Não';
                } else {
                    echo $c['updated_at'];
                }
                ?></td>
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
            <input type="email" class="form-control" id="recipientEmail" readonly>
        </div>
        <div class="mb-3">
            <label for="originalMessage" class="col-form-label">Mensagem do Cliente:</label>
            <textarea class="form-control" id="originalMessage" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label">Resposta:</label>
            <textarea class="form-control" id="message-text" name="messageText"></textarea>
        </div>
        <input type="hidden" id="contactId" name="contactId">
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
function applyFilter() {
    var filter = document.getElementById('filterResponse').value;
    var rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        var respondedCell = row.cells[5].textContent;
        switch (filter) {
            case 'not_responded':
                if (respondedCell.trim() === 'Não') {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
                break;
            case 'responded':
                if (respondedCell.trim() !== 'Não') {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
                break;
            default:
                row.style.display = '';
                break;
        }
    });
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    applyFilter(); // Aplica o filtro inicial ao carregar a página
});
</script>


<script>
function openResponseModal(email, name, contactId, originalMessage) {
    document.getElementById('recipientEmail').value = email;
    document.getElementById('originalMessage').value = originalMessage; // Set the original message
    document.getElementById('message-text').value = ''; // Clear the response textarea
    document.getElementById('contactId').value = contactId; 
    $('#responseModal').modal('show');
}

function sendResponse() {
    var email = document.getElementById('recipientEmail').value;
    var message = document.getElementById('message-text').value;
    var contactId = document.getElementById('contactId').value;

    // Adicionando console.log para verificar os valores antes do envio
    console.log("Enviando resposta com os seguintes dados:", {email: email, message: message, contactId: contactId});

    // Certifique-se de que o URL está correto e de que a resposta esperada é JSON
    $.post('<?= base_url("EmailController/contatoRespostaCliente") ?>', { email: email, message: message, contactId: contactId  }, function(response) {
        $('#responseModal').modal('hide');
        if (response.status === 'success') {
            alert('Email enviado com sucesso!'); // Notificação de sucesso
            window.location.reload(); // Opcional: remover para não recarregar a página
        } else {
            alert('Falha ao enviar o email: ' + response.message); // Notificação de falha
        }
    }, 'json').fail(function(xhr, status, error) {
        alert('Erro ao enviar resposta: ' + xhr.responseText); // Tratamento de erro de requisição AJAX
    });
}



</script>
</body>
</html>
