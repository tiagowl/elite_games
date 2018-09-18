<div>
    
    <a href="index.php"><button>Início</button></a> |
    <a href="produtos.php"><button>Games</button></a> |
    <a href="categorias.php"><button>Categorias</button></a> |
    <a href="carrinho.php"><button>Carrinho</button></a> |
    <a href="frm_cliente.php"><button>Cadastre-se</button></a> 
    
    
    <?php
        if( session_status() !=PHP_SESSION_ACTIVE ) {
            session_start();
        }
        
        if( isset($_SESSION['logado'] ) && 
                $_SESSION['logado'] == TRUE ) {
    ?>
    
    
    <a href="plataformas.php"><button>Plataforma</button></a> | 
    <a href="clientes.php"><button>Clientes</button></a>  |
    <a href="pedidos.php"><button>Pedidos</button></a> |
    <a href="sair.php"><button>Sair</button></a> <br><br> 
    
    <?php
    echo 'Olá, '.$_SESSION['nomeCliente'];
    
                } else {
            
                
    ?>
    
    <br>
    <br>
    
    <form action="login.php" method="POST">
        <input type="text" name="login" placeholder="Login"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="submit" value="Entrar"/>
        
        
    </form>
    
    <?php
        }
    ?>

</div>
