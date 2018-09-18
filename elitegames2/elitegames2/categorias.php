<?php

 session_start();
 
 if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ){
     
 

?>

<?php

    $id = 0;
    $nome = "";
    $action = "inserir";
    
    if(isset($_REQUEST['editar'] ) ){
        $id = $_REQUEST['id'];
        $nome = $_REQUEST['nome'];
        $action = "editar&id=".$id;
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">>
        
        
        <?php
        
        include_once 'model/clsCategoria.php';
        
                 echo '<center><h1>Categorias</h1></center>';  
        echo '<br>';
        echo '<center>';
        require 'menu.php';
        echo '</center>';
        
    
        ?>
        <br><br>
        <center>
        <form action="salvar_categoria.php?<?php echo $action; ?>" method="POST">
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $nome; ?>" required/>
            <input type="submit" value="Salvar"/>
        </form>
        
        <hr>

        <br>
        <br>

        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            </center>
            
            <?php
            
                $lista = Categoria::listar();
                
                foreach($lista as $cat) {
                    echo '<tr>';
                        echo '   <td>'.$cat->id.'</td>';
                        echo '   <td>'.$cat->nome.'</td>';
                        echo '   <td><a href="?editar&id='.$cat->id.'&nome='.$cat->nome.'" ><button>Editar</button></a></td>';
                        echo '   <td><a href="salvar_categoria.php?excluir&id='.$cat->id.'"><button>Excluir</button></a></td>';

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