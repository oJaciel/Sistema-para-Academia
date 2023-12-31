<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Criar Cliente</title>
    <script src="cliente.js" type="text/javascript"></script>

    <!-- Scripts para máscara no CPF e telefone -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


</head>

<body>

    <?php
    include('../header.html');
    // ini_set("error_reporting", E_ALL);
    error_reporting(0);

    ?>

    <br>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb ms-3">
            <li class="breadcrumb-item"><a href="../index.html">Início</a></li>
            <li class="breadcrumb-item"><a href="listar.php">Cliente</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar Cliente</li>
        </ol>
    </nav>


    <div class="container mt-3 pt-3">
        <form action="criar.php" method="post" class="row g-3">

            <div class="col-12">
                <div class="bg-primary opacity-75 p-3 text-center mb-2 text-white fw-bolder fs-3">
                    Cadastrar Novo Cliente
                </div>
            </div>

            <div class="col-md-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" required>
            </div>

            <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" maxlength="11" oninput="formatCPF(this)" placeholder="Insira o CPF" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Insira o e-mail" required>
            </div>

            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Insira o telefone" required>
            </div>

            <div class="col-md-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Insira o endereço" required>
            </div>


            <div class="row">
                <div class="col-md-8">
                    <input type="submit" value="Salvar" class="btn btn-primary w-100 bg-gradient p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button"></input>
                </div>

                <div class="col-md-4">
                    <a type="button" href="listar.php" class="btn btn-danger w-100 p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button">Cancelar</a>
                </div>
            </div>


        </form>
        <script>
            function formatCPF(input) {
                let cpf = input.value.replace(/\D/g, '');
                cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                input.value = cpf;

            }
        </script>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <?php
    include('../footer.html')
    ?>

</body>

</html>

<?php
include('../conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];

    $sql_cliente =
        "INSERT INTO Cliente 
                (nome, email, telefone, cpf, endereco)
            VALUES 
                ('$nome', '$email', '$telefone', '$cpf', '$endereco')";

    if ($conexao->query($sql_cliente) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }
}

$conexao->close();

?>