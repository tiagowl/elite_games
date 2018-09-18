<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
        <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">
        <?php
            echo '<center><h1>Finalizar Pedido</h1></center>';
        
            echo '<center>';
        require 'menu.php';
            echo '</center>';
            echo '<br>';
        
            echo '<center>';
        if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE ) {
            echo '<form action="salvar_pedido.php" method="POST" >';
            echo '  <label>Forma de Pagamento: </label>';
            echo '  <select name="pagamento" >';
            echo '      <option value="0">Selecione...</option>';
            echo '      <option value="boleto">Boleto</option>';
            echo '      <option value="debito">Cartão de Débito</option>';
            echo '      <option value="crédito">Cartão de Crédito</option>';
            echo '  </select>';
            echo '  <input type="submit" value="Finalizar" />';
            echo '</center>';
            
            
            
            
            echo '</form >';
        } else {
            echo '<h3>Você deve efetuar seu login para poder concluir a compra!</h3>';
        }
            
        ?>
    </body>
</html>
