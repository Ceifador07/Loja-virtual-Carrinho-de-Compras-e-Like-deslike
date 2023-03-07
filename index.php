<?php
session_start();
include_once "public/classes/db.php";
    if(!isset($_SESSION['card'])){
        $cmd = $pdo->query("DELETE FROM card_temporary ");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Produtos</title>
    <link rel="stylesheet" href="public/css/estilo.css">
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
                    <a href="carrinho.php"><img src="public/images/car.png" alt=""><p class="ShowCard"></p></a>
                    <a href="login.html"><img src="public/images/user.png" alt=""></a>
                </div>
            </nav>
            <div class="destaque">
                <h2>Os Melhores Tutoriais<br> E Aqui<br> Na AGencia DeV</h2>
                <p>Nao Esquece de Se inscrever no canal e deixar o seu Like</p>
                 
            </div>
        </header>
        <main>
            <section>
                <article>
                    <h2>Produtos</h2>
                    <div class="resp"></div>
                    <div class="cards pro">
                         
                    </div>
                </article>

            </section>
        </main>
    </div>

    <script src="public/js/jquery.js"></script>
    <script>
    $(document).ready(function(){
            function pro(){
                $.ajax({
                url: 'public/classes/Produtos.php',
                method: 'GET',
                }).done(function(data){
                    $(".pro").html(data)
                })
            }
            // setInterval(pro,5000);


            setTimeout(pro,100)

            $(document).on("click",".btn",function(e){
                e.preventDefault()
            //    alert("bem vindo")
                const id = $(this).attr("id")
                var quantidade = $('#quantidade'+id+"").val();
                // alert(id)
                $.ajax({
                    url: 'public/classes/cart.php',
                    method: 'POST',
                    data: {
                        quantidade: quantidade,
                        id:id
                    }
                }).done(function(data){
                    // $(".link").html(data)
                    alert(data)
                })

            })

            $(document).on("click",".like",function(e){
                e.preventDefault()
            //    alert("bem vindo")
                var id = $(this).attr("id")
                var dt = $(this).attr("data-value")
                var produto = $('#produto'+dt+"").val();
                var user = $('#user'+dt+"").val();
                setTimeout(pro,100)
                // alert(dt)
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

            })



            function ShowCard(){
                $.ajax({
                    url: 'public/classes/ShowCard.php',
                    method: 'GET',
                }).done(function(data){
                    $(".ShowCard").html(data)
                    // alert(data)
                })
            }
            setInterval(ShowCard,1000);
        })
    </script>
</body>
</html>