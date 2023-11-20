<link rel="stylesheet" href="../css/suzana.css">
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







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
</head>
<body class="listCourse">
    <main>
        <?php
        require_once 'connection.php'; // Inclua a classe de conexão com o banco de dados

        // Criar um objeto de conexão
        $database = new DB();
        $conn = $database->connect();

        // Consulta para selecionar todos os cursos
        $query = "SELECT id, nome FROM cursos"; // Ajuste a consulta para pegar apenas o ID e o nome do curso
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // Verificar se existem registros
        if ($stmt->rowCount() > 0) {
            echo "<h1>Lista de Cursos</h1>";
            echo "<ul>";
            
            // Loop para exibir os registros como links
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id_curso = $row['id'];
                $nome_curso = $row['nome'];
                
                // Cria um link dinâmico para a página de aulas por curso
                echo "<li><a href='listarAula.php?id_curso=$id_curso'>$nome_curso</a></li>";
            }
            
            echo "</ul>";
        } else {
            echo "Nenhum curso encontrado.";
        }
        ?>
    </main>
</body>
</html>
