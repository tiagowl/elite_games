<?php 
$nome = "";
$preco = "";
$quantidade = "";
$categoria = 0;
$perecivel = 0;
$foto = "sem_foto.png";
$action = "inserir";

if( isset($_REQUEST['editar'] ) ) {
    
    include_once 'model/clsProduto.php';
    
    $id = $_REQUEST['id'];
    $action = "editar&id=".$id;
    
    $pro = Produto::getProdutoById($id);
    
    $nome = $pro->nome;
    $preco = $pro->preco;
    $quantidade = $pro->quantidade;
    $plataforma = $pro->plataforma->id;
    $foto = $pro->foto;
    $categoria = $pro->categoria->id;
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
        echo'<center>';
        echo'<h1>Cadastro Game</h1>';
        require 'menu.php';
        echo'</center>';
        ?>


    <center>    
        <form method="POST" action="salvar_produto.php?<?php echo $action;?>" enctype="multipart/form-data"> <br><br>

            <label>Nome: </label>
            <input type="text" name="nome" required value="<?php echo $nome;?>" placeholder="Digite o nome do Game:"/> <br> <br>

            <label>Preço: R$</label>
            <input type="number" name="preco" required value="<?php echo $preco;?>" step="any" placeholder="R$0,00"/> <br> <br>
            

            <label>Quantidade: </label>
            <input type="number" name="quantidade" required value="<?php echo $quantidade;?>" step="any" placeholder="0,00"/> <br><br>
            
            
            
            <label>Plataforma: </label>
            <select name="plataforma">
                <option value="0">Selecione...</option>

                <?php
                include_once 'model/clsPlataforma.php';
                $lista = Plataforma::listar();
                
                foreach ($lista as $pla) {
                    
                    if($pla->id == $plataforma){
                        
                        echo '<option value="'.$pla->id.'" selected  >'.$pla->nome.'</option>';
                        
                    } else {
                        
                        echo '<option value="'.$pla->id.'">'.$pla->nome.'</option>';
                    }
                    
                }
                ?>
                
            </select> <br><br>
            
         
                        
                 

            <label>Categoria: </label>
            <select name="categoria">
                <option value="0">Selecione...</option>

                <?php
                include_once 'model/clsCategoria.php';
                $lista = Categoria::listar();
                
                foreach ($lista as $cat) {
                    
                    if($cat->id == $categoria){
                        
                        echo '<option value="'.$cat->id.'" selected  >'.$cat->nome.'</option>';
                        
                    } else {
                        
                        echo '<option value="'.$cat->id.'">'.$cat->nome.'</option>';
                    }
                    
                }
                ?>
                
            </select> <br><br>

            <label>Foto: </label>
            <?php   
                if( isset($_REQUEST['editar'] ) ) {
                    echo '<img src="fotos/'.$foto.'" width="50px" />';
                }
            
            ?>
            <input type="file" name="foto"/> <br><br>

            <input type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        </form>
    </center>

<?php
require 'rodape.php';
?>


</body>
</html>
