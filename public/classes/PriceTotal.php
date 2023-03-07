<?php
    include_once "db.php";
    
    $cmd = $pdo->query("SELECT SUM(preco) AS preco FROM card_temporary ");
    // $cmd->execute();
    $dados = $cmd->fetch();
    // var_dump($dados);
    $saida = number_format($dados["preco"],00.0);

    echo $saida;
?>