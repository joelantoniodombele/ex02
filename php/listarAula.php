<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas do Curso</title>
</head>

<body>
    <h1>Aulas do Curso</h1>

    <main>

    
        <ul>
            <?php
            require_once 'connection.php';

            // Verificar se o ID do curso está presente na URL
            if (isset($_GET['id_curso'])) {
                $id_curso = $_GET['id_curso'];


                echo "<li><a href='addAula.php?id_curso=$id_curso'>Adicionar Aulas</a></li>";


                // Criar um objeto de conexão
                $database = new DB();
                $conn = $database->connect();

                // Consulta ao banco de dados para obter as aulas do curso específico
                $stmt = $conn->prepare("SELECT id, nome, link_aula FROM aulas WHERE curso_id = :id_curso");
                $stmt->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
                $stmt->execute();
                $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Exibir a lista de aulas do curso específico
                foreach ($aulas as $aula) {
                    $nome_aula = htmlspecialchars($aula['nome']); // Sanitização para evitar problemas de segurança
                    $link_aula = htmlspecialchars($aula['link_aula']);

                    echo "<li><a href='$link_aula'>$nome_aula</a></li>";
                }
            } else {
                echo "<p>ID do curso não fornecido.</p>";
            }
            ?>
        </ul>
    </main>
</body>

</html>
