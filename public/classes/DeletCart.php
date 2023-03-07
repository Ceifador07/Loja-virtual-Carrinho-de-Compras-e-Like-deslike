<?php
    include_once "db.php";
    $saida = '';
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $cmd = $pdo->query("DELETE FROM card_temporary WHERE id = '$id'");
        if($cmd->rowCount() > 0){
            $saida .='Deletado com sucesso';
        }else{
            $saida .='Falha ao Deletar';
        }
    }else{
        $cmd = $pdo->query("DELETE FROM card_temporary ");
        if($cmd->rowCount() > 0){
            $saida .='Deletado com sucesso';
        }else{
            $saida .='Falha ao Deletar';
        }
    }
    
    echo $saida;
?>