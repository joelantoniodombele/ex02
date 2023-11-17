<?php
   require_once 'connection.php';

 // Criar um objeto de conexão
   $database = new DB();
   $conn = $database->connect();


   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Criar um novo registro
    if (isset($_POST['add'])) {
        $nome_categoria = $_POST['nome_categoria'];
        $desc_categoria = $_POST['desc_categoria'];
    }

   }

   $stmt = $conn->prepare("INSERT INTO categorias (nome_categoria, desc_categoria) VALUES (:nome_categoria, :desc_categoria ");
        $stmt->bindParam(':nome_categoria', $nome_categoria);
        $stmt->bindParam(':desc_categoria', $desc_categoria);
       

        if ($stmt->execute()) {
          if (isset($_POST['submit'])) {
            $mensagem ="Cadastro feito com sucesso !";
            echo"<script type='text/javascript'> alert('$mensagem ');</script>";
          }
            
        } else {
            echo 'Erro ao criar registro.';
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
   <h1>Adicionar Categoria</h1>
   <form action="" method="post">
         <label for="nome_categoria">Nome da Categoria</label><br>
         <input type="text" name="nome_categoria"><br><br>

         <label for="desc_categoria"> Descrição </label><br>
         <textarea  name="desc_categoria" rows="4" cols="50"></textarea ><br><br>


         <input type="submit" value="Adicionar" name="add">

   </form> 
</body>
</html>