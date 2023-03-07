<?php
session_start();
require_once "db.php";
    
    $cmd = $pdo->prepare("SELECT *,(
    SELECT images from images where fk_produtos = produtos.id LIMIT 1
    ) as images
    FROM produtos ");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    $resposta = '';
    $sessao = '';
    $dado = '';
  
 
    // $dado = '<img src="public/images/heart-shape-silhouette.png" alt="">';
    if(isset($_SESSION['cliente'])){
        $sessao = $_SESSION['cliente'];
        
    }else{
            $dado = '<img src="public/images/heart-shape-outline.png" alt="">';
    }
    
    foreach($dados as $p){
            $preco = $p['min'] * $p['preco'];
            $id = $p['id'];
            $cmd = $pdo->query("SELECT * FROM gostei where id_produto = '$id'  and id_usuario = '$sessao'");
            if($cmd->rowCount() > 0){
                $dado = '<img src="public/images/gosteiPreto.png" alt="">';
            }else{
                $dado = '<img src="public/images/heart-shape-outline.png" alt="">';
            }
        $resposta .='
        <div class="card">
            <a href="detalhe.php?id='.$p['id'].'">
                    <img src="upload/'.$p['images'].'" alt="">
                <div class="text">
                <p>'.$p['nome'].'</p>
                '.$p['descricao'].'
                </div>
            </a>
            <input type="hidden"   id="produto'.$p["id"].'" value="'.$p['id'].'">
            <input type="hidden"   id="user'.$p["id"].'" value="'.$sessao.'">
            <div class="bottom">
                <h3>'.$p['nome'].'</h3>
                <p>Unidades<input type="number" name="quantidade" id="quantidade'.$p["id"].'" value="'.$p['min'].'" max="'.$p['max'].'" min="'.$p['min'].'"><button class="like" id="1" data-value="'.$p["id"].'">'.$dado.'</button></p>
                <p class="min">Cada Unidade 500$</p>
                <p class="min">Min '.$p['min'].' Unidade - '.$preco.'$</p>
                <button class="btn" id="'.$p['id'].'"><img src="public/images/car.png" alt=""></button>
            </div>   
        </div> 
                ';
    }



echo $resposta;
?>

