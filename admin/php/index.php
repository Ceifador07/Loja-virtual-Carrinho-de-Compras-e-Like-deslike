<?php
    include_once "php/db.php";

    $id = $_SESSION['Admin'];

    $cmd = $pdo->query("SELECT id FROM produtos");
    $dados = $cmd->fetchAll();
    $allPro = count($dados);

    $cmd = $pdo->query("SELECT id FROM categorias");
    $dados1 = $cmd->fetchAll();
    $allCate = count($dados1);

    $cmd = $pdo->query("SELECT id FROM usuarios where nivel = '' ");
    $dados2 = $cmd->fetchAll();
    $allClient = count($dados2);

    $cmd = $pdo->query("SELECT id FROM notificacao ");
    $dados3 = $cmd->fetchAll();
    $allNotifi = count($dados3);

    $cmd = $pdo->query("SELECT nome FROM usuarios where id = '$id'");
    $dados4 = $cmd->fetch();
    


?>