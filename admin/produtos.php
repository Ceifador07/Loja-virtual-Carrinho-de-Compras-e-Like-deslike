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
                    <li><a href="index.php"><img src="../public/images/home.png" alt=""> Dashboard</a></li>
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
                    <select name="var" id="var" class="form-select" >
                        <option value="5">5</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                    <table>
                        <tr class="top">
                            <td>id</td>
                            <td>Nome Produto</td>
                            <td>Categoria</td>
                            <td>Quantidade</td>
                            <td>Preco</td>
                            <td>Descricao</td>
                            <td colspan="2">Action</td> 
                        </tr>
                        <tbody class="Pro">
                             
                        </tbody>
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



            $(document).on("change","#var", function(e){
                e.preventDefault();
                // alert("bem vindo")
                const id = $(this).val();
                // alert("bem vindo ao ajax")
                $.ajax({
                    url: 'php/tabelaPro.php',
                    method: 'POST',
                    data:  {
                        id:id
                    }
                }).done(function(data){
                    $(".tab").html(data)
                    
                })
            })
        })

    </script>
</body>
</html>