<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Treino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
  $(function() {
    $("#header").load("../header.html");
    $("#footer").load("../footer.html");
  });
</script>


<body>

  <div id="header"></div>

  <br>

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../index.html">Início</a></li>
      <li class="breadcrumb-item active" aria-current="page">Treino</li>
    </ol>
  </nav>

  <a class="btn btn-primary ms-3 mt-3 mb-3" href="criar.php">Adicionar novo treino</a>

<br>
<br>
  
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cliente</th>
      <th scope="col">Exercício</th>
      <th scope="col">Data</th>
      <th scope="col">Data de criação</th>
      <th scope="col">Última atualização</th>
    </tr>
  </thead>
  <tbody>

    <?php
    include("../conexao.php");

    $sql_treino = "SELECT 
      t.id,
      t.data_treino,
      t.Criado_em,
      t.Atualizado_em,
      c.nome as nome_cliente,
      e.nome as nome_exercicio
      FROM Treino as t
      INNER JOIN Exercicio as e ON e.id = t.exercicio_id
      INNER JOIN Cliente as c ON c.id = t.cliente_id";

    $pesquisa = $conexao->query($sql_treino);

    if ($pesquisa->num_rows > 0) {
      while ($row = $pesquisa->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'>" . $row["id"] . "</th>";
        echo "<td> " . $row["nome_cliente"] . "</td>";
        echo "<td> " . $row["nome_exercicio"] . "</td>";
        echo "<td> " . $row["data_treino"] . "</td>";
        echo "<td>"  . $row["Criado_em"] . "</td>";
        echo "<td>"  . $row["Atualizado_em"] . "</td>";
        echo "<td><a class = 'btn btn-primary'href='editar.php?id=" . $row["id"] . "'>Editar</a>  <a class  = 'btn btn-danger' onclick = btdelete() href='excluir.php?id=" . $row["id"] . "'>Deletar</a></td>";
      }
    }

    ?>

  </tbody>
</table>




 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>