<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Categoria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

  <?php include('../header.html');?>

  <br>

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb ms-3">
      <li class="breadcrumb-item "><a href="../index.html">Início</a></li>
      <li class="breadcrumb-item"><a href="listar.php">Categoria Exercício</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar Categoria</li>
    </ol>
  </nav>


  <?php
  include '../conexao.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];


    $sql = "UPDATE categoria_exercicio SET  nome='$nome' WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
      header("Location: listar.php");
    } else {
      echo "Erro ao atualizar: " . $conexao->error;
    }
  } else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome FROM categoria_exercicio WHERE id= '$id'";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
      $cliente = $result->fetch_assoc();
    } else {
      echo "Essa tarefa não existe";
      exit;
    }
  }

  $conexao->close();
  ?>

  <div class="container mt-3 pt-3">
    <form action="editar.php" method="post" class="row g-3">

      <div class="col-12">
        <div class="bg-primary opacity-75 p-3 text-center mb-2 text-white fw-bolder fs-3">
          Editar Categoria
        </div>
      </div>

      <div class="col-md-2">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" name="id" id="id" value="<?= $cliente['id']; ?>" readonly>
      </div>


      <div class="col-md-10">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" value="<?= $cliente['nome']; ?>" required>
      </div>

      <div class="row">
        <div class="col-md-8">
          <input type="submit" value="Atualizar" class="btn btn-primary w-100 bg-gradient p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button"></input>
        </div>

        <div class="col-md-4">
          <a type="button" href="listar.php" class="btn btn-danger w-100 p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button">Cancelar</a>
        </div>
      </div>


    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>