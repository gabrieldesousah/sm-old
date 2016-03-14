<?php
class UsersModel extends Model{
    public $_table = "users";
    
    public function listUsers( $qtd, $offset = null ){
        return $this->read( $this->_table, null, $qtd, $offset, 'id DESC' );
    }
    
    public function insere(){
        $dados=array(
            "titulo" => "trarara",
            "descricao" => "pararatibum"
            );
        return $this->insert( $this->_table, $dados);
    }
    
    public function atualiza(){
        $dados=array(
            "titulo" => "atualiando",
            "descricao" => "descricao"
            );
        return $this->update( $this->_table, $dados, "id=3");
    }
    
    public function apaga(){
        return $this->delete( $this->_table, "id = 2");
    }
}