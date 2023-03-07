<?php
session_start();
include_once "php/db.php";
include_once "php/index.php";
    $resposta = '';
    $cmd = $pdo->prepare("SELECT * FROM categorias");
    $cmd->execute();
    $dados = $cmd->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/addProduto.css">
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
                    <li ><a href="categorias.php"><img src="../public/images/categoria.png" alt="">Cadastrar Categorias</a></li>
                    <li class="ative"><a href="produtos.php"><img src="../public/images/add.png" alt="">Cadastrar Produto</a></li>
                    <li><a href="#"><img src="../public/images/money.png" alt="">Rendimento Em caixa</a></li>
                    <li><a href="#"><img src="../public/images/clientes.png" alt="">Clientes Cadastrados</a></li>
                    <li><a href="#"><img src="../public/images/add.png" alt="">Notificações do Sistema</a></li>
                    <li><a href="perfil.php"><img src="../public/images/user.png" alt="">Perfil</a></li>
                </ul>
            </nav>
            <section>
                <article id="Content">
                    <div id="menu">
                        <button><a href="produtos.php">back</a></button>
                    </div>
                    <div class="col mx-4 resp" id="resp" ></div>
                    <form action="" id="addProduto">
                        <div class="col">
                            <label for="">Nome do Produto</label>
                            <input type="text" name="nome" id="" value="" min="0" placeholder="Digite o nome da Categoria">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Categoria do Produto</label>
                            <select name="categoria" id="cate" class="form-select" id="categoria">
                             <!-- Categoria vindo com o ajax -->
                             <option value="">Categoria</option>
                             <?php foreach($dados as $cat){ ?> <option value="<?= $cat['id'] ?>"><?= $cat['categorias'] ?></option> <?php } ?>
                          </select>
                        </div>     
                        <div class="col mt-3">
                            <label for="" class="form-label">Quantidade</label>
                            <input type="number" name="Quantidade" id="Quantidade" class="form-control" placeholder="Quantidade">
                        </div>                           
                        <div class="col">
                            <label for="" class="form-label">Max Unidade</label>
                            <input type="number" name="max" id="max" class="form-control" placeholder="unidade">
                        </div>
                        <div class="col">
                            <label for="" class="form-label"> Min Unidade</label>
                            <input type="number" name="min" id="min" class="form-control" placeholder="unidade">
                        </div>
                        <div class="col">
                            <label for="" class="form-label mt-3">Preço Por Unidade</label>
                            <input type="number" name="preco" id="preco" class="form-control" placeholder="Preço">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Imagens</label>
                            <input type="file" name="imagem[]" multiple id="img" class="form-control" placeholder="unidade">
                        </div>
                        <div class="col">
                            <label for="">Descricao do Produto</label>
                            <textarea name="Descricao" id="" cols="30" rows="10" placeholder="Escrever uma breve descricao da categoria introduzida"></textarea>
                        </div> 
                        <div class="col">
                            <input type="submit" name="" id="" value="Registar Categoria">
                        </div>                               
                    </form>  
                        
                </article>
            </section>
        </main>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/produto.js"></script>
    <script>
         $(document).on('submit', '#addProduto',function(e){
            e.preventDefault();
            // alert("bem vindo ao jquery")
            $.ajax({
                url: 'php/addProduto.php',
                method: 'POST',
                data: new FormData(this), 
                contentType: false,
                cache: false,
                processData: false,
            }).done(function(data){
                $(".resp").html(data)
            })
        })
        
        



    </script>
</body>
</html>