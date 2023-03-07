<?php
require_once "db.php";
$resposta = '';
if(isset($_POST['id'])){
    $variavel = $_POST['id'];
    $cmd = $pdo->prepare("SELECT *, p.descricao AS des, p.id AS ID FROM Produtos p INNER JOIN categorias  c on c.id = p.fk_categoria LIMIT $variavel");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $cat){
        $resposta .='
            <tr>
                <td>'.$cat['id'].'</td>
                <td>'.$cat['nome'].'</td>
                <td>'.$cat['categorias'].'</td>
                <td>'.$cat['quantidade'].'</td>
                <td>'.mb_strimwidth($cat['des'],0,60,"...").'</td>
                <td><button>active</button></td>
                <td><button><a href="DetalheProduto.php?url='.$cat['id'].'">Detalhes</a></button></td>
            </tr>
        ';
    }


}else{
    $cmd = $pdo->prepare("SELECT *, p.descricao AS des, p.id AS ID FROM Produtos p INNER JOIN categorias  c on c.id = p.fk_categoria LIMIT 5");
    $cmd->execute();
    $dados = $cmd->fetchAll();



    if(empty($dados)){
        $resposta .= 'Tabela Vazia';
    }else{
        foreach($dados as $cat){
            $resposta .='
            <tr>
                <td>'.$cat['ID'].'</td>
                <td>'.$cat['nome'].'</td>
                <td>'.$cat['categorias'].'</td>
                <td>'.$cat['quantidade'].'</td>
                <td>'.mb_strimwidth($cat['des'],0,60,"...").'</td>
                <td><button>active</button></td>
                <td><button><a href="DetalheProduto.php?url='.$cat['ID'].'">Detalhes</a></button></td>
            </tr>
            ';
        }
    }
}
echo $resposta;

?>