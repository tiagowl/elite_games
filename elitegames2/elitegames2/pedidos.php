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
        <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">
        

        <?php
            echo '<center><h1>Pedidos</h1></center>'; 
        echo '<br>';
        echo '<center>';
        require 'menu.php';
        echo '</center>';
        
        ?>
            
            <br><br>
        
            <center>
        <a href="frm_produto.php">
            <button>Cadastrar Pedido</button>
        </a>
            </center>
        
        <br>
        
        <center>
        <table border="1">
            <tr>
                <th>Id</th>                
                <th>Data</th>                
                <th>Forma de Pagamento</th>                
                <th>Nome</th>
                <th>Cliente</th>
            </tr>
            
            <?php
            
                    include_once 'model/clsPedido.php';
                    include_once 'model/clsCliente.php';
                    
                    $lista = Pedido::listar();
                    
                    foreach ($lista as $item){
                        echo '<tr>';
                        echo '      <td>'.$item->id.'</td>';
                        echo '      <td>'.$item->data.'</td>';
                        echo '      <td>'.$item->formaPagamento.'</td>';
                        echo '      <td>'.$item->cliente->nome.'</td>';
                        echo '      <td>
                                        <a href="itens.php?idPedido='.$item->id.'">
                                            <button>Abrir</button>
                                        </a>
                                    </td>';
                        echo '      <td></td>';
                        echo '</tr>';
                    }
            
            ?>
            
        </table>
            </center>
        
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