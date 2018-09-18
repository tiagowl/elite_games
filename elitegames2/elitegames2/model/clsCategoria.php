<?php

include_once 'clsConexao.php';

class Categoria {
    
    public $id;
    public $nome;
    
    public function inserir(){
        $sql = " INSERT INTO categorias
                ( nome ) VALUES
                ( '".$this->nome."' );
                ";
        
        $conn = new Conexao();
        $conn->executar($sql);
    }
    
    public function editar(){
        $sql = " UPDATE categorias SET
                nome = '".$this->nome."'
                WHERE id = ".$this->id;
        
        $conn = new Conexao();
        $conn->executar($sql);  
    }
    
    public function excluir(){
            $sql = " DELETE FROM categorias
                WHERE id = ".$this->id;
        
        $conn = new Conexao();
        $conn->executar($sql);  
    }
    
    public static function listar(){
        $sql = " SELECT id, nome FROM categorias ORDER BY nome ";
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        
        $lista = new ArrayObject();
        
        while ( list( $_id , $_nome) = mysqli_fetch_row($result)  ) {
          
            $cat = new Categoria();
            $cat->id = $_id;
            $cat->nome = $_nome;
            
            $lista->append($cat);
        }
        
        return $lista;
    }

    public function getId(){
        return $this->id;
    }
    
    public function setId( $id ){
        $this->id = $id;
    }
    
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }


    
}
