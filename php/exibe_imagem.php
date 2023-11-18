<?php

require_once 'connection.php';

 


// Criar um objeto de conexão
$database = new DB();
$conn = $database->connect();
// ... (seu código de conexão com o banco de dados)

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta ao banco de dados para obter o caminho da imagem associado ao ID
    $stmt = $conn->prepare("SELECT imagem FROM cursos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $resultado = $stmt->fetch();

    if ($resultado) {
        $caminho_da_imagem = $resultado['imagem'];
        // Exiba a imagem usando o caminho obtido do banco de dados
        echo "<img src='$caminho_da_imagem' alt='Minha Imagem'>";
    } else {
        echo "Nenhuma imagem encontrada para este ID.";
    }
} else {
    echo "Nenhum ID de imagem fornecido.";
}
?>