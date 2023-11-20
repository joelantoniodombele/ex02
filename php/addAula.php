<?php
   require_once 'connection.php';
   // Criar um objeto de conexão
   $database = new DB();
   $conn = $database->connect();


   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber e processar os dados do formulário
    $nome_aula = $_POST['nome_aula'];
    $descricao_aula = $_POST['descricao_aula'];
    $link_aula = $_POST['link_aula'];
    $curso_id = $_POST['curso_id'];
    
    // Inserir os dados na tabela 'aulas' no banco de dados usando uma consulta SQL INSERT
    $query = "INSERT INTO aulas (nome, descricao, link_aula, curso_id) VALUES (:nome, :descricao, :link_aula, :curso_id)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $nome_aula);
    $stmt->bindParam(':descricao', $descricao_aula);
    $stmt->bindParam(':link_aula', $link_aula);
    $stmt->bindParam(':curso_id', $curso_id);
    
    // Execute a query
    $stmt->execute();
    
    // Redirecionar para uma página após a conclusão do processo
    header("Location: listarAulas.php");
    exit();
} else {
    echo "Erro ao processar o formulário!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="nome_aula">Nome da Aula:</label>
    <input type="text" id="nome_aula" name="nome_aula"><br><br>
    
    <label for="descricao_aula">Descrição da Aula:</label><br>
    <textarea id="descricao_aula" name="descricao_aula" rows="4" cols="50"></textarea><br><br>
    
    <label for="link_aula">Link da Aula:</label>
    <input type="text" id="link_aula" name="link_aula"><br><br>
    
    <label for="link_aula">ID do curso:</label>
    <input type="number" name="curso_id" value="">
    
    <input type="submit" value="Adicionar Aula">
</form>

</body>
</html>