<?php

include_once 'clsConexao.php';
include_once 'clsCliente.php';

class Pedido {
    public $id;
    public $data;
    public $cliente;
    public $formaPagamento;
    
    public function inserir() {
        $sql = "INSERT INTO pedidos ( data, codCliente, formaPagamento )
                VALUES (
                    '".$this->data."' ,
                     ". $this->cliente." ,
                    '".$this->formaPagamento."'
                )";
        $conn = new Conexao();
        $this->id = $conn->executarComRetornoId($sql);
    }
    
    public static function listar($idCliente = 0){
        $filtro = "";
        
        if ($idCliente > 0){
            $filtro = "WHERE p.codCliente = ".$idCliente;
        }
        
        $sql = " SELECT p.id, DATE_FORMAT(p.data,'%d-%m-%Y %H:%i:%s' ), p.formaPagamento, c.nome 
                 FROM pedidos p
                 INNER JOIN clientes c
                 ON c.id = p.codCliente ".$filtro;
        
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        
        $lista = new ArrayObject();
        while (list($id, $data, $forma, $nome) = mysqli_fetch_row($result) ){
            $ped = new Pedido();
            $ped->id = $id;
            $ped->formaPagamento = $forma;
            $ped->data = $data;
            
            $cli = new Cliente();
            $cli->nome = $nome;
            
            $ped->cliente = $cli;
            
            $lista->append($ped);
        }
        return $lista;
    }
            
    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getFormaPagamento() {
        return $this->formaPagamento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setFormaPagamento($formaPagamento) {
        $this->formaPagamento = $formaPagamento;
    }


    
}
