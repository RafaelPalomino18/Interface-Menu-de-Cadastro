<?php
$servidor = "localhost";  // Endereço do servidor
$usuario = "root"; // Nome de usuário do banco de dados
$senha = "";     // Senha do banco de dados
$banco = "biblioteca"; // Nome do banco de dados

$message="";

// Conectar ao banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

else if (isset($_GET['cmd']) && $_GET['cmd'] == 'delete' && isset($_GET['id'])) {
    include "./delete.php";
    
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['cmd']) && $_GET['cmd'] == 'update' && isset($_POST['id'])) {
    include "./update.php";
}

?>