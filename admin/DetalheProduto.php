<?php
include_once "php/db.php";
include_once "php/index.php";

$id = $_GET['url'];
$cmd = $pdo->query("SELECT *, p.descricao AS des, p.id AS ID FROM Produtos p INNER JOIN categorias c ON p.fk_categoria = c.id where p.id = '$id'");
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
                <p>Bem vindo (a) <?=$dados4['nome'] ?></p>
                <a href="php/sair.php"><img src="../public/images/sair.png" alt=""></a>
            </div>
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="index.html"><img src="../public/images/home.png" alt=""> Dashboard</a></li>
                    <li><a href="categorias.php"><img src="../public/images/categoria.png" alt="">Cadastrar Categorias</a></li>
                    <li class="ative"><a href="#"><img src="../public/images/add.png" alt="">Cadastrar Produto</a></li>
                    <li><a href="rendimento.html"><img src="../public/images/money.png" alt="">Rendimento Em caixa</a></li>
                    <li><a href="#"><img src="../public/images/clientes.png" alt="">Clientes Cadastrados</a></li>
                    <li><a href="#"><img src="../public/images/add.png" alt="">Notificações do Sistema</a></li>
                    <li><a href="perfil.php"><img src="../public/images/user.png" alt="">Perfil</a></li>
                </ul>
            </nav>
            <section>
                <article id="Content">
                    <div id="menu">
                        <button><a href="addProduto.php">Adicionar Produto</a></button>
                    </div>
                    <table>
                    <tr class="top"><td>Detalhes</td><td>Dados</td></tr>
                        <tr><td class="left">ID</td><td><?= $dados['ID'] ?></td></tr>
                        <tr><td class="left">Nome</td><td><?= $dados['nome'] ?></td></tr>
                        <tr><td class="left">Quantidade</td><td><?= $dados['quantidade'] ?></td></tr>
                        <tr><td class="left">Maximo Unidade venda</td><td><?= $dados['max'] ?></td></tr>
                        <tr><td class="left">Minimo Unidade venda</td><td><?= $dados['min'] ?></td></tr>
                        <tr><td class="left">Preço</td><td><?= $dados['preco'] ?></td></tr>
                        <tr><td class="left">Descricao</td><td><?= $dados['des'] ?></td></tr>
                        <tr><td class="left">Categoria</td><td><?= $dados['categorias'] ?></td></tr>
                        <tr><td class="left">Codigo Barra</td><td><?= $dados['registo'] ?></td></tr>
                        <tr><td class="left">Registo</td><td><?= $dados['registo'] ?></td></tr>            
                        <tr><td class="left">Action</td><td><button>Edit</button> <button>Delete</button></td></tr>
                    </table>  
                </article>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
 
            $.ajax({
                url: 'php/tabelaPro.php',
                method: 'POST'
            }).done(function(data){
                $(".Pro").html(data)
            })
        })
    </script>
</body>
</html>