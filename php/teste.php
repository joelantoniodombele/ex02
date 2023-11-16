<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new DB();
    $conn = $database->connect();

    // Valida os dados do formulário
    $nome_curso = trim($_POST["nome_curso"]);
    $categoria_id = $_POST["categoria"];
    $instrutor_id = $_POST["instrutor"];
    $descricao = trim($_POST["descricao"]);
    $imagem = $_FILES["imagem"];

    if (empty($nome_curso) || $categoria_id === "" || $instrutor_id === "" || $imagem["error"] !== UPLOAD_ERR_OK || $imagem["size"] > 1000000) {
        echo "Erro nos dados do formulário.";
        exit;
    }

    $pasta = "uploads/imagens/cursos";
    $caminho_completo = $pasta . "/" . basename($imagem["name"]);

    // Verifica o tipo de arquivo antes de mover para o destino
    $extensoes_permitidas = array('jpg', 'jpeg', 'png', 'gif');
    $extensao_arquivo = strtolower(pathinfo($caminho_completo, PATHINFO_EXTENSION));

    if (!in_array($extensao_arquivo, $extensoes_permitidas)) {
        echo "Tipo de arquivo não permitido.";
        exit;
    }

    // Verifica se o arquivo já existe antes de mover
    if (file_exists($caminho_completo)) {
        echo "O arquivo já existe.";
        exit;
    }

    if (!move_uploaded_file($imagem["tmp_name"], $caminho_completo)) {
      If (!move_uploaded_file($imagem["tmp_name"], $caminho_completo)) {
        switch ($imagem['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "O arquivo excede o limite definido na configuração do PHP (upload_max_filesize).";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "O arquivo enviado excede o limite definido no formulário HTML.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "O upload do arquivo foi feito parcialmente.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "Nenhum arquivo foi enviado.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Pasta temporária ausente.";
                break;
        case UPLOAD_ERR_CANT_WRITE:
            echo "Falha ao escrever o arquivo no disco.";
            break;
        case UPLOAD_ERR_EXTENSION:
            echo "Uma extensão do PHP interrompeu o upload.";
            break;
        default:
            echo "Ocorreu um erro desconhecido ao enviar o arquivo de imagem.";
            break;
    }
    exit;
  
  
  }
    }

    // Insere o caminho do arquivo de imagem no banco de dados
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
