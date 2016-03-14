<?php
class HistoricModel extends Model{
    
    public $_table;
    
    public function listPosts( $qtd, $user_id, $offset = null ){
    	$this->_table = "actions";
    	
        return $this->read($this->_table, 'DISTINCT file_id, action', "user_id = $user_id", $qtd, $offset, 'datetime DESC' );
    }
    
    public function listSends( $qtd, $user_id, $offset = null ){
    	$table = "articles";
        return $this->read($table, '*', "author_id = $user_id", $qtd, $offset, 'id DESC' );
    }
    
    public function listArticles( $id ){
        return $this->read("articles", '*', "id = $id");
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