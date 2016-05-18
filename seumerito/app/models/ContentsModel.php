<?php
class ContentsModel extends Model{
    
    public $_table = "articles";
    
    public function listPosts( $qtd, $offset = null ){
    	$search = "dicas";
        return $this->read($this->_table, 'DISTINCT content', "content != ''", $qtd, $offset, 'content ASC' );
    }
    public function listProfessors( $qtd, $offset = null ){
    	$search = "dicas";
        return $this->read($this->_table, 'DISTINCT professor', "professor != ''", $qtd, $offset, 'professor ASC' );
    }
}