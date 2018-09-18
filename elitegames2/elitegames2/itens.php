<?php

 session_start();
 if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ){
     
 

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body bgcolor="#256">
        

        <?php
            echo '<center><h1>Itens do Pedido</h1></center>'; 
        echo '<br>';
        echo '<center>';
        require 'menu.php';
        echo '</center>';
        
        ?>
        
        
        <br>
        <br>

        <table border="1">
            <tr>
                <th>Id</th>                
                <th>Foto</th>                
                <th>Forma de Pagamento</th>                
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            
            <?php
            
                    include_once 'model/clsItem.php';
                    include_once 'model/clsProduto.php';
                    
                    $lista = Item::listar( $_REQUEST['idPedido']);
                    
                    foreach ($lista as $item){
                        echo '<tr>';
                        echo '      <td>'.$item->produto->id.'</td>';
                        echo '      <td> <img width="100px" height="100px" src="fotos/'.$item->produto->foto.'" /> </td>';
                        echo '      <td>'.$item->produto->nome.'</td>';
                        echo '      <td>'.$item->preco.'</td>';
                        echo '      <td>'.$item->quantidade.'</td>';
                        $subtotal = $item->preco * $item->quantidade;
                        echo '      <td>'.$subtotal.'</td>';
                        echo '</tr>';
                    }
            
            ?>
            
        </table>      
        
        <?php
        require 'rodape.php';

        ?>
    </body>
</html>
    
<?php
            } else {
                
                header("Location: index.php");
                
}
?>