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
  
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
.scale-down {
    transform: scale(0.8);
    transform-origin: center; /* centralizar o ponto de origem da transformação */
}
.tudo{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    
}
.tudo-body{
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    min-height: 100vh;
}
.w50{
    width: 50%;
    float: left;
    padding-right: 15px;
}
.box{
    display: flex;
    width: 1300px;
    z-index: 1;
}
.form-box{
    background-color: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(40px);
    padding: 30px 40px;
    width: 50%;
    border-radius: 20px 20px 20px 20px;
}
.form-box h2{
    font-size: 30px;
}
.form-box p{
    font-weight: bold;
    color: #3D3D3D;
}
.form-box p a{
    color: #FF931E;
    text-decoration: none;
}
.form-box form{
    margin: 20px 0;
}
form .input-group{
    margin-bottom: 15px;
}
form .input-group label{
   
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}
form .input-group input{
    width: 100%;
    height: 47px;
    background-color: rgba(255, 255, 255, 0.32);
    border-radius: 20px;
    outline: none;
    border: 2px solid transparent;
    padding: 15px;
    font-size: 15px;
    color: #616161;
    transition: all 0.4s ease;
}
form .input-group input:focus{
    border-color: #ff008869;
}
form .input-group button{
    width: 100%;
    height: 47px;
    background: #FF931E;
    border-radius: 20px;
    outline: none;
    border: none;
    margin-top: 15px;
    color: white;
    cursor: pointer;
    font-size: 16px;
}
@media (max-width:930px) {
    .img-box{
        display: none;
    }
    .box{
        width: 700px;
    }
    .form-box{
        width: 100%;
        border-radius: 20px;
    }
}
@media (max-width:500px) {
    .w50{
        width: 100%;
        padding: 0;
    }
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
    z-index:-1;
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


<section >

<div class="jp1"></div>
    <div class="jp1 jp2"></div>
    <div class="jp1 jp3"></div>

    

    <div class="container form-box mb-5" style="z-index: 2;">
      <div class="card-header">
    <form action="<?= base_url('AdminController/atualizarTrocar/' . $registro['id']) ?>" method="post" >
    <div class="form-group">

    <legend class="text-white">Editar Lead Troca de Contabilidade</legend>
</div>
<div class="card-body">
    <div class="mb-3">
      <label for="nome" class="form-label text-white">Nome:</label>
      <input type="text" id="nome" class="form-control" name="nome" value="<?= $registro['nome'] ?>">
    </div>

     <div class="mb-3">
      <label for="email" class="form-label text-white">E-mail:</label>
      <input type="text" id="email" class="form-control" name="email" value="<?= $registro['email'] ?>">
    </div>

    <div class="mb-3">
      <label for="tel" class="form-label text-white">Contato:</label>
      <input type="text" id="tel" class="form-control" name="tel" value="<?= $registro['tel'] ?>">
    </div>

     <div class="mb-3">
      <label for="cnpj" class="form-label text-white">Cnpj:</label>
      <input type="text" id="cnpj" class="form-control" name="cnpj" value="<?= $registro['cnpj'] ?>">
    </div>

     <div class="mb-3">
      <label for="nome_empresa" class="form-label text-white">Nome da Empresa:</label>
      <input type="text" id="nome_empresa" class="form-control" name="nome_empresa" value="<?= $registro['nome_empresa'] ?>">
    </div>

    <div class="mb-3">
      <label for="faturamento" class="form-label text-white">Faturamento:</label>
      <input type="text" id="faturamento" class="form-control" name="faturamento" value="<?= $registro['faturamento'] ?>">
    </div>

    <div class="mb-3">
      <label for="funcionarios" class="form-label text-white">Funcionarios:</label>
      <input type="number" id="funcionarios" class="form-control" name="funcionarios" value="<?= $registro['funcionarios'] ?>">
    </div>

    <div class="mb-3">
      <label for="nfe" class="form-label text-white">Quantidade de Notas-Fiscais  - mês (Entrada/Saída/Serviços):</label>
      <input type="number" id="nfe" class="form-control" name="nfe" value="<?= $registro['nfe'] ?>">
    </div>

    <div class="mb-3">
      <label for="lancamento" class="form-label text-white">Quantidade de Lançamentos Contábeis: </label>
      <input type="number" id="lancamento" class="form-control" name="lancamento" value="<?= $registro['lancamento'] ?>">
    </div>

    <div class="mb-3">
      <label for="tributacao" class="form-label text-white">Tributação:</label>
      <input type="text" id="tributacao" class="form-control" name="tributacao" value="<?= $registro['tributacao'] ?>">
    </div>

    <div class="mb-3">
      <label for="estado" class="form-label text-white">Estado:</label>
      <input type="text" id="estado" class="form-control" name="estado" value="<?= $registro['estado'] ?>">
    </div>

     </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
 </div>
</form>
</div>

</section>