<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
        <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">
        
        
        <?php
                echo '<center><h1>Clientes</h1></center>';
        echo '<br>';
        echo '<center>';
        require 'menu.php';
        echo '</center>';       
        ?>
            
            <br><br>
        
            <center>
        <a href="frm_cliente.php">
            <button>Cadastrar Cliente</button>
        </a>
            </center>
        
        <br>

        
        <center>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Endereço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php
include_once 'model/clsCliente.php';

$lista = Cliente::listar();

foreach ($lista as $clie) {
    echo '<tr>';

    echo '  <td>' . $clie->id . '</td>';
    echo '  <td>' . $clie->nome . '</td>';
    echo '  <td>' . $clie->cpf . '</td>';
    echo '  <td>' . $clie->email . '</td>';
    echo '  <td>' . $clie->endereco . '</td>';

    
    $desabilitar = "disabled";
     if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ){
    $desabilitar = "";
     }
    
    
    echo '  <td>
                <a href="frm_cliente.php?editar&id='.$clie->id.'">
                    <button '.$desabilitar.' >Editar</button>
                </a>
            </td>   ';
    
    
        echo '  <td>
                <a href="salvar_cliente.php?excluir&id='.$clie->id.'">
                    <button '.$desabilitar.' >Excluir</button>
                </a>
            </td>   ';
        
/*                echo '  <td>
               <a href="carrinho.php?adicionar&id='.$prod->id.'">
                    <button>Comprar</button>
                </a>
            </td>   ';
*/
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
