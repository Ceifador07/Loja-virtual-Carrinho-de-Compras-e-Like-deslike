<?php
include_once "db.php";

        // Script de todas as imagens 
        $id = $_GET['id'];
        $cmd = $pdo->prepare("SELECT * from images where fk_produtos = :n");
        $cmd->bindValue(":n", $id);
        $cmd->execute();
        $imgs = $cmd->fetchAll(PDO::FETCH_ASSOC);

        // script para todos os detalhes do produto

        $cmd = $pdo->prepare("SELECT * from produtos where id = :n");
        $cmd->bindValue(":n", $id);
        $cmd->execute();
        $produtos = $cmd->fetchAll(PDO::FETCH_ASSOC);

        // script para a capa do produto
        $cmd = $pdo->prepare("SELECT images from images where fk_produtos = :n LIMIT 1");
        $cmd->bindValue(":n", $id);
        $cmd->execute();
        $capa = $cmd->fetchAll(PDO::FETCH_ASSOC);

        $cmd = $pdo->prepare("SELECT gostei from gostei where id_produto = :n LIMIT 1");
        $cmd->bindValue(":n", $id);
        $cmd->execute();
        $total = $cmd->fetchAll(PDO::FETCH_ASSOC);
        $t = '';
        $t = count($total);
        

?>