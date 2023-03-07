<?php
session_start();
include_once "db.php";         
// echo "Bem vindo ao Ajax";
$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$Csenha = addslashes($_POST['Csenha']);
// $imagem = $_FILES['imagem']['name'];
// echo $email;
$erros = array();
$saida = '';

if(empty($nome)){
    $erros['e'] = 'Preencha o Campo nome';
}elseif(empty($email)){
    $erros['e'] = 'Preencha o Campo E-mail';
}elseif(empty($senha)){
    $erros['e'] = 'Preencha o Campo Senha';
}elseif($Csenha != $senha){
    $erros['e'] = 'O Campo Senha e Confirmar senha sao Diferentes';
}else{
    $query = "INSERT INTO usuarios (nome,email,senha) values(:n,:e,:s)";
    $cmd = $pdo->prepare($query);
    $cmd->bindValue(":n",$nome);

    $cmd->bindValue(":e",$email);
    $cmd->bindValue(":s",md5($senha));
    $cmd->execute();
    if($cmd->rowCount() > 0){
            $saida = '<p class="Sucess">Registado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("login.html");}, 3000);</script><?php
    }else{
        $saida ='<p class="Error">Falha no Registo</p>';
    }
    
}
if(isset($erros['e'])){
    $saida ='<p class="Error">'.$erros['e'].'</p>';
}

echo $saida;
?>