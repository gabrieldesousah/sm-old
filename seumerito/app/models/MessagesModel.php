<?php
class MessagesModel extends Model{
    
    public $_table = "messages";
    
    public function listMessages( $qtd, $offset = null ){

        return $this->read($this->_table, "*", "status = '0'", $qtd, $offset, 'date ASC' );
    }
    
    public function insert(){
        $dados=array(
            "titulo" => "trarara",
            "descricao" => "pararatibum"
            );
        return $this->insert( $this->_table, $dados);
    }
    
    public function update(){
        $dados=array(
            "titulo" => "atualiando",
            "descricao" => "descricao"
            );
        return $this->update( $this->_table, $dados, "id=3");
    }
    
    public function delete(){
        return $this->delete( $this->_table, "id = 2");
    }
}