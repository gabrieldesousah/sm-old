<?php
class PaperModel extends Model{
    
    public $_table = "paper";
    
    public function listPapers( $author, $qtd, $offset = null ){
        return $this->read($this->_table, "*", "author_id = $author", $qtd, $offset, 'date ASC' );
    }
    
    public function materialData( $id ){
        return $this->read( $this->_table, '*', "id = $id" );
    }
    
    public function listMessagesFollow( $author, $qtd, $offset = null ){

        return $this->read($this->_table, "*", "author = $author", $qtd, $offset, 'date ASC' );
    }
    
}