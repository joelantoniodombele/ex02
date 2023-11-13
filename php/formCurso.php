<?php

// Carrega as bibliotecas necessárias
require_once "conexao.php";

// Valida os dados do formulário
$nome_curso = trim($_POST["nome_curso"]);
$categoria_id = $_POST["categoria"];
$instrutor_id = $_POST["instrutor"];
$descricao = trim($_POST["descricao"]);
$imagem = $_FILES["imagem"];

if (empty($nome_curso)) {
  echo "O campo 'Nome do curso' é obrigatório.";
  exit;
}

if ($categoria_id == "") {
  echo "O campo 'Categoria' é obrigatório.";
  exit;
}

if ($instrutor_id == "") {
  echo "O campo 'Instrutor' é obrigatório.";
  exit;
}
if ($imagem["error"] != UPLOAD_ERR_OK) {
  echo "Ocorreu um erro ao enviar o arquivo de imagem.";
  exit;
}

if ($imagem["size"] > 1000000) {
  echo "O arquivo de imagem é muito grande.";
  exit;
}
// Salva o arquivo de imagem no sistema de arquivos
$pasta = "uploads/imagens/cursos";
$caminho_completo = $pasta . "/" . $imagem["name"];

move_uploaded_file($imagem["tmp_name"], $caminho_completo);

// Insere o caminho do arquivo de imagem no banco de dados
$nome_curso = trim($_POST["nome_curso"]);
$categoria_id = $_POST["categoria"];
$instrutor_id = $_POST["instrutor"];
$descricao = trim($_POST["descricao"]);
$imagem = $caminho_completo;

$sql = "INSERT INTO cursos (nome, categoria_id, instrutor_id, descricao, imagem) VALUES ('" . $nome_curso . "', " . $categoria_id . ", " . $instrutor_id . ", '" . $descricao . "', '" . $imagem . "')";
$pdo->query($sql);

// Redireciona o usuário para a página de confirmação
header("Location: cursos.php");

?>
<h1>Cadastrar Cursos</h1>
<form method="post">
    <label for="nome_curso">Nome do curso</label><br>
    <input type="text" required id="nome_curso"><br><br>

    <label for="categoria">Categoria</label>
    <select name="categoria" id="categoria">
    <?php
            // Carrega as bibliotecas necessárias
    require_once "conection.php";

       // Obtém as informações de conexão com o banco de dados
        $pdo = new PDO("mysql:host=localhost;dbname= curso", "root", "");

        // Recupera todas as categorias
        $sql = "SELECT * FROM categorias";
        $resultado = $pdo->query($sql);

        // Preenche o select do formulário

       foreach ($resultado as $categoria) {
        echo "<option value='" . $categoria["id"] . "'>" . $categoria["nome"] . "</option>";
        }
        ?>
        
    </select><br><br>
    <label for="descricao">Descricão </label><br>
    <textarea id="descricão" name="descriçao" rows="4" cols="50"></textarea ><br><br>

    <label for="instrutor">Instrutor</label>
    <select name="instrutor" id="instrutor" required>
    <?php
            // Carrega as bibliotecas necessárias
    require_once "conection.php";

       // Obtém as informações de conexão com o banco de dados
        $pdo = new PDO("mysql:host=localhost;dbname= curso", "root", "");

        // Recupera todas as categorias
        $sql = "SELECT * FROM instrutor";
        $resultado = $pdo->query($sql);

        // Preenche o select do formulário

       foreach ($resultado as $instrutor) {
        echo "<option value='" . $instrutor["instrutor_id"] . "'>" . $instrutor["instrutor_nome"] . "</option>";
        }
        ?>


        
       

    </select><br><br>

    <label for="imagem">Imagem de capa</label><br><br>
    <input type="file" name="imagem" id="imagem" required>

</form>
