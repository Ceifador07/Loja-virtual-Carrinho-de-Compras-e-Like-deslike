<?php
session_start();
// require_once "../db/db.php";    
include_once "db.php";    
// echo "Bem vindo ao Ajax";
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
// echo $email;
$erros = array();
$saida = '';

if(empty($email)){
    $erros['e'] = 'Preencha o Campo E-mail';
}elseif(empty($senha)){
    $erros['e'] = 'Preencha o Campo Senha';
}else{
    $query = "SELECT * FROM usuarios WHERE email='$email' AND senha=md5($senha)";
    $cmd = $pdo->query($query);
    $dados = $cmd->fetch();
    if($cmd->rowCount() > 0){
        
        if($dados['nivel'] == 1){
            $_SESSION['Admin'] = $dados['id'];
            $saida = '<p class="Sucess">'.$dados['nome'] .' Logado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("admin/index.php");}, 3000);</script><?php
        }else{
            $_SESSION['cliente'] = $dados['id'];
            $saida = '<p class="Sucess">Logado Com sucesso</p>';
            ?><script>setTimeout(function(){location.assign("index.html");}, 3000);</script><?php
        }
    }else{
        $saida ='<p class="Error">Email ou Senha Incorrecta</p>';
    }
    
}
if(isset($erros['e'])){
    $saida ='<p class="Error">'.$erros['e'].'</p>';
}

echo $saida;
?>