<?php
include_once "db.php";
    
    $cmd = $pdo->prepare("SELECT * FROM card_temporary ");
    $cmd->execute();
    $dados = $cmd->fetchAll();

    $resposta ='';
    if($dados > 0){
        foreach($dados as $cat){
            $resposta .='
          
                <tr>
                    <td><img src="upload/'.$cat['images'].'" alt=""></td>
                    <td>'.$cat['nome'].'</td>

                    <td>
                    
                    <button class="min" data-value="-1" data-id="'.$cat['fk_id'].'" id="'.$cat['preco'].'">-</button>
                    
                    <input type="number" name="quantidade" id="quantidade"class="acesso" value="'.$cat['quantidade'].'" data-id="'.$cat['PrecoPorUnidade'].'" class="input">
                    
                    <button class="max" data-value="+1" data-id="'.$cat['fk_id'].'" id="'.$cat['preco'].'" >+</button></td>


                    <td class="price">'.number_format($cat['preco'],00.0).'</td>
                    <td><button class="Excluir" data-id="'.$cat['id'].'"><img src="public/images/remove-button.png" alt=""></button></td>
                </tr>
               
            ';
        }
    }else{
        $resposta = "Vazio";
    }

    echo $resposta;
?>
