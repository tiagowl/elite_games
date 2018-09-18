<?php

include_once 'model/clsPlataforma.php';

if( isset($_REQUEST['inserir'] ) ){
   $cat = new Plataforma();
   $cat-> nome = $_POST['nome'];
   $cat->inserir();
}


if( isset($_REQUEST['editar'] ) ){
    $id = $_REQUEST['id'];
    $cat = new Plataforma();
    $cat->id = $id;
    $cat->nome = $_POST['nome'];
    $cat->editar();
    
}

if( isset($_REQUEST['excluir'] ) ){
    $id = $_REQUEST['id'];
    $cat = new Plataforma();
    $cat->id = $id;
    $cat->excluir();

}

header("Location: plataformas.php");

