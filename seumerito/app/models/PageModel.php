<?php
class PageModel extends Model{
    public $_table = "articles";
    
    public function materialData( $id ){
        return $this->read( $this->_table, '*', "id = $id" );
    }
    
}