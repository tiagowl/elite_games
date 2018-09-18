<?php

session_start();

if( isset($_SESSION['logado'] ) )
    unset ( $_SESSION['logado'] );

if( isset($_SESSION['idCliente'] ) )
    unset ( $_SESSION['idCliente'] );

if( isset($_SESSION['nomeCliente'] ) )
    unset ( $_SESSION['nomeCliente'] );

session_destroy();
header("Location: index.php");