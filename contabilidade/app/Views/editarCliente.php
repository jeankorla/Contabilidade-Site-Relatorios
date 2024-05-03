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
        <form action="<?= base_url('loginController/updateUsername') ?>" method="post">
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
            <a class="btn btn-danger" href="#">Voltar</a>
        </div>
        <h1 class="mb-5">Editar Cliente</h1>

        <div class="alert alert-danger" style="display: none;"> 
            <ul>
                <li>Erro exemplo</li>
            </ul>
        </div>
        
        <form class="row g-3" action="<?= base_url('AdminController/atualizarCliente/' . $registro['id']) ?>" method="post" >

            <div class="col-md-6">
                <label for="nome_contato" class="form-label">Nome de Contato:</label>
                <input type="text" class="form-control" id="nome_contato" name="nome_contato" value="<?= $registro['nome_contato'] ?>">
            </div>

            <div class="col-md-6">
                <label for="email_contato" class="form-label">Email de Contato:</label>
                <input type="email" class="form-control" id="email_contato" name="email_contato" value="<?= $registro['email_contato'] ?>">
            </div>
            <div class="col-md-4">
                <label for="tel" class="form-label">Telefone do Contato:</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?= $registro['tel_contato'] ?>" oninput="mascaraTelefone(event);" maxlength="15">
            </div>
            <div class="col-md-4">
                <label for="cpf_contato" class="form-label">CPF do Contato:</label>
                <input type="text" id="cpf_contato" class="form-control" name="cpf_contato" oninput="aplicarMascaraCPF(this)" value="<?= $registro['cpf_contato'] ?>" maxlength="14">
            </div>
            <div class="col-4">
                <label for="cnpj" class="form-label">CNPJ:</label>
               <input type="text" id="cnpj" class="form-control" name="cnpj" value="<?= $registro['cnpj'] ?>" oninput="aplicarMascaraCNPJ(this)" maxlength="18">
            </div>
            <div class="col-6">
                <label for="nome_empresa" class="form-label">Nome da Empresa:</label>
                <input type="text" id="nome_empresa" class="form-control" name="nome_empresa" value="<?= $registro['nome_empresa'] ?>">
            </div>
            <div class="col-3">
                <label for="faturamento" class="form-label">Faturamento:</label>
                <input type="text" id="faturamento" class="form-control" name="faturamento" value="<?= $registro['faturamento'] ?>" onkeyup="formatarMoeda();" maxlength="18">
            </div>
            <div class="col-3">
                <label for="funcionarios" class="form-label">Funcionários:</label>
                <input type="number" id="funcionarios" class="form-control" name="funcionarios" value="<?= $registro['funcionarios'] ?>">
            </div>
            <div class="col-4">
                <label for="tributacao" class="form-label">Tributação:</label>
                <input type="text" id="tributacao" class="form-control" name="tributacao" value="<?= $registro['tributacao'] ?>">
            </div>
            <div class="col-4">
                <label for="nfe" class="form-label">Quantidade de Notas-Fiscais  - mês (Entrada/Saída/Serviços):</label>
                <input type="number" id="nfe" class="form-control" name="nfe" value="<?= $registro['nfe'] ?>">
            </div>
            <div class="col-md-4">
                <label for="lancamento" class="form-label">Quantidade de Lançamentos Contábeis:</label>
                <input type="number" id="lancamento" class="form-control" name="lancamento" value="<?= $registro['lancamento'] ?>">
            </div>



            
                <div class="col-md-12">
                <label for="endereco_empresa_estado" class="form-label">Empresa Estado:</label>
                <input type="text" id="endereco_empresa_estado" class="form-control" name="endereco_empresa_estado" value="<?= $registro['endereco_empresa_estado'] ?>">
            </div>
            <div class="col-12">
                <label for="endereco_empresa_cep" class="form-label">Empresa Cep:</label>
                <input type="text" id="endereco_empresa_cep" class="form-control" name="endereco_empresa_cep" value="<?= $registro['endereco_empresa_cep'] ?>">
            </div>
            <div class="form-outline">
                <label for="endereco_empresa_rua" class="form-label">Empresa Rua:</label>
                <input type="text" id="endereco_empresa_rua" class="form-control" name="endereco_empresa_rua" value="<?= $registro['endereco_empresa_rua'] ?>">
            </div>

             <div class="col-md-6">
                <label for="endereco_empresa_numero" class="form-label">Empresa Numero:</label>
                <input type="text" id="endereco_empresa_numero" class="form-control" name="endereco_empresa_numero" value="<?= $registro['endereco_empresa_numero'] ?>">
            </div>

            <div class="col-md-6">
                <label for="endereco_empresa_bairro" class="form-label">Empresa Bairro:</label>
                <input type="text" id="endereco_empresa_bairro" class="form-control" name="endereco_empresa_bairro" value="<?= $registro['endereco_empresa_bairro'] ?>">
            </div>
            <div class="col-md-6">
                <label for="endereco_empresa_cidade" class="form-label">Empresa Cidade:</label>
                <input type="text" id="endereco_empresa_cidade" class="form-control" name="endereco_empresa_cidade" value="<?= $registro['endereco_empresa_cidade'] ?>">
            </div>
        
           




           
                <div class="col-md-6">
                <label for="socio_nome" class="form-label">Nome do Sócio:</label>
                <input type="text" id="socio_nome" class="form-control" name="socio_nome" value="<?= $registro['socio_nome'] ?>">
            </div>
            <div class="col-9">
                <label for="socio_nacional" class="form-label">Nacionalidade do Sócio:</label>
                <input type="text" id="socio_nacional" class="form-control" name="socio_nacional" value="<?= $registro['socio_nacional'] ?>">
            </div>
            <div class="col-3">
                <label for="socio_idade" class="form-label">Idade do Sócio:</label>
                <input type="text" id="socio_idade" class="form-control" name="socio_idade" value="<?= $registro['socio_idade'] ?>">
            </div>
            <div class="col-6">
                <label for="socio_rg" class="form-label">RG do Sócio:</label>
                <input type="text" id="socio_rg" class="form-control" name="socio_rg" value="<?= $registro['socio_rg'] ?>">
            </div>
            <div class="col-6">
                <label for="socio_cpf" class="form-label">CPF do Sócio:</label>
                <input type="text" id="socio_cpf" class="form-control" name="socio_cpf" value="<?= $registro['socio_cpf'] ?>">
            </div>
            <div class="col-6">
                <label for="socio_endereco_cep" class="form-label">CEP do Sócio:</label>
                <input type="text" id="socio_endereco_cep" class="form-control" name="socio_endereco_cep" value="<?= $registro['socio_endereco_cep'] ?>">
            </div>
            <div class="col-6">
                <label for="socio_endereco_estado" class="form-label">Estado do Sócio:</label>
                <input type="text" id="socio_endereco_estado" class="form-control" name="socio_endereco_estado" value="<?= $registro['socio_endereco_estado'] ?>">
            </div>
            <div class="col-md-6">
                <label for="socio_endereco_cidade" class="form-label">Cidade do Sócio:</label>
                <input type="text" id="socio_endereco_cidade" class="form-control" name="socio_endereco_cidade" value="<?= $registro['socio_endereco_cidade'] ?>">
            </div>
            <div class="col-md-12">
                <label for="socio_endereco_bairro" class="form-label">Bairro do Sócio:</label>
                <input type="text" id="socio_endereco_bairro" class="form-control" name="socio_endereco_bairro" value="<?= $registro['socio_endereco_bairro'] ?>">
            </div>
            <div class="col-12">
                <label for="socio_endereco_rua" class="form-label">Rua do Sócio:</label>
                <input type="text" id="socio_endereco_rua" class="form-control" name="socio_endereco_rua" value="<?= $registro['socio_endereco_rua'] ?>">
            </div>
            <div class="form-outline">
                <label for="socio_endereco_numero" class="form-label">Número do Sócio:</label>
                <input type="text" id="socio_endereco_numero" class="form-control" name="socio_endereco_numero" value="<?= $registro['socio_endereco_numero'] ?>">
            </div>
           



            
            



            <div class="col-md-6">
                <label for="honorario" class="form-label">Honorário:</label>
                <input type="text" id="honorario" class="form-control" name="honorario" value="<?= $registro['honorario'] ?>">
            </div>

            <div class="col-md-6">
                <label for="honorario_texto" class="form-label">Honorário Texto:</label>
                <input type="text" id="honorario_texto" class="form-control" name="honorario_texto" value="<?= $registro['honorario_texto'] ?>">
            </div>
            <div class="col-md-6">
                <label for="inicio_contabilidade" class="form-label">Início na Contabilidade:</label>
                <input type="text" id="inicio_contabilidade" class="form-control" name="inicio_contabilidade" value="<?= $registro['inicio_contabilidade'] ?>">
            </div>
            <div class="col-md-6">
                <label for="competencia" class="form-label">Competência:</label>
                <input type="text" id="competencia" class="form-control" name="competencia" value="<?= $registro['competencia'] ?>">
            </div>

            <div class="col-12">
                <a class="btn btn-danger" href="#">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
    </div>

    


</section>

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