<?php
class MeterModel extends Model{

    public function listRecords(){
        $reader = $this->read("records", '*', "id = 1");
        return $reader[0]["number"];
    }
    
    
    public function insert_action($action, $file_id){
    	
        $this->tableName = "actions";
        
        $sessionHelper = new SessionHelper();
        
        $authCheck = $sessionHelper->checkSession( "userAuth" );
        $userData = $sessionHelper->selectSession( "userData" );
            
        date_default_timezone_set('America/Sao_Paulo');
           
	   	$data["datetime"] = date('Y-m-d H:i:s', time());
	   	$data["user_id"] = $userData["user_id"];
	   	$data["action"] = $action;
	   	$data["file_id"] = $file_id;
	   	
	   	$db = new Model();

        $where = "user_id = '".$data["user_id"]."' AND file_id = '".$data["file_id"]."'";
        $sql = $db->read($this->tableName, '*', $where, '1');

        if( count($sql) > 0 ){
            return $this->update( $this->tableName, $data, $where);
        }else{
        	return $db->insert($this->tableName, $data);
        }
	

	    

    }
    
    public function update_num_down(){
    	$this->_table = "records";
    	$id = 1;
    	
    	$reader = $this->read($this->_table, '*', "id = $id");
        $last = $reader[0]["number"];
    	
    	//$last = self::listRecords();

        $dados=array(
            "number" => $last + 1
        );
        
        return $this->update( $this->_table, $dados, "id = $id");
    }
    
    public function update_num_viewers_files(){
    	$this->_table = "records";
    	$id = 3;
    	
    	$reader = $this->read($this->_table, '*', "id = $id");
        $last = $reader[0]["number"];
    	
    	//$last = self::listRecords();

        $dados=array(
            "number" => $last + 1
        );
        
        return $this->update( $this->_table, $dados, "id = $id");
    }
}