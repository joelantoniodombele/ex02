<?php
require_once 'connection.php';

function uploadImagem($arquivo, $diretorioDestino) {
    // ... código da função uploadImagem ...

    // Obtém o nome do arquivo enviado
    $nomeArquivo = $arquivo['name'];

    // Define o caminho completo da imagem após o upload
    $caminho_completo = 'uploads/imagens/cursos/' . $nomeArquivo;

    return $caminho_completo;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new DB();
    $conn = $database->connect();

    // Valida os dados do formulário

    $nome_curso = trim($_POST["nome_curso"]);
    $categoria_id = $_POST["categoria"];
    $instrutor_id = $_POST["instrutor"];
    $descricao = trim($_POST["descricao"]);
    $imagem = $_FILES["imagem"];

    // ... (código de validação dos campos do formulário) ...

    if (empty($nome_curso) || $categoria_id === "" || $instrutor_id === "" || $imagem["error"] !== UPLOAD_ERR_OK || $imagem["size"] > 1000000) {
        echo "Erro nos dados do formulário.";
        exit;
    }
    // Executa a função de upload da imagem
    $arquivo = $_FILES['imagem'];
    $diretorioDestino = 'uploads/imagens/cursos'; // Substitua pelo seu diretório real

    $resultadoUpload = uploadImagem($arquivo, $diretorioDestino);

    // Verifica o resultado do upload da imagem
    if (strpos('$resultadoUpload', 'Erro') !== false) {
        echo $resultadoUpload;
        exit;
    }

    // Insere o caminho do arquivo de imagem no banco de dados
    $caminho_completo = $resultadoUpload; // Defina o caminho completo da imagem após o upload

    $stmt = $conn->prepare("INSERT INTO cursos (nome, categoria_id, instrutor_id, descricao, imagem) VALUES (:nome, :categoria_id, :instrutor_id, :descricao, :imagem)");

    $stmt->bindParam(':nome', $nome_curso);
    $stmt->bindParam(':categoria_id', $categoria_id);
    $stmt->bindParam(':instrutor_id', $instrutor_id);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':imagem', $caminho_completo);

    if ($stmt->execute()) {
        $mensagem = "Cadastro feito com sucesso!";
        echo "<script type='text/javascript'> alert('$mensagem');</script>";
    } else {
        echo 'Erro ao criar registro.';
    }
}
?>
<?php

    // ... (seu código de inserção no banco de dados)
if ($stmt->execute()) {
    // Obtenha o ID do registro inserido
    $ultimo_id = $conn->lastInsertId();
    // Redirecione para a página de exibição da imagem com o ID do registro
    header("Location: exibe_imagem.php?id=$ultimo_id");
    exit;
}


?>




