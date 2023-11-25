<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
    <nav class="navBar">
            <h1 class="logo">EAD</h1>
            <ul class="nav-links">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Cursos</a></li>
                <li><a href="#">Categorias</a></li>
                <li><a href="#" class="ctn">Login</a></li>
                <li><a href="#" class="ctn">sign in</a></li>
            </ul>
            <img src="../imagens/menu-aberto.png" alt="" class="menu-btn">

    </nav>
    <header>
        <div class="header-content">
            <h2>Faça os melhores Cursos Aqui</h2>
            <div class="line"></div>
            <h1>Encontre a tua inspiração</h1>
            <a href="#" class="ctn">Aprenda mais</a>
        </div>
    </header>
    <script>
        const menuBnt = document.querySelector('.menu-bnt')
        const navlinks = document.querySelector('.nav-links')

        menuBnt.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })
    </script>
    
</body>
</html>