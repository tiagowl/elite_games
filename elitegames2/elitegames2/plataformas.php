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
        
        include_once 'model/clsPlataforma.php';
        
                 echo '<center><h1>Plataformas</h1></center>';  
        echo '<br>';
        echo '<center>';
        require 'menu.php';
        echo '</center>';
        
    
        ?>
        <br><br>
        
        <center>
        <form action="salvar_plataforma.php?<?php echo $action; ?>" method="POST">
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
            
                $lista = Plataforma::listar();
                
                foreach($lista as $pla) {
                    echo '<tr>';
                        echo '   <td>'.$pla->id.'</td>';
                        echo '   <td>'.$pla->nome.'</td>';
                        echo '   <td><a href="?editar&id='.$pla->id.'&nome='.$pla->nome.'" ><button>Editar</button></a></td>';
                        echo '   <td><a href="salvar_plataforma.php?excluir&id='.$pla->id.'"><button>Excluir</button></a></td>';

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