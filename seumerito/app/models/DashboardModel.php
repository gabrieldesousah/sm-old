<?php
class DashboardModel extends Model{
    public $_table = "users";
    

    public function userData( $id ){
        return $this->read( $this->_table, '*', "user_id = $id" );
    }
    
}