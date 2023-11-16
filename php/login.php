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
            header("Location: ../html/erro.html"); // Redireciona para erro.html
        }
    }
}
?>
    



<link rel="stylesheet" href="../css/style.css">

<header>
  <h1>Estudando PHP</h1>
</header>

<main>

<h1>Faça Login</h1>
<form  method="post">

<fieldset>
    
     
    <label for="email">Email</label>
    <input type="email" name="email" value=" " required>
    <p class="espaco"></p>

    <label for="senha">Senha</label>
    <input type="text" name="senha" value=" " required>
    <p class="espaco"></p>
    
    <input type="submit" value="Login" name="login" >
</fieldset>


</form>
</main>