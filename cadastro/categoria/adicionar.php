<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Cadastrar Categoria</title>
</head>
<body>

<?php 

include('..\..\componentes\menu\menu.html');



//operacao de insert
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('..\..\includes\database.php'); 

    $categoria = $_POST["categoria"];
    $descricao = $_POST["descricao"];
  

    // Preparar e executar a inserção do novo registro
    $sql = "INSERT INTO categoria (categoria, descricao) VALUES (?, ?)";
    $insert = $conn->prepare($sql);
    $insert->bind_param("ss", $categoria, $descricao);

    if ($insert->execute()) {
        $message = "Novo registro inserido com sucesso!";
    } else {
        $message = "Erro ao inserir registro: " . $conn->error;
    }

    $insert->close();
    
    header("location: /app/cadastro/categoria/listar.php");
}
?>

<div class="w3-container">
    <h2 class="w3-margin-top">Cadastrar Nova Categoria</h2>
    <form action='adicionar.php' method='post'class="w3-container w3-card-2 w3-margin-top">
        <div class="w3-row-padding w3-margin-top"> <!-- primeira linha de campos -->
            <div class="w3-col s6">
                <label for="nome">Categoria</label>
                <input class="w3-input w3-border" type="text" id="categoria" name="categoria" required>
            </div>
            <div class="w3-col s2">
                <label for="cpf">Descricão</label>
                <input class="w3-input w3-border" type="text" id="descricao" name="descricao" required>
            </div>
            
        </div>
        <div class="w3-row-padding w3-margin-bottom" >  <!-- terceira linha de campos -->
            <button type="submit" class="w3-button w3-blue w3-margin-top ">Salvar</button>    
        </div>
    </form>    
</div>
</body>
</html>