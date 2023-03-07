<?php
require_once "db.php";

$categoria = addslashes($_POST['nomeCategoria']);
$descricao = addslashes($_POST['Descricao']);

$error = array();
$resposta = '';

if(empty($categoria)){
    $error['aplicar'] = 'Digite o campo categoria';
}elseif(empty($descricao)){
    $error['aplicar'] = 'Digite o campo Descricao da Categoria';
}else{
    $cmd = $pdo->prepare("INSERT INTO categorias(categorias, descricao) values(:c, :d)");
    $cmd->bindValue(":c",$categoria);
    $cmd->bindValue(":d",$descricao);
    $cmd->execute();
    if($cmd->rowCount() > 0){
        $resposta = "<p class='Sucess'>cadastrado com sucesso</p>";
        ?>
        <script>setTimeout(function(){location.assign("../admin/categorias.php");}, 3000);</script>
        <?php  
    }else{
        $resposta = "<p class='Error'>falha no cadastro</p>";
    }   
}
if(isset($error['aplicar'])){
    $resposta .= '<p class="Error">'.$error['aplicar'].'</p>';
}

echo $resposta;



?>
