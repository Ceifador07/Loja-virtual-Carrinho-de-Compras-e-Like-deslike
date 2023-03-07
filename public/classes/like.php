<?php
include_once "db.php";
session_start();
$saida = '';


if(isset($_POST['id']) and isset($_SESSION['cliente'])){
    // echo "gostei";
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $usuario = $_POST['user'];
    $cmd = $pdo->query("SELECT * FROM gostei WHERE id_produto = '$produto' AND id_usuario = '$usuario'");
    if($cmd->rowCount() > 0){
        $dados = $cmd->fetch();
        $id = $dados['id'];
        $cmd = $pdo->query("DELETE FROM gostei WHERE gostei.id = '$id'");

    }else{
        

        $cmd = $pdo->prepare("INSERT INTO gostei(id_produto,id_usuario,gostei) values(:n,:e,:s)");
        $cmd->bindValue(":n",$produto);
        $cmd->bindValue(":e",$usuario);
        $cmd->bindValue(":s",$id);
        $cmd->execute();
    
        if($cmd->rowCount() > 0){
                // $saida = 'Registado Com sucesso';
        }else{
            $saida = 'Falha no Like';
        }

        }
}else{
    ?><script>setTimeout(function(){location.assign("login.html");}, 100);</script><?php
}

echo $saida;
?>