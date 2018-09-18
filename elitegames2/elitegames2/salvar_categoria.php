<?php

include_once 'model/clsCategoria.php';

if( isset($_REQUEST['inserir'] ) ){
   $cat = new Categoria();
   $cat-> nome = $_POST['nome'];
   $cat->inserir();
}


if( isset($_REQUEST['editar'] ) ){
    $id = $_REQUEST['id'];
    $cat = new Categoria();
    $cat->id = $id;
    $cat->nome = $_POST['nome'];
    $cat->editar();
    
}

if( isset($_REQUEST['excluir'] ) ){
    $id = $_REQUEST['id'];
    $cat = new Categoria();
    $cat->id = $id;
    $cat->excluir();

}

header("Location: categorias.php");

