<?php
require_once("connection.php");

$database = new DB();
$conn = $database->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $database = new DB();
        $conn = $database->connect();

        $query = "SELECT email, senha FROM usuario WHERE email = :email AND senha = :senha"; // Adicione a cláusula WHERE

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) { // Verifica se a consulta retornou algum resultado
            header("Location: ../php/dashboard.php"); // Redireciona para home.html
        } else {
            header("Location: ../php/dashboard.php"); // Redireciona para erro.html
        }
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocumeRent</title>
    <link rel="stylesheet" href="../css/suzana.css">
</head>
<body>
<form  method="post">


<div>
    <h1>Login</h1>
    <input type="email"  placeholder="Email" name="email">
    <br><br>
    <input type="password" placeholder="Senha" name="senha">
    <br><br>
    <input type="submit" value="Entrar" name="login">
    <p>Tens uma conta ? <a href="../php/cadastrar.php">Registra-te</a></p>
    </div>


</form>
</body>
</html>



