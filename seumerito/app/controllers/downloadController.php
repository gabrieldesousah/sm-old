<?php
class Download extends Controller{
	public $material;
	public $materialData;
	
	public function init(){
		//Contador
		$meter = new MeterModel();
        
        $meter->update_num_down();
        
        $data = $this->getParams();
        $id = $data["id"];
        
        $sessionHelper = new SessionHelper();
        
        $authCheck = $sessionHelper->checkSession( "userAuth" );
        
        if($authCheck === true){
            $meter->insert_action("down", $id);
            
            $_SESSION['current'] = $_SERVER["REQUEST_URI"];
		    $_SESSION['current'] = "";
        }else{
        	$_SESSION['current'] = $_SERVER["REQUEST_URI"];
		    $current = $_SESSION['current'];
        }
	}
	
	public function material(){
		
		$this->auth = new AuthHelper();
		$this->auth->setLoginControllerAction('auth', 'index');
		
		if(! $this->auth->checkLogin('boolean')){
			$this->view('auth', $data);
            exit;
		}

    	$data = $this->getParams();
        $id = $data["id"];

    	$material = new PageModel();
        
        $list_data = $material->materialData($id);
        $data['listData'] = $list_data;
        $this->materialData = $data['listData'];
        
        //var_dump();
        
        
        $name = $data['listData'][0]["name_file"];
        
 
	    $name = PATH_DOCUMENT.'uploads/material/'.$name; // Aqui a gente junta o diret��rio com o nome do arquivo

 
	    header('Content-type: octet/stream');
	    header('Content-disposition: attachment; filename="'.basename($name).'";');
	    header('Content-Length: '.filesize($name));
	    readfile($name);
	    exit;
	    
	    $this->view('page', $material);
	}
}


