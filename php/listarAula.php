
<link rel="stylesheet" href="../css/listagem.css">
<header>
  <h1>Estudando PHP</h1>
</header>
           <main class="listarPrincipal">
                <h2>Aulas Disponiveis</h2>
                <?php
                   include 'connection.php'; // Inclua a classe de conexão com o banco de dados
                  // Criar um objeto de conexão
                  $database = new DB();
                  $conn = $database->connect();
                  // Consulta ao banco de dados para obter as aulas
                  $stmt = $conn->query("SELECT * FROM aulas");
                  $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 // Exibir a lista de aulas
                foreach ($aulas as $aula) {
                $titulo = $aula['titulo'];
                $url_aula = $aula['url_aula'];

                echo "<ul>";
                
                    echo "<li><a href='$url_aula'>$titulo</a></li><br>";
                echo "</ul>";    
                }
                ?>
            </main>

