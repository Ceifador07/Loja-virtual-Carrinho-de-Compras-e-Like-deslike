<?php
require_once "db.php";

$nome = addslashes($_POST['nome']);
$categoria = addslashes($_POST['categoria']);
$Quantidade = addslashes($_POST['Quantidade']);
$max = addslashes($_POST['max']);
$Min = addslashes($_POST['min']);
$preco = addslashes($_POST['preco']);
$Descricao = addslashes($_POST['Descricao']);

$imagen = array();
     
if(isset($_FILES['imagem'])){
    for($i=0; $i < count($_FILES['imagem']['name']); $i++)
    {
        $img = md5($_FILES['imagem']['name'][$i].rand(1,999)).'.jpg';
        move_uploaded_file($_FILES['imagem']['tmp_name'][$i], "../../upload/".$img);

        array_push($imagen, $img);
    }
} 

$erros = array();
$saida = '';

if(empty($nome)){
    $erros['e'] = 'Preencha o Campo nome do produto';
}elseif(empty($categoria)){
    $erros['e'] = 'Escolha a categoria do Produto';
}elseif(empty($Quantidade)){
    $erros['e'] = 'Preencha o Campo Quantidade';
}elseif(empty($max)){
    $erros['e'] = 'Preencha o Campo Max unidade';
}elseif(empty($Min)){
    $erros['e'] = 'Preencha o Campo Min unidade ';
}elseif(empty($preco)){
    $erros['e'] = 'Preencha o Campo Preco por Unidade ';
}elseif(empty($Descricao)){
    $erros['e'] = 'Preencha o Campo Preco por Unidade ';
}else{
    
    $cmd = $pdo->prepare("INSERT INTO produtos(nome, quantidade, max,min,preco,descricao,fk_categoria) values(:n,:q,:m,:mi,:p,:D,:fk)");
    $cmd->bindValue(":n",$nome);
    $cmd->bindValue(":q",$Quantidade);
    $cmd->bindValue(":m",$max);
    $cmd->bindValue(":mi",$Min);
    $cmd->bindValue(":p",$preco);
    $cmd->bindValue(":D",$Descricao);
    $cmd->bindValue(":fk",$categoria);
    $cmd->execute();
    $id = $pdo->LastInsertId();
    

    if(count($imagen) > 0 ){
    
        for($i=0; $i < count($imagen); $i++){
            $img =$imagen[$i];
            $cmd = $pdo->prepare("INSERT INTO images(images, fk_produtos) values(:img, :fk)");
            $cmd->bindValue(":img", $img);
            $cmd->bindValue(":fk", $id);
            $cmd->execute();
        }
    }  

    if($cmd->rowCount() > 0){
            $saida = '<p class="Sucess">Registado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("produtos.php");}, 3000);</script><?php
    }else{
        $saida ='<p class="Error">Falha no Registo</p>';
    }
    
}
if(isset($erros['e'])){
    $saida ='<p class="Error">'.$erros['e'].'</p>';
}

echo $saida;
?>
<!-- 
$cmd = $pdo->prepare("INSERT INTO produtos (nome, quantidade,max,min,preco,descricao,fk_categoria) values(:n,:q,:m,:mi,:p,:fk)");
    $cmd->bindValue(":n",$nome);
    $cmd->bindValue(":q",$Quantidade);
    $cmd->bindValue(":m",$max);
    $cmd->bindValue(":mi",$Min);
    $cmd->bindValue(":p",$preco);
    $cmd->bindValue(":fk",$categoria);
    $cmd->execute();
    $id = $pdo->LastInsertId();

    if(count($imagen) > 0 ){
        
        for($i=0; $i < count($imagen); $i++){
            $img =$imagen[$i];
                $cmd = $pdo->prepare("INSERT INTO images(images, fk_produtos) values(:img, :fk)");
                $cmd->bindValue(":img", $img);
                $cmd->bindValue(":fk", $id);
                $cmd->execute();
            }
        } -->