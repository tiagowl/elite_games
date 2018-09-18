<?php

include_once 'clsConexao.php';
include_once 'clsCategoria.php';
include_once 'clsPlataforma.php';

class Produto {

    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $foto;
    public $categoria;
    public $plataforma;

    public function inserir() {
        $sql = "INSERT INTO produtos
               ( nome, preco, quantidade, foto, codCategoria, codPlataforma) 
               Values ( 
               '" . $this->nome . "' ,
                " . $this->preco . " ,
                " . $this->quantidade . " ,
               '" . $this->foto . "' ,
                " . $this->categoria->id . ",
                " . $this->plataforma->id . "
                );";
        //adicionar plataforma no INSERT INTO e no VALUES

        $conn = new Conexao();
        $conn->executar($sql);
    }

    public function editar() {
        $sql = "UPDATE produtos SET

                nome = '" . $this->nome . "' ,
                preco = " . $this->preco . " ,
                foto = '".$this->foto."' ,
                quantidade = " . $this->quantidade . " ,
                codCategoria = " . $this->categoria->id . "
                WHERE id = " . $this->id;
        //adicionar plataforma no update

        $conn = new Conexao();
        $conn->executar($sql);
    }

    public function excluir() {
        $sql = "DELETE FROM produtos
                WHERE id = " . $this->id;
        $conn = new Conexao();
        $conn->executar($sql);
    }

    public function getNomeFoto() {
        $sql = "SELECT foto FROM produtos
                WHERE id = " . $this->id;
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $array = mysqli_fetch_assoc($result);
        $foto = $array['foto'];
        return $foto;
        }
        
        public static function getProdutoById($id) {
            $sql = "SELECT * FROM produtos WHERE id = ".$id;
            $conn = new Conexao();
            $result = $conn->consultar($sql);
            $array = mysqli_fetch_assoc($result);
            
            $produto = new Produto();            
            $produto->id = $array['id'];
            $produto->nome = $array['nome'];
            $produto->preco = $array['preco'];
            $produto->quantidade = $array['quantidade'];
            $produto->foto = $array['foto'];
            //adicionar plataforma no getProdutoById
            
            $cat = new Categoria();
            $cat->id = $array['codCategoria'];
            $produto->categoria = $cat;
            
            return $produto;
        }

        
        public static function listar() {
        $sql = "SELECT p.id, p.nome, p.preco, p.quantidade, p.foto, p.codCategoria, c.nome, f.nome
            FROM produtos p
            INNER JOIN categorias c
            ON p.codCategoria = c.id
            INNER JOIN plataformas f
            ON f.id = p.codPlataforma
            ORDER BY p.nome ";
        //adicionar plataforma no listar

        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $lista = new ArrayObject();

        while (list($_id, $_nome, $_preco, $_qtd, $_foto, $codCat, $nome_Cat, $plataforma) = mysqli_fetch_row($result)) {
            //adicionar plataforma no list

            $pro = new Produto();
            $pro->id = $_id;
            $pro->nome = $_nome;
            $pro->preco = $_preco;
            $pro->quantidade = $_qtd;
            $pro->foto = $_foto;

            $pla = new Plataforma();
            $pla->nome = $plataforma;
            $pro->plataforma = $pla;
            
            $cat = new Categoria();
            $cat->id = $codCat;
            $cat->nome = $nome_Cat;
            $pro->categoria = $cat;

            $lista->append($pro);
        }

        return $lista;
    }
    
    
    
    

    //adicionar plataforma aqui também

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getFoto() {
        return $this->foto;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

}
