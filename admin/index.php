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
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="#"><h2>AGencia DeV</h2></a>
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
                    <li class="ative"><a href="#"><img src="../public/images/home.png" alt=""> Dashboard</a></li>
                    <li><a href="categorias.php"><img src="../public/images/categoria.png" alt="">Cadastrar Categorias</a></li>
                    <li><a href="produtos.php"><img src="../public/images/add.png" alt="">Cadastrar Produto</a></li>
                    <li><a href="#"><img src="../public/images/money.png" alt="">Rendimento Em caixa</a></li>
                    <li><a href="#"><img src="../public/images/clientes.png" alt="">Clientes Cadastrados</a></li>
                    <li><a href="#"><img src="../public/images/add.png" alt="">Notificações do Sistema</a></li>
                    <li><a href="perfil.php"><img src="../public/images/user.png" alt="">Perfil</a></li>
                </ul>
            </nav>
            <section>
                <article id="Content">
                    <div class="detalhes">
                        <a href="produtos.html">
                            <div class="top">
                                <div class="img">
                                    <img src="../public/images/produ.png" alt="">
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Produtos</h4>
                                    <p><?=$allPro?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total de produtos no Sistema</p>
                            </div>
                        </a>
                        <a href="categorias.php">
                            <div class="top">
                                <div class="img">
                                    <img src="../public/images/categoria.png" alt="">
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Categorias</h4>
                                    <p><?=$allCate ?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Categorias no Sistema</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="top">
                                <div class="img">
                                    <img src="../public/images/clientes.png" alt="">
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Clientes</h4>
                                    <p><?=$allClient?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Clientes Cadastrados</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="top">
                                <div class="img">
                                    <img src="../public/images/folder-19.png" alt="">
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Comentarios</h4>
                                    <p>20</p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Cotações impressas</p>
                            </div>
                        </a>
                        
                        <a href="#">
                            <div class="top">
                                <div class="img">
                                    <img src="../public/images/money.png" alt="">
                                </div>
                                <div class="desc">
                                    <h4 class="title">Total Saldo</h4>
                                    <p>0,00</p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Total Valor Em Caixa</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="top">
                                <div class="img">
                                    <img src="../public/images/sort-by-attributes.png" alt="">
                                </div>
                                <div class="desc">
                                    <h4 class="title">Notificações do Sistema</h4>
                                    <p><?=$allNotifi?></p>
                                </div>
                            </div> 
                            <div class="bottom">
                                <p>Notificações de Produtos</p>
                            </div>
                        </a>
                        <!-- <a href="#"><div> 
                            <p class="title">Total Categorias</p>
                            <p>4</p>
                        </div></a>
                        <a href="#"><div> 
                            <p class="title">Total Mensal</p>
                            <p>$110</p>
                        </div></a>
                        <a href="#"><div>  
                            <p class="title">Total Anual</p>
                            <p>$300</p>
                        </div></a> -->
                    </div>
            </article>
            </section>
        </main>
    </div>
</body>
</html>