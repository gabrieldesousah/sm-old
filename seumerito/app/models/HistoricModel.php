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
}