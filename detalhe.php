<?php
    session_start();
    include_once "public/classes/detalhes.php";
    $sessao = ''; 
    $dado = ''; 
    if(isset($_SESSION['cliente'])){ $sessao = $_SESSION['cliente']; } 
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Produtos</title>
    <link rel="stylesheet" href="public/css/estilo.css">
    <link rel="stylesheet" href="public/css/produto.css">
</head>
<script>
    function ConfrimDelete(){
        var resposta = confirm("Estas seguro que desejas compras");
        if(resposta == true){
            return true
        }else{
            return false;
        }
    }
</script>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <h2><a href="#">AGencia DeV</a></h2>
                </div>
            
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="#">Produtos</a></li>
                    <li><a href="#">Categorias</a></li>
                    <?php if(isset($_SESSION['Admin'])): ?>
                        <li><a href="admin/index.php">Admin</a></li>
                    <?php endif ?>
                </ul>
                <div class="carrinho">
                    <a href="carrinho.php"><img src="public/images/car.png" alt=""><p>1</p></a>
                    <a href="login.html"><img src="public/images/user.png" alt=""></a>
                </div>
            </nav>
            <div class="destaque">
                <h2>Ajude o Nosso Canal<br>A Crescer Aqui<br>No Youtube</h2>
                <p>Inscreva-se no canal e deixar o seu Like</p>
            </div>
        </header>
        <main>
            <section>
                <article>
                    <h3>Detalhes</h3>
                    <div class="produto">
                        <div class="img">
                            <div class="imgs">
                                <?php foreach($capa as $c): ?>
                                    <img src="upload/<?=$c['images']?>" alt="">
                                <?php endforeach ?>
                            </div>
                            <div class="imgss">
                            <?php foreach($imgs as $c): ?>
                                <img src="upload/<?=$c['images']?>" alt="">
                            <?php endforeach ?>
                            </div>
                        </div>
                        <div class="detalhes">
                        
                        <?php foreach($produtos as $c): 
                            $preco = $c['min'] * $c['preco'];

                            $id = $c['id'];
                            $cmd = $pdo->query("SELECT * FROM gostei where id_produto = '$id'  and id_usuario = '$sessao'");
                            if($cmd->rowCount() > 0){
                                $dado = '<img src="public/images/gosteiPreto.png" alt="">';
                            }else{
                                $dado = '<img src="public/images/heart-shape-outline.png" alt="">';
                            }
                            
                            ?>
                            <input type="hidden"   id="produto" value="<?=$c['id']?>">
                            <input type="hidden"   id="user" value="<?=$sessao?>">
                            <h4><?=$c['nome']?></h4>
                            <p>Cada Unidade <?=$c['preco']?>$</p>
                            <p><?=$c['min']?> Unidades <?=$preco?>$</p>
                            <p><button class="like" id="1"><?=$dado?></button> <?=$t?> Like</p>
                            <div class="btns">
                                <button onclick=" return ConfrimDelete()">Comprar</button>
                                <button class="btn"><img src="public/images/car.png" alt=""></button>
                            </div>
                            <div class="descricao">
                                <h4>Descricao</h4>
                                <p><?=$c['descricao']?></p>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    
                    <div class="comentarios">
                        <h4>Comentarios</h4>
                        <div class="coment">
                            <form action="">
                                <div class="col">
                                    <label for="">Nome:</label>
                                    <input type="text" name="nome" id="" placeholder="Digite o seu Email">
                                </div>
                                
                                <div class="col">
                                    <label for="">Comente:</label>
                                    <textarea name="Comente" id="" cols="30" rows="10" placeholder="escreva o seu comentario"></textarea>
                                </div>
                                <div class="col">
                                    <input type="submit" name="Enviar" id="" value="Enviar">
                                </div>  
                            </form> 
                            <div class="coments">
                                <div class="coment1">
                                    <p>Chester nogar macoda 22/11/2022</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi debitis omnis quo quis reiciendis consectetur veniam, necessitatibus adipisci nemo, aperiam consequatur soluta fuga placeat eos quidem neque maxime exercitationem quia?</p>
                                    <button>replace</button>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </div>
                                <div class="coment1">
                                    <p>Chester nogar macoda 22/11/2022</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi </p>
                                    <button>replace</button>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

            </section>
        </main>
    </div>
    <script src="public/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('.imgss img').removeClass('active');
            $('.imgss img').click(function(){
                var cover = $('.imgs img');
                var thumb = $(this).attr('src');
                
                if(cover.attr('src') !== thumb){
                    cover.fadeTo('200','0', function(){
                        cover.attr('src', thumb);
                        cover.fadeTo('150','1');
                    });

                    $('.imgss img').removeClass('active');
                    $(this).addClass('active');
                }
            });

            

            $(document).on("click",".like",function(e){
                e.preventDefault()
            //    alert("bem vindo")
                var id = $(this).attr("id")
                // var dt = $(this).attr("data-value")
                var produto = $('#produto').val();
                var user = $('#user').val();
               
                // alert(produto)
                $.ajax({
                    url: 'public/classes/like.php',
                    method: 'POST',
                    data: {
                        id:id,
                        user:user,
                        produto:produto
                    }
                }).done(function(data){
                    $(".resp").html(data)
                    // alert(data)
                })
                setTimeout(location.reload(),100)

            })
             
        });
    </script>
</body>
</html>