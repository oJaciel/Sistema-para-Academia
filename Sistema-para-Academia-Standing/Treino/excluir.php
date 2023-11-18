<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir Treino</title>


  </head>
  
  <body>

  <?php
  include ('../conexao.php');
  
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $id = $_GET['id'];
  
      $sql = "DELETE FROM Treino WHERE id=$id";
      if ($conexao->query($sql) === TRUE) {
  
          header("Location: listar.php");
  
      } else {
          echo "Erro ao deletar exercício: " . $conexao->error;
      }
  }
  
  $conexao->close();
  
  ?>




  </body>
</html>