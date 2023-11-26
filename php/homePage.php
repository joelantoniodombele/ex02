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
            <img src="../imagens/menu-aberto.png" alt="" class="menu-bnt">

    </nav>
    <header>
        <div class="header-content">
            <h2>Faça os melhores Cursos Aqui</h2>
            <div class="line"></div>
            <h1>Encontre a tua inspiração</h1>
            <a href="#" class="ctn">Aprenda mais</a>
        </div>
    </header>

    <section class="events">
        <div class="title">
            <h1>Cursos com Qualidade</h1>
            <div class="line"></div>
        </div>
        <div class="row">
            <div class="col">
                <img src="../imagens/rv.jpg" alt="">
                <h4>Realidade Virtual</h4>
                <p>Um curso que vai te ajudar a se tornar num mestre do mundo virtual e muito mais.</p>
                <a href="#" class="ctn">Inscreva-se </a>
            </div>

            <div class="col">
                <img src="../imagens/marketing.jpg" alt="">
                <h4>Marketing Digital</h4>
                <p>Um curso que vai te ajudar a se tornar num mestre do mundo virtual e muito mais.</p>
                <a href="#" class="ctn">Inscreva-se </a>
            </div>
            <div class="col">
                <img src="../imagens/yoga.jpg" alt="">
                <h4>O codigo da Hipertrofia</h4>
                <p>Um curso que vai te ajudar a se tornar num mestre do mundo virtual e muito mais.</p>
                <a href="#" class="ctn">Inscreva-se </a>
            </div>
            


        </div>
    </section>

    <section class="explore">
        <div class="explore-content">
        <h1>Explore o seu Cerebro</h1>
        <div class="line"></div>
        <p>Explore as vastidões do seu cérebro, pois é nesse território que encontramos a inspiração e a capacidade de criar mundos inteiros.</p>
        <a href="#" class="ctn">Ensine conosco</a>
        </div>
    </section>
    <section class="tours">
        <div class="row">
            <div class="col content-col">
                <h1>Cursos de tecnologias do Futuro</h1>
                <div class="line"></div>
                <p>Abra os horizontes para os cursos de tecnologias do futuro, pois são eles que moldarão o amanhã que desejamos</p>
               
                
        <a href="#" class="ctn">Explorar</a>
            </div>
            <div class="col image-col">
                <div class="image-gallery">
                   <div class="img" id="img1"></div>
                   <div class="img" id="img2"></div>
                   <div class="img" id="img3"></div>
                   <div class="img" id="img4"></div>

                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <p>Explore as capacidades do seu cerebro. Projeto desenvolvido pelo grupo nº 2</p>
        <p>Copyright @ 2023 EAD</p>
    </section>

    <script>
        const menuBnt = document.querySelector('.menu-bnt')
        const navlinks = document.querySelector('.nav-links')

        menuBnt.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })
    </script>
    
</body>
</html>