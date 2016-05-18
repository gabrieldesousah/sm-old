<?php
class SearchModel extends Model{
    
    public $_table = "articles";
    
    public function listPosts( $search, $qtd, $offset = null ){

        return $this->read($this->_table, '*', "content LIKE '%$search%' OR professor LIKE '%$search%' OR title LIKE '%$search%'", $qtd, $offset, 'content ASC' );
    }
}