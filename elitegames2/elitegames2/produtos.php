<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">
        <?php
        echo '<center><h1>Games</h1></center>';

        echo '<br>';
        echo '<center>';
        require 'menu.php';
        echo '</center>';
        ?>

        <a href="frm_produto.php"> <br><br><br><br>
            <center><button>Cadastrar Game</button></center>
        </a>

        <br>
        
        <center>
        <table border="3">
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Plataforma</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>Comprar</th>
            </tr>
            </center>

<?php
include_once 'model/clsProduto.php';

$lista = Produto::listar();

foreach ($lista as $pro) {
    echo '<tr>';

    echo '  <td>' . $pro->id . '</td>';
    echo '  <td><img src="fotos/' . $pro->foto . '" width="50px" /></td>';
    echo '  <td>' . $pro->nome . '</td>';
    echo '  <td>' . str_replace(".", ",", $pro->preco) . '</td>';
    echo '  <td>' . $pro->quantidade . '</td>';

    echo '  <td>' . $pro->plataforma->nome . '</td>';
    
    echo '  <td>' . $pro->categoria->nome . '</td>';
    
    $desabilitar = "disabled";
     if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ){
    $desabilitar = "";
     }
    
    
    echo '  <td>
                <a href="frm_produto.php?editar&id='.$pro->id.'">
                    <button '.$desabilitar.' >Editar</button>
                </a>
            </td>   ';
    
    
        echo '  <td>
                <a href="salvar_produto.php?excluir&id='.$pro->id.'">
                    <button '.$desabilitar.' >Excluir</button>
                </a>
            </td>   ';
        
                echo '  <td>
                <a href="carrinho.php?adicionar&id='.$pro->id.'">
                    <button>Comprar</button>
                </a>
            </td>   ';

    echo '</tr>';
}
?>

        </table>



<?php
require 'rodape.php';
?>
            
            
            
    </body>
</html>
