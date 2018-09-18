<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
        <body style="background-image: url('imagens/fundo.jpg'); background-size: 100%; background-repeat: no-repeat;">
        
        
        <?php
        echo'<center>';
            echo'<h1>Cadastro Cliente</h1>';
            require 'menu.php';
        echo'</center>';
        ?>
    
    
        <center>    
    <form method="POST" action="salvar_cliente.php?inserir"> <br><br>
    
    <label>Nome: </label>
    <input type="text" name="nome" required placeholder="Digite seu nome:"/> <br><br>
    
    <label>E-mail: </label>
    <input type="email" name="email" required placeholder="paulinho123@exemplo.com"/> <br><br>
    
    <label>Endereço: </label>
    <input type="text" name="endereco" placeholder="Rua dos bôbos, 666 Ap. 666"/> <br><br>
    
    <label>CPF: </label>
    <input type="text" name="cpf" required maxlength="15" placeholder="111.222.333-44"/> <br><br>
      
    <label>Senha: </label>
    <input type="password" name="senha" required size="25" placeholder="Digite sua senha:"/> <br><br>
    <label>Repita sua senha: </label>
    <input type="password" name="senha2" required size="25" placeholder="Digite novamente sua senha:"/> <br><br>
    
    <input type="submit" value="Salvar"/>
    <input type="reset" value="Limpar"/>
    </form>
        </center>
    
        <?php 
        require 'rodape.php';
        ?>
        
        
    </body>
</html>
