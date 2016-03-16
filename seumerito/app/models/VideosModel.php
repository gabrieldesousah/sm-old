<?php
class VideosModel extends Model{
    
    public $_table = "videos";
    
    public function listCourses( $qtd, $offset = null ){
        return $this->read($this->_table, 'DISTINCT course', "course != ''", $qtd, $offset, 'course ASC' );
    }
    
    public function listPosts( $qtd, $offset = null ){
        return $this->read($this->_table, '*', null, $qtd, $offset, 'course ASC' );
    }

}