
<?php
session_start();

if (!isset($_SESSION["logado"])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
       <header>
        <div class="itens-header">
            <div>
                <img src="IMG/chefs-delight-restaurant-logo_11024933.png!sw800" alt="">
                <div class="titulo">
                    <p>QUASETUDO</p>
                </div>
                <div class="titulo2">
                    <p>GOSTOSO</p>
                </div>
                <div class="faixa"></div>
                <div class="bloco"></div>
            </div>
           <div class="icon-usuario">
                 <a href="perfil.html"><img src="IMG/4092564-about-mobile-ui-profile-ui-user-website_114033.png" alt=""></a>
           </div>
        </div>
    </header>
    <main>
         <div class="nav">
            <ul>
                  <li>
                    <a href="index.html">Home</a>
                </li>

                <li>
                    <a href="listarReceitas.html">Todas as Receitas</a>
                </li>

                <li>
                    <a href="listarReceitas.html">Suas Receitas</a>
                </li>
               
                <li>
                    <a href="refeicao.html">Refeição</a>
                </li>
                
                </li>
                <li>
                    <a href="usuarios.html">Chefs</a>
                </li>
            </ul>
    </div>

        <div class="container">
            <a href="receita.html">
            <div class="receita">
                <div class="recei-titu">
                    <h1>Titulo</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/images.jpg" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"></span></div> <div class="campo">Dificuldade:<span id="info"></span></div>
                        <div class="campo">Preparo:<span id="info"></span></div> <div class="campo">Autor:<span id="info"></span></div>
                </div>
            </div>
            </a>
            <div class="receita">
                <div class="recei-titu">
                    <h1>Titulo</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/images.jpg" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"></span></div> <div class="campo">Dificuldade:<span id="info"></span></div>
                        <div class="campo">Preparo:<span id="info"></span></div> <div class="campo">Autor:<span id="info"></span></div>
                </div>
            </div>
            <div class="receita">
                <div class="recei-titu">
                    <h1>Titulo</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/images.jpg" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"></span></div> <div class="campo">Dificuldade:<span id="info"></span></div>
                        <div class="campo">Preparo:<span id="info"></span></div> <div class="campo">Autor:<span id="info"></span></div>
                </div>
            </div>
            <div class="receita">
                <div class="recei-titu">
                    <h1>Titulo</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/images.jpg" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"></span></div> <div class="campo">Dificuldade:<span id="info"></span></div>
                        <div class="campo">Preparo:<span id="info"></span></div> <div class="campo">Autor:<span id="info"></span></div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div>
            Copyright
        </div>
    </footer>
    <script>

    </script>
</body>
</html>