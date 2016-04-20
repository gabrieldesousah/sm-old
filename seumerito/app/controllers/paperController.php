<?php
class Paper extends Controller{

    
    public function index_action(){
        $this->view('paper', $data);
    }
    
    public function material(){
		$this->redirectorHelper = new RedirectorHelper();

    	$data = $this->getParams();
        $id = $data["id"];

    	$material = new PaperModel();
    	
        
        $list_data = $material->materialData($id);
        $data['listData'] = $list_data;
        $this->materialData = $data['listData'];

        
        $this->view('paper', $data);
	}
    
	public function send(){
		
		$this->sessionHelper = new SessionHelper();
        $userData =  $this->sessionHelper->selectSession("userData");
		$table = "paper";

		$title         = $_POST["title"];
		$text          = $_POST["text"];
		$author        = $userData["user_id"];
		
		date_default_timezone_set('America/Sao_Paulo');
   		$date = date('Y-m-d H:i:s', time());
		        
		$data = array(
          "title"   => $title,
          "text"    => $text,
          "author_id"  => $author,
          "date"    => $date
		            
		);
		$db = new Model();	

	    $db->insert($table,$data);
	       	$this->message = "<h2>Texto enviado</h2>";
        	$message = $this->message;
        	$this->view('message', $message);
    }
}