<?php
include_once "php/session.php";
include_once "php/index.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/addcategoria.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="#"><h2>Ferragem Macoda</h2></a>
            </div>
            <form action="">
                <input type="text" name="buscar" id="" placeholder="Pesquisa a categoria que precisas">
            </form>
            <div class="login">
                <p>Bem vindo (a) <?=$dados4['nome'] ?></p>
                <a href="php/sair.php"><img src="../public/images/sair.png" alt=""></a>
            </div>
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="index.php"><img src="../public/images/home.png" alt=""> Dashboard</a></li>
                    <li class="ative"><a href="categorias.php"><img src="../public/images/categoria.png" alt="">Cadastrar Categorias</a></li>
                    <li><a href="produtos.php"><img src="../public/images/add.png" alt="">Cadastrar Produto</a></li>
                    <li><a href="#"><img src="../public/images/money.png" alt="">Rendimento Em caixa</a></li>
                    <li><a href="#"><img src="../public/images/clientes.png" alt="">Clientes Cadastrados</a></li>
                    <li><a href="#"><img src="../public/images/add.png" alt="">Notificações do Sistema</a></li>
                    <li><a href="perfil.php"><img src="../public/images/user.png" alt="">Perfil</a></li>
                </ul>
            </nav>
            <section>
                <article id="Content">
                    <div id="menu">
                        <button><a href="Categorias.php">back</a></button>
                    </div>
                    <form action="" id="categoria">
                        <input type="hidden" name="" id="url" value="<?php if(isset($_GET['id'])){echo $_GET['id']; }?>">
                        <div class="resp"></div>
                        <div class="col">
                            <label for="">Nome da Categoria</label>
                            <input type="text" name="nomeCategoria" id="" value="" min="0" placeholder="Digite o nome da Categoria">
                        </div>
                        <div class="col">
                            <label for="">Descricao da Categoria</label>
                            <textarea name="Descricao" id="" cols="30" rows="10" placeholder="Escrever uma breve descricao da categoria introduzida"></textarea>
                        </div> 
                        <div class="col">
                            <label for=""></label>
                            <input type="submit" name="" id="" value="Registar Categoria">
                        </div>                               
                    </form>  
                        
                </article>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/categoria.js"></script>
</body>
</html>