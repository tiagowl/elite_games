<?php


class Conexao {
    
    private function abrir(){
        $local = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "elitegames_web2";
        
        $link = mysqli_connect($local, $usuario, $senha, $banco);
        return $link;
        
    }
    
    private function fechar($link){
        mysqli_close($link);
    }
    
    public function executar($sql){
        $link = $this->abrir();
        
        if($link){
            mysqli_query($link, $sql);
            $this->fechar($link);
            
        }
    }
    
        public function executarComRetornoId($sql){
        $link = $this->abrir();
        
        if($link){
            mysqli_query($link, $sql);
            $id = mysqli_insert_id($link);
            $this->fechar($link);
            return $id;
        } else {
            return NULL;
        }
    }
    
    public function consultar($sql){
        $link = $this->abrir();
        
        if($link){
            $result = mysqli_query($link, $sql);
            $this->fechar($link);
            return $result;
    } else {
        return FALSE;    
    }
    
}
}
