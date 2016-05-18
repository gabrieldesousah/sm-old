<?php
class UsersModel extends Model{
    public $_table = "users";
    
    public function listUsers( $qtd, $offset = null ){
        return $this->read( $this->_table, null, $qtd, $offset, 'id DESC' );
    }
}