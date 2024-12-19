<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Alunos</title>
</head>
<body>

<?php 

include("..\..\componentes\menu\menu.html");

include("..\..\includes\database.php");

//prepara a consulta sql
$sql = "SELECT * FROM editora";

//executa a consulta sql
$result = $conn->query($sql);

?>

<div class="w3-container">
  <h2 class="w3-margin-top">Lista de Editora</h2>
  
  <a href="/app/cadastro/editora/adicionar.php"><button class="w3-button w3-green w3-round">Nova Editora</button></a>

  <table class="w3-table-all w3-margin-top ">
    <thead>
      <tr class="w3-light-grey">
        <th>Editora</th>
      </tr>
    </thead>


<?php
//se existir algum registro na consulta
if ($result->num_rows > 0) {
  //para cada linha do resultado da consulta
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['editora'] . "</td>";
      echo "<td>";
      echo "<form>";
      echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
      echo "<input type='submit' value='Alterar' class='w3-button w3-tiny w3-round w3-blue'>";
      echo "<button class='w3-button w3-tiny w3-round w3-red'>Excluir</button>";
      echo "</form>";
      echo "</td>";
      echo "</tr>";
  }
} else {
  echo "<tr><td colspan='10'>Nenhum registro encontrado</td></tr>";
}

// Fechar a conexão
$conn->close();
?>
  </table>
</div>
</body>
</html>
