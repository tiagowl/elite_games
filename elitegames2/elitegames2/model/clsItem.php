<?php

include_once 'clsConexao.php';

class Item {
    public $id;
    public $pedido;
    public $produto;
    public $preco;
    public $quantidade;
    
    public static function listar($idPedido){
        $sql = "SELECT i.id, p.nome, i.preco, i.quantidade, i.codProduto, p.foto
                FROM itens i
                INNER JOIN produtos p
                ON i.codProduto = p.id
                WHERE i.codPedido = ".$idPedido;
        
                $conn = new Conexao();
        $result = $conn->consultar($sql);
        
        $lista = new ArrayObject();
        while (list($id, $nome, $preco, $qtd, $idProduto, $foto) = mysqli_fetch_row($result) ){
            $item = new Item();
            $item->id = $id;
            $item->quantidade = $qtd;
            $item->preco = $preco;
            
            $pro = new Produto();
            $pro->id = $idProduto;
            $pro->nome = $nome;
            $pro->foto = $foto;
            $item->produto = $pro;
            
            $lista->append($item);
        }
        return $lista;
    }
    


    public function inserir(){
        $sql = "INSERT INTO itens (
                 codPedido, codProduto, preco, quantidade )
                 Values (
                            ".$this->pedido." ,
                            ".$this->produto." ,
                            ".$this->preco." ,
                            ".$this->quantidade."
                        )";
        
                        $conn = new Conexao();
                        $conn->executar($sql);
    }
            
    function getId() {
        return $this->id;
    }

    function getPedido() {
        return $this->pedido;
    }

    function getProduto() {
        return $this->produto;
    }

    function getPreco() {
        return $this->preco;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


    
}
