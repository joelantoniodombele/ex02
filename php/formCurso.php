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
