
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
                    <a href="index.php">Home</a>
                </li>

                <li>
                    <a href="listarReceitas.html">Todas as Receitas</a>
                </li>
                <li>
                    <a href="cadastroReceita.html">Nova Receita</a>
                </li>

                
                <li>
                    <a href="listarReceitas.html">Receitas</a>
                </li>
               
                <li>
                    <a href="refeicao.html">Refeição</a>
                </li>
                
                </li>
                <li>
                    <a href="usuarios.html">Chefs</a>
                </li>
                <li>
                    <a href="sobre.html">Sobre</a>
                </li>
            </ul>
    </div>

        <div class="container">
            <a href="receita.html">
            <div class="receita">
                <div class="recei-titu">
                    <h1>Bolo de Cenoura</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/Receitas/Bolo de cenoura.jpg" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"> Bolos e Tortas</span></div> <div class="campo"> Dificuldade:<span id="info"> Fácil</span></div>
                        <div class="campo">Tempo:<span id="info"> 1h 30min</span></div> <div class="campo">Autor:<span id="info"> Luis Felipe</span></div>
                </div>
            </div>
            </a>
            <a href="receita.html">
            <div class="receita">
                <div class="recei-titu">
                    <h1>Macarrão Alho e Óleo</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/Receitas/Macarrão alho e óleo.png" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"></span> Massas</div> <div class="campo">Dificuldade:<span id="info"> Média</span></div>
                        <div class="campo">Tempo:<span id="info"> 1 h</span></div> <div class="campo">Autor:<span id="info"> Luis Felipe</span></div>
                </div>
            </div>
            </a>
            <a href="receita.html">
            <div class="receita">
                <div class="recei-titu">
                    <h1>Suco de Laranja</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/Receitas/Suco de laranja.png" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"></span> Bebidas</div> <div class="campo">Dificuldade:<span id="info"> Fácil</span></div>
                        <div class="campo">Preparo:<span id="info"> 30min</span></div> <div class="campo">Autor:<span id="info"> Luis Felipe</span></div>
                </div>
            </div>
            </a>
            <a href="receita.html">
            <div class="receita">
                <div class="recei-titu">
                    <h1>Torta de Limão</h1>
                </div>
                <div id="card-img">
                    <img src="IMG/Receitas/Torta de limão fácil.jpg" alt="" width="493px" height="300px">
                </div>
                <div class="recei_info">
                        <div class="campo">Categoria: <span id="info"> Bolos e Tortas</span></div> <div class="campo">Dificuldade:<span id="info"> Média</span></div>
                        <div class="campo">Preparo:<span id="info"> 2h</span></div> <div class="campo">Autor:<span id="info"> Luis Felipe</span></div>
                </div>
            </div>
            </a>
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