<?php
include 'connection.php'; // Inclua a classe de conexão com o banco de dados

// Criar um objeto de conexão
$database = new DB();
$conn = $database->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $titulo = $_POST['titulo'];
    $url_aula = $_POST['url_aula'];
   

    // Inserir os dados no banco de dados
    $stmt = $conn->prepare("INSERT INTO aulas (titulo, url_aula) VALUES (:titulo, :url_aula)");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':url_aula', $url_aula);
   
    if ($stmt->execute()) {
        if (isset($_POST['submit'])) {
            $mensagem ="Cadastro feito com sucesso !";
            echo"<script type='text/javascript'> alert('$mensagem ');</script>";
          }
    } else {
        echo 'Erro ao cadastrar página.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Página</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
  <h1>Estudando PHP</h1>
</header>

    <main>
        <h1>Adicionar Aula</h1>
        <form  method="post">
            <fieldset>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br><br>
                <label for="titulo">Url:</label>
                <input type="text" id="url_aula" name="url_aula" required><br><br>
                <input type="submit" value="Adicionar" name="confirmar" >
                
            </fieldset>
        </form>
    </main>
</body>
</html>
