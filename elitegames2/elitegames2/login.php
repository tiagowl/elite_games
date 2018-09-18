<?php

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    include_once 'model/clsCliente.php';
    
    $cliente = Cliente::logar($login, $senha);
    
    if( $cliente == NULL ) {
        echo '<body onload="window.history.back();" >';
    } else {
        session_start();
        
        $_SESSION['logado'] = TRUE;
        $_SESSION['idCliente'] = $cliente->id;
        $_SESSION['nomeCliente'] = $cliente->nome;
        
        header("Location: ".$_SERVER['HTTP_REFERER'] );
        
}