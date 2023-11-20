<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudando PHP</title>
    <link rel="stylesheet" href="../css/listagem.css">
    <style>
        /* Estilos adicionais podem ser incluídos aqui, se necessário */
    </style>
</head>

<body>
    <header>
        <h1>Estudando PHP</h1>
    </header>

    <main class="listarPrincipal">
        <h2>Aulas Disponíveis</h2>
        <ul>
            <?php
            require_once 'connection.php';

            // Criar um objeto de conexão
            $database = new DB();
            $conn = $database->connect();

            // Consulta ao banco de dados para obter as aulas
            $stmt = $conn->query("SELECT * FROM aulas");
            $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Exibir a lista de aulas
            foreach ($aulas as $aula) {
                $nome = htmlspecialchars($aula['nome']); // Sanitização para evitar problemas de segurança
                $link_aula = htmlspecialchars($aula['link_aula']);

                echo "<li><a href='$link_aula'>$nome</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>
