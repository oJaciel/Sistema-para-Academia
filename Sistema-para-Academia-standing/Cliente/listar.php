<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">aqui vai a logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cliente
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Cliente/listar.php">Visualizar</a></li>
                            <li><a class="dropdown-item" href="../criar.php">Criar</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exercício
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Exercicio/listar.php">Visualizar</a></li>
                            <li><a class="dropdown-item" href="../Exercicio/criar.php">Criar</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Treino
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Treino/listar.php">Visualizar</a></li>
                            <li><a class="dropdown-item" href="../Treino/criar.php">Criar</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categoria Exercício
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Categoria_Exercicio/listar.php">Visualizar</a></li>
                            <li><a class="dropdown-item" href="../Categoria_Exercicio/criar.php">Criar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <a class="btn btn-primary" href="criar.php">Adicionar novo cliente</a>

    <br>

    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">CPF</th>
                <th scope="col">Endereço</th>
            </tr>
        </thead>
        <tbody>

        <?php
        include("../conexao.php");

        $sql_cliente = "SELECT * FROM Cliente";

        $pesquisa = $conexao->query($sql_cliente);

        if ($pesquisa->num_rows > 0) {
            while ($row = $pesquisa->fetch_assoc()) {
                echo "
                <tr>
                  <th scope='row'>" . $row["id"] . "</th>
                  <td> " . $row["nome"] . "</td>
                  <td>" . $row["email"] . "</td>
                  <td>" . $row["telefone"] . "</td>
                  <td>" . $row["cpf"] . "</td>
                  <td>" . $row["endereco"] . "</tr>";
            }
        }

        ?>

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>