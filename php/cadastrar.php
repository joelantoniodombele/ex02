<link rel="stylesheet" href="../css/style.css">

<?php
include 'connection.php';

 


// Criar um objeto de conexão
$database = new DB();
$conn = $database->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Criar um novo registro
    if (isset($_POST['confirmar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        // Validação do nome
if (strlen($nome) < 5) {
  echo "O nome deve ter pelo menos 5 caracteres.";
  exit;
}

// Validação do e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "O e-mail é inválido.";
  exit;
}

// Validação da senha
if (strlen($senha) < 8) {
  echo "A senha deve ter pelo menos 8 caracteres.";
  exit;
}

        $stmt = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        if ($stmt->execute()) {
          if (isset($_POST['submit'])) {
            $mensagem ="Cadastro feito com sucesso !";
            echo"<script type='text/javascript'> alert('$mensagem ');</script>";
          }
            
        } else {
            echo 'Erro ao criar registro.';
        }
    }

}  
 ?>

<header>
  <h1>Estudando PHP</h1>
</header>

<main>


<h1>Cadastrar Usuario</h1>
<form  method="post">

<fieldset>
    <label for="nome">Nome</label>
    <input type="text" name="nome" value=" " required>
    <p class="espaco"></p>
    
    <label for="email">Email</label>
    <input type="email" name="email" value=" " required>
    <p class="espaco"></p>

    <label for="senha">Senha</label>
    <input type="text" name="senha" value=" " required>
    <p class="espaco"></p>
    
    <input type="submit" value="Salvar" name="confirmar" >
</fieldset>


</form>
</main>