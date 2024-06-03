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
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download de Arquivo</title>
    <style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
    transition: 0.3s;
    border-radius: 5px;
    padding: 20px;
    margin: 20px;
    text-align: center;
    background-color: #f4f4f4;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.card-content {
    padding: 20px;
    text-align: center;
}
        /* === Botão === */

.button-container {
    display: flex;
    justify-content: center; /* Centraliza horizontalmente */
    align-items: center; /* Centraliza verticalmente */
    text-align: center; /* Adicionado para garantir que o botão esteja centralizado */
}

.button {
    color: white;
    font-family: Helvetica, sans-serif;
    font-weight: bold;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    background-color: #1F628E;
    padding: 20px 40px;
    display: inline-block; /* Garante que o botão só ocupe o espaço necessário */
    
    text-shadow: 0px 1px 0px #000;
    -webkit-box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
    -moz-box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
    box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #0E415F;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    position: relative; /* Garante que o pseudo-elemento :after esteja relativo a este botão */
}

.button:active {
    top: 10px;
    background-color: #0E415F;
    -webkit-box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
    -moz-box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
    box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #1F628E;
}

.button:after {
    content: "";
    height: 100%;
    width: 100%;
    padding: 4px;
    position: absolute;
    bottom: -15px;
    left: 0; /* Ajustado para 0 para se alinhar corretamente com o botão */
    z-index: -1;
    background-color: #0E415F;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
    </style>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color:  #024A7F;">
    <div class="container-fluid navbar-container">
      <a class="navbar-brand" href="https://sccontab.com.br/">
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
  
  <div class="card">
    <div class="card-content">
        <p>Caso o download não inicie automaticamente, clique no botão abaixo para fazer download.</p>
        <div class="button-container">
            <a class="button" id="downloadLink" href="<?= base_url('gerador/downloadFile/' . $nome_temporario) ?>">
                Download do Arquivo
            </a>
        </div>
    </div>
</div>
    <script>
        // Tenta iniciar o download automaticamente
        window.onload = function() {
            document.getElementById("downloadLink").click();
        };
    </script>
</body>
</html>
