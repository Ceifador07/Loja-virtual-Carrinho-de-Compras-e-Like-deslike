<?php
    include_once "db.php";
    
    $cmd = $pdo->query("SELECT id FROM card_temporary ");
    // $cmd->execute();
    $dados = $cmd->fetchAll();
    // var_dump($dados);
    $saida = count($dados);

    echo $saida;
?>