<?php
require_once "db.php";
$resposta = '';
if(isset($_POST['id'])){
    $variavel = $_POST['id'];
    $cmd = $pdo->prepare("SELECT * FROM categorias LIMIT $variavel");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $cat){
        $resposta .='
        <tr>
            <td>'.$cat['id'].'</td>
            <td>'.$cat['categorias'].'</td>
            <td>'.mb_strimwidth($cat['descricao'],0,60,"...").'</td>
            <td><button>active</button></td>
            <td><button><a href="#">Detalhes</a></button></td>
        </tr>
        ';
    }


}else{
    $cmd = $pdo->prepare("SELECT * FROM categorias LIMIT 5");
    $cmd->execute();
    $dados = $cmd->fetchAll();



    if(empty($dados)){
        $resposta .= 'Tabela Vazia';
    }else{
        foreach($dados as $cat){
            $resposta .='
            <tr>
                <td>'.$cat['id'].'</td>
                <td>'.$cat['categorias'].'</td>
                <td>'.mb_strimwidth($cat['descricao'],0,60,"...").'</td>
                <td><button><a href="addCategoria.php?id='.$cat['id'].'">Editar</a></button></td>
                <td><button><a href="addCategoria.php?id='.$cat['id'].'">Deletar</a></button></td>
            </tr>
            ';
        }
    }
}
echo $resposta;

?>