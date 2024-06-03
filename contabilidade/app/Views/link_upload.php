<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

  <style>
  body {
  background-color: #eee;
}

/* === Wrapper Styles === */
#FileUpload {
  display: flex;
  justify-content: center;
}
.wrapper {
  margin: 30px;
  padding: 10px;
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
  border-radius: 10px;
  background-color: white;
  width: 615px;
}

/* === Upload Box === */
.upload {
  margin: 10px;
  height: 85px;
  border: 8px dashed #e6f5e9;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 5px;
}
.upload p {
  margin-top: 12px;
  line-height: 0;
  font-size: 22px;
  color: #0c3214;
  letter-spacing: 1.5px;
}
.upload__button {
  background-color: #e6f5e9;
  border-radius: 10px;
  padding: 0px 8px 0px 10px;
}
.upload__button:hover {
  cursor: pointer;
  opacity: 0.8;
}


/* === Uploaded Files === */
.uploaded {
  width: 375px;
  margin: 10px;
  background-color: #e6f5e9;
  border-radius: 10px;
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
}
.file {
  display: flex;
  flex-direction: column;
}
.file__name {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: baseline;
  width: 300px;
  line-height: 0;
  color: #0c3214;
  font-size: 18px;
  letter-spacing: 1.5px;
}
.fa-times:hover {
  cursor: pointer;
  opacity: 0.8;
}
.fa-file-pdf {
  padding: 15px;
  font-size: 40px;
  color: #0c3214;
}

/* === Botão === */

.button{
  position:relative;
  display:inline-block;
  margin:20px;
}

/* Adicione essa classe à div pai do botão */
.button-container {
  display: flex;
  justify-content: center; /* Centraliza horizontalmente */
  align-items: center; /* Centraliza verticalmente */
}
.button a{
  color:white;
  font-family:Helvetica, sans-serif;
  font-weight:bold;
  font-size:16px;
  text-align: center;
  text-decoration:none;
  background-color:#1F628E;
  display:block;
  position:relative;
  padding:20px 40px;
  
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  text-shadow: 0px 1px 0px #000;
  filter: dropshadow(color=#000, offx=0px, offy=1px);
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
  box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.button a:active{
  top:10px;
  background-color:#0E415F;
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #1F628E;
  box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
}

.button button{
  color:white;
  font-family:Helvetica, sans-serif;
  font-weight:bold;
  font-size:16px;
  text-align: center;
  text-decoration:none;
  background-color:#1F628E;
  display:block;
  position:relative;
  padding:20px 40px;
  
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  text-shadow: 0px 1px 0px #000;
  filter: dropshadow(color=#000, offx=0px, offy=1px);
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
  box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.button button:active{
  top:10px;
  background-color:#0E415F;
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #1F628E;
  box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
}

.button:after{
  content:"";
  height:100%;
  width:100%;
  padding:4px;
  position: absolute;
  bottom:-15px;
  left:-4px;
  z-index:-1;
  background-color:#0E415F;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.code-field {
    background-color: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    font-family: monospace;
    margin: 10px 0;
    width: 100%;
    box-sizing: border-box;
    font-size: 15px;
}
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color:  #024A7F;">
    <div class="container-fluid navbar-container">
      <a class="navbar-brand" href="https://sccontab.com.br/UploadController">
          <img class="img-fluid" src="<?= base_url('img/logo-lado.svg') ?>" alt="Logolado">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Itens de navegação -->
        </ul>
        <!-- Formulário de pesquisa -->
      </div>
    </div>
  </nav>

<div id="FileUpload">
    <div class="wrapper">
      <h1>Enviar Arquivo</h1>

      <!-- Contador de arquivos enviados -->
      <div id="fileCounter">Arquivos selecionados: 0</div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= site_url('UploadController/index') ?>" method="post" enctype="multipart/form-data">
        <input id="fileInput" type="file" name="file" />
        <div ontouchstart="" class="button-container">
          <div class="button">
            <button id="submitBtn" type="submit">Gerar Link</button>
          </div>
        </div>
      </form>
<br>

      <?php if (isset($message)): ?>
<div>
    <p><?= $message ?></p>
    <textarea id="url" class="code-field" readonly><?= $url ?></textarea>
    <button onclick="copyToClipboard()" class="button">Copiar Link</button>
</div>
<?php endif; ?>
      
      <!-- Loop through uploaded files -->
      <?php if (!empty(session()->get('uploaded_files'))): ?>
        <?php foreach(session()->get('uploaded_files') as $file): ?>
          <div class="uploaded">
            <i class="far fa-file-pdf"></i>
            <div class="file">
              <div class="file__name">
                <p><?= $file ?></p>
                <i class="fas fa-times"></i>
              </div>
              <div class="progress">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:100%"></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
</div>
</body>
</html>


<script>
  var fileInput = document.querySelector('#fileInput');
  var fileCounter = document.querySelector('#fileCounter');
  var form = document.querySelector('#fileUploadForm');

  // Atualizar o contador quando arquivos forem selecionados
  fileInput.addEventListener('change', function() {
    fileCounter.textContent = 'Arquivos selecionados: ' + fileInput.files.length;
  });

  // Enviar o formulário ao clicar no botão
  document.querySelector('#submitBtn').addEventListener('click', function(e) {
  // Verifique se algum arquivo foi selecionado
  if (fileInput.files.length == 0) {
    alert('Nenhum arquivo selecionado');
    e.preventDefault(); // Evita que o formulário seja enviado
  } else {
    form.submit();
  }
});

  // Clique no botão de upload para selecionar arquivos
  document.querySelector('.upload__button').addEventListener('click', function() {
    fileInput.click();
  });

  function copyToClipboard() {
    /* Obter a área de texto */
    var copyText = document.getElementById("url");

    /* Selecionar o texto dentro da área de texto */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* Para dispositivos móveis */

    /* Copiar o texto para dentro da área de texto */
    document.execCommand("copy");

    /* Alertar o usuário que o texto foi copiado */
    alert("Copied the text: " + copyText.value);
}
</script>
    
</body>
</html>