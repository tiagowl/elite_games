<?php

include_once 'model/clsPedido.php';
include_once 'model/clsItem.php';
include_once 'model/clsProduto.php';

session_start();

date_default_timezone_set('America/Sao_Paulo');

$pedido = new Pedido();
$pedido->cliente = $_SESSION['idCliente'];
$pedido->data = date("Y-m-d H:i:s");
$pedido->formaPagamento = $_POST['pagamento'];

$pedido->inserir();

foreach ($_SESSION['carrinho'] as $idProduto => $qtd) {
    $item = new Item();
    $item->pedido = $pedido->id;
    $item->produto = $idProduto;
    $item->quantidade = $qtd;
    $pro = Produto::getProdutoById($idProduto);
    $item->preco = $pro->preco;
    
    $item->inserir();
}

unset($_SESSION['carrinho']);

header("Location: pedidos.php");
//echo '<a href="pedidos.php" ><button>Listar Pedidos</button></a>';