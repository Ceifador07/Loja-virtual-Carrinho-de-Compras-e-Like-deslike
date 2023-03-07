<?php
require_once "db.php";
    $resposta = '';
    $cmd = $pdo->prepare("SELECT * FROM categorias");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $cat){
        $resposta .='
            
            <option value="'.$cat['id'].'">'.$cat['categorias'].'</option>     
        ';
    }



echo $resposta;
?>