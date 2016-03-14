<?php
class SearchModel extends Model{
    
    public $_table = "articles";
    
    public function listPosts( $search, $qtd, $offset = null ){

        return $this->read($this->_table, '*', "content LIKE '%$search%' OR professor LIKE '%$search%' OR title LIKE '%$search%'", $qtd, $offset, 'content ASC' );
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