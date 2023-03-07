<?php
include_once "php/db.php";
include_once "php/session.php";
include_once "php/index.php";
 
$id = $_SESSION['Admin'];
$cmd = $pdo->query("SELECT * FROM usuarios  where id = '$id'");
$dados = $cmd->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="#"><h2>Ferragem Macoda</h2></a>
            </div>
            <form action="">
                <input type="text" name="buscar" id="" placeholder="Pesquisa os produtos que precisas">
            </form>
            <div class="login">
                <p>Bem vindo (a) <?=$dados4['nome']?></p>
                <a href="php/sair.php"><img src="../public/images/sair.png" alt=""></a>
            </div>
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="index.php"><img src="../public/images/home.png" alt=""> Dashboard</a></li>
                    <li><a href="categorias.php"><img src="../public/images/categoria.png" alt="">Cadastrar Categorias</a></li>
                    <li ><a href="produtos.php"><img src="../public/images/add.png" alt="">Cadastrar Produto</a></li>
                    <li><a href="rendimento.html"><img src="../public/images/money.png" alt="">Rendimento Em caixa</a></li>
                    <li><a href="#"><img src="../public/images/clientes.png" alt="">Clientes Cadastrados</a></li>
                    <li><a href="#"><img src="../public/images/add.png" alt="">Notificações do Sistema</a></li>
                    <li class="ative"><a href="perfil.php"><img src="../public/images/user.png" alt="">Perfil</a></li>
                </ul>
            </nav>
            <section>
                <article id="Content">
                    <div id="menu">
                        <button><a href="addProduto.php">Adicionar Produto</a></button>
                    </div>
                    <table>
                    <tr class="top"><td>Dados</td><td>Detalhes</td></tr>
                        <tr><td class="left">ID</td><td><?= $dados['id'] ?></td></tr>
                        <tr><td class="left">Nome</td><td><?= $dados['nome'] ?></td></tr>
                        <tr><td class="left">Apelido</td><td><?= $dados['apelido'] ?></td></tr>
                        <tr><td class="left">E-mail</td><td><?= $dados['email'] ?></td></tr>
                        <tr><td class="left">Nivel de Acesso</td><td><?= $dados['nivel'] ?></td></tr>
                        <tr><td class="left">Senha</td><td><?= $dados['senha'] ?></td></tr>
                        <tr><td class="left">Action</td><td><button>Edit</button> <button>Delete</button></td></tr>
                    </table>  
                </article>
            </section>
        </main>
    </div>
    
</body>
</html>