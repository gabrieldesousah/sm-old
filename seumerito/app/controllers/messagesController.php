<?php
class Messages extends Controller{

    
    public function index_action(){
		$messages = new MessagesModel();

        $list_messages = $messages->listMessages(160);
        $data['list_messages'] = $list_messages;
        
        $this->view('messages', $data);
    }
    
	public function send(){
		
		$this->sessionHelper = new SessionHelper();
        $userData =  $this->sessionHelper->selectSession("userData");
		$table = "messages";

		$message       = $_POST["message"];
		$post_id       = $_POST["id"];
		$author        = $userData["user_id"];
		
		date_default_timezone_set('America/Sao_Paulo');
   		$date = date('Y-m-d H:i:s', time());
		        
		$data = array(
          "message" => $message,
          "post_id" => $post_id,
          "author"  => $author,
          "date"    => $date
		            
		);
		$db = new Model();	
			        	
	        	
	    $db->insert($table,$data);
	       	$this->message = "<h2>Mensagem enviado, logo responderemos</h2>";
        	$message = $this->message;
        	$this->view('message', $message);
    }
}