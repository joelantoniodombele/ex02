<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>Cadastrar Cursos</h1>
<form action="teste.php" method="get">
    <label for="nome_curso">Nome do curso</label><br>
    <input type="text" required name="nome_curso"><br><br>

    <label for="categoria">Categoria</label>
    <select name="categoria" id="categoria">
    <?php
    include 'connetion.php';


    echo "<option value='x' >xdss</option>";

    ?>    
        
    </select>
    <label for="descricao">Descricão </label><br>
    <textarea id="descricão" name="descriçao" rows="4" cols="50"></textarea ><br><br>

    <label for="instrutor">Instrutor</label>
    <select name="instrutor" id="instrutor">
    <?php

    echo  "<option value='y'>rere</option>"; 
      ?>       
    </select><br><br>

    <label for="imagem">Imagem de capa</label><br><br>
    <input type="file" name="imagem" id="imagem" required>

    <input type="submit" value="Enviar">

</form>
  
</body>
</html>
