<?php
include_once 'model/clsCliente.php';


if (isset($_REQUEST['inserir'])) {
    $cli = new Cliente();
    $cli->nome = $_POST['nome'];

    $cli->cpf = $_POST['cpf'];

    $cli->email = $_POST['email'];

    $cli->endereco = $_POST['endereco'];

    $cli->senha = $_POST['senha'];


    $cli->inserir();
}

if (isset($_REQUEST['excluir'])) {

    $cli = new Cliente();
    $cli->id = $_REQUEST['id'];

        $cli->excluir();
    
}

if (isset($_REQUEST['editar'])) {
    $cliente = new Cliente();
    $cliente->id = $_REQUEST['id'];
    $cliente->nome = $_POST['nome'];
    $cliente->cpf = $_POST['cpf'];
    $cliente->email = $_POST['email'];  
    $cliente->endereco = $_POST['endereco'];
    $cliente->senha = $_POST['senha'];

    $cliente->editar();
}

header("Location: produtos.php");
?>
