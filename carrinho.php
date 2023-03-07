<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Produtos</title>
    <link rel="stylesheet" href="public/css/estilo.css">
    <link rel="stylesheet" href="public/css/carrinho.css">
    <link rel="stylesheet" href="public/css/produto.css">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <h2><a href="#">AGencia DeV</a></h2>
                </div>
            
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Produtos</a></li>
                    <li><a href="#">Categorias</a></li>
                    <?php if(isset($_SESSION['Admin'])): ?>
                    <li><a href="admin/index.php">Admin</a></li>
                    <?php endif ?>
                </ul>
                <div class="carrinho">
                    <!-- <a href="carrinho.html"><img src="public/images/car.png" alt=""><p>1</p></a> -->
                    <a href="login.html"><img src="public/images/user.png" alt=""></a>
                </div>
            </nav>
            <div class="destaque">
                <h2>Ajude o Nosso Canal<br>A Crescer Inscreva-se<br>E Deixo o Seu Like</h2>
                <p>Estamos Comprometidos em trazer conteudo de qualidade para voce</p>
            </div>
        </header>
        <main>
            <section>
                <article>
                    <h3>Carrinho de Produtos</h3>
                    <table>
                        <tr class="top">
                            <td>Imagem</td>
                            <td>Nome</td>
                            <td>Quantidade</td>
                            <td>Preco</td>
                            <td colspan="2">Acção</td>
                        </tr>
                        <tbody class="tb">
                            
                        </tbody>
                        <tfoot>
                            <tr class="bottom">
                                <td>Preço Total</td>
                                <td></td>
                                <td></td>
                                <td class="total"></td>
                                <td><button class="ExcluirTudo"><img src="public/images/remove-button.png" alt=""></button></td>
                                <td><button class="Print" target="_blank"><a href="#">Comprar</a></button></td>
                            </tr>
                        </tfoot>
                    </table>
                </article>

            </section>
        </main>
    </div>
    <script src="public/js/jquery.js"></script>
    <script src="public/js/card.js"></script>
</body>
</html>