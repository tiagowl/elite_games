<?php
session_start();

if (isset($_REQUEST['adicionar'])) {
    $id = $_REQUEST['id'];
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] ++;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }
    header("Location: carrinho.php");
}


if (isset($_REQUEST['remover'])) {
    $id = $_REQUEST['id'];
    if ($_SESSION['carrinho'][$id] > 1) {
        $_SESSION['carrinho'][$id] --;
    } else {
        unset($_SESSION['carrinho'][$id]);
    }
    header("Location: carrinho.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_REQUEST['id'];
    unset($_SESSION['carrinho'][$id]);
    header("Location: carrinho.php");
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
        <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">
        <?php
        echo '<center>';
        echo '<h1>Carrinho de compras</h1>';
        require 'menu.php';
        echo '</center>';
        
        echo '<br><br>';
        echo '<center>';
        echo '<table border="2" >';
        echo '  <tr>';
        echo '      <th>Código</th>';
        echo '      <th>Foto</th>';
        echo '      <th>Nome</th>';
        echo '      <th>Quantidade</th>';
        echo '      <th>Preço</th>';
        echo '      <th>Subtotal</th>';
        echo '      <th>Excluir</th>';
        echo '  </tr>';
        
        
        if(isset($_SESSION['carrinho'] ) && count($_SESSION['carrinho']) > 0 ){
            
            $total = 0;
            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                include_once 'model/clsProduto.php';
                $pro = Produto::getProdutoById($id);
                $subtotal = $qtd * $pro->preco;
                $total = $total + $subtotal;
                echo '<tr>';
                echo '  <td>'.$pro->id.'</td>';
                echo '  <td> <img src="fotos/'.$pro->foto.'" width="100px" /></td>';
                echo '  <td>'.$pro->nome.'</td>';
                echo '  <td> 
                            <a href="?remover&id='.$pro->id.'" ><button>-</button></a>
                                '.$qtd.'
                            <a href="?adicionar&id='.$pro->id.'" ><button>+</button></a>
                        </td>';
                echo '  <td>'.$pro->preco.'</td>';
                echo '  <td>'.$subtotal.'</td>';
                echo '  <td><a href="?excluir&id='.$pro->id.'" ><button>Excluir</button></a></td>';
                echo '</tr>';
            }
            
            echo '<tr> 
                    <td colspan="3">Total: </td>
                    <td colspan="4"> R$ '.number_format($total, 2, ",", ".").'</td>
                  </tr>';
            
        } else {
            echo '<tr> <td colspan="7">Carrinho Vazio!</td> </tr>';
        }
        
        
                echo '<center>';
        echo '<a href="finalizar_pedido.php">
            <button>Finalizar Pedido</button>
            </a>';
        echo '</center>';
        echo '<br>';
        
        
        echo '</table>';
        echo '</center>';
        
        


        
                
        
        require 'rodape.php';
        ?>
    </body>
</html>
