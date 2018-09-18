<?php

include_once 'clsConexao.php';


class Cliente {
    
    public $id;
    public $nome;
    public $cpf;
    public $email;
    public $endereco;
    public $senha;

    
    
        public function inserir() {
        $sql = "INSERT INTO clientes
               ( nome, cpf, email, endereco,  senha) 
               Values ( 
                '" . $this->nome . "' ,
                '" . $this->cpf . "' ,
                '" . $this->email . "' ,
                '" . $this->endereco . "',
                '" . $this->senha . "'
                );";

        $conn = new Conexao();
        $conn->executar($sql);
    }
    
        public function editar() {
        $sql = "UPDATE clientes SET

                nome = '" . $this->nome . "' ,
                cpf = " . $this->cpf . " ,
                email = '".$this->email."' ,
                endereco = " . $this->endereco . " ,
                senha = " . $this->senha . "
                WHERE id = " . $this->id;

        $conn = new Conexao();
        $conn->executar($sql);
        }
        
            public function excluir() {
        $sql = "DELETE FROM clientes
                WHERE id = " . $this->id;
        $conn = new Conexao();
        $conn->executar($sql);
    }   
        
                public static function getProdutoById($id) {
            $sql = "SELECT * FROM clientes WHERE id = ".$id;
            $conn = new Conexao();
            $result = $conn->consultar($sql);
            $array = mysqli_fetch_assoc($result);
            
            $cliente = new Cliente();            
            $cliente->id = $array['id'];
            $cliente->nome = $array['nome'];
            $cliente->cpf = $array['cpf'];
            $cliente->email = $array['email'];
            $cliente->endereco = $array['endereco'];
            $cliente->senha = $array['senha'];
            
            // $cat = new Categoria();
            //$cat->id = $array['codCategoria'];
            //$produto->categoria = $cat;
            
            return $cliente;
        }
    
    
    public static function logar($login, $senha){
        $sql = "SELECT id, nome FROM clientes 
                WHERE senha = '".$senha."' AND
                ( cpf = '".$login."' OR
                email = '".$login."' ) ";
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        
        if(mysqli_num_rows($result) > 0 ) {
            
            $array = mysqli_fetch_assoc($result);
            $cliente = new Cliente();
            $cliente->id = $array['id'];
            $cliente->nome = $array['nome'];
            return $cliente;
            
        } else {
            
            return NULL;
            
        }
    }
    
            public static function listar() {
        $sql = "SELECT c.id, c.nome, c.cpf, c.email, c.endereco, c.senha
            FROM clientes c
            ORDER BY c.nome ";

        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $lista = new ArrayObject();

        while (list($_id, $_nome, $_cpf, $_email, $_endereco, $_senha) = mysqli_fetch_row($result)) {

            $cli = new Cliente();
            $cli->id = $_id;
            $cli->nome = $_nome;
            $cli->cpf = $_cpf;
            $cli->email = $_email;
            $cli->endereco = $_endereco;
            $cli->senha = $_senha;


            $lista->append($cli);
        }

        return $lista;
    }
            
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getEndereco() {
        return $this->endereco;
    }



    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }


    function setSenha($senha) {
        $this->senha = $senha;
    }

//adicionar no listar 
             // INNER JOIN categorias c
             // ON p.codCategoria = c.id
}
