<?php
session_start();
include_once "db.php";
$saida = '';
$id = $_POST['id'];
$Qt = $_POST['quantidade'];
 
$cmd = $pdo->query("SELECT fk_id FROM card_temporary where fk_id= $id ");
$linha = $cmd->rowCount();


if($linha == 0){
    $_SESSION['card'] = rand(10000,100000000);
    $cmd = $pdo->query("SELECT *,(
    SELECT images from images where fk_produtos = produtos.id LIMIT 1 ) as images FROM produtos where id = '$id' ");
    $dados = $cmd->fetch();
    $sessao = $_SESSION['card'] = rand(999,99999999);
    $nome = $dados['nome'];
    $quantidade = $dados['quantidade'] - $Qt;
    $max = $dados['max'];
    $min= $dados['min'];
    $preco= $dados['preco'] * $Qt;
    $por= $dados['preco'] ;
    $descricao = $dados['descricao'];
    $fk_categoria = $dados['fk_categoria'];
    $images = $dados['images'];

    $cmd = $pdo->prepare("INSERT INTO card_temporary(nome, quantidade,stocke, max, min,preco,PrecoPorUnidade, descricao, fk_categoria, fk_id, sessao,images) values(:n,:q,:st,:m,:mi,:p,:por,:D,:fk,:fid,:se,:img)");
    $cmd->bindValue(":n",$nome);
    $cmd->bindValue(":q",$Qt);
    $cmd->bindValue(":st",$quantidade);
    $cmd->bindValue(":m",$max);
    $cmd->bindValue(":mi",$min);
    $cmd->bindValue(":p",$preco);
    $cmd->bindValue(":por",$por);
    $cmd->bindValue(":D",$descricao);
    $cmd->bindValue(":fk",$fk_categoria);
    $cmd->bindValue(":fid",$id );
    $cmd->bindValue(":se",$sessao);
    $cmd->bindValue(":img",$images);
    $cmd->execute();
    
    if($cmd->rowCount() > 0){
        $saida .= "Adicionado com sucesso ao carrinho";
    }else{
        $saida .= "Falha ao adicionar ao carrinho";
    }

}else{
    $cmd = $pdo->query("SELECT quantidade,stocke,PrecoPorUnidade FROM card_temporary where fk_id = '$id' ");
    $dados = $cmd->fetch();

    $QtUpdate = $dados['quantidade'] + $Qt;
    $stocke = $dados['stocke'] - $Qt;
    $preco = $dados['PrecoPorUnidade'] * $QtUpdate;
  
    $cmd = $pdo->query("UPDATE card_temporary SET stocke = '$stocke', quantidade = '$QtUpdate', preco = '$preco' where fk_id='$id'");

    if($cmd->rowCount() > 0){
        $saida .= "Actualizado com sucesso";
    }else{
        $saida .= "Falha ao actualizar o carrinho";
    }
}


echo $saida;




?>
