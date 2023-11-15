<?php

// Carrega as bibliotecas necessárias
require "conexao.php";

// Valida os dados do formulário
$nome_curso = trim($_GET["nome_curso"]);
$categoria_id = $_GET["categoria"];
$instrutor_id = $_GET["instrutor"];
$descricao = trim($_GET["descricao"]);
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

$database = new DB();
$conn = $database->connect();
$sql->prepare("INSERT INTO cursos (nome, categoria_id, instrutor_id, descricao, imagem) VALUES ('" . $nome_curso . "', " . $categoria_id . ", " . $instrutor_id . ", '" . $descricao . "', '" . $imagem . "')");


$pdo->execute();
// Redireciona o usuário para a página de confirmação
header("Location: cursos.php");

?>
