<?php
class MessagesModel extends Model{
    
    public $_table = "messages";
    
    public function listMessages( $qtd, $offset = null ){

        return $this->read($this->_table, "*", "status = '0' and post_id != '0'", $qtd, $offset, 'date ASC' );
    }
    
    public function listMessagesFollow( $author, $qtd, $offset = null ){

        return $this->read($this->_table, "*", "author = $author", $qtd, $offset, 'date ASC' );
    }
    
}