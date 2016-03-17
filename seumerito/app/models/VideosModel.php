<?php
class VideosModel extends Model{
    
    public $_table = "videos";
    
    public function listCourses( $qtd, $offset = null ){
        return $this->read($this->_table, 'DISTINCT content', "content != ''", $qtd, $offset, 'module ASC' );
    }
    
    public function listPosts( $qtd, $where = null, $offset = null ){
        return $this->read($this->_table, '*', $where, $qtd, $offset, 'id ASC' );
    }

}