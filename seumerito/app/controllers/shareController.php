<?php
class Share extends Controller{
	public $material;
	public $materialData;
	
	public function material(){
		$posts = new ContentsModel();

        $list_posts = $posts->listProfessors(160);
        $data['list_posts'] = $list_posts;
		
        $this->view('share', $material);
	}
	
	public function upload(){
		$table = "articles";
 
        
    	if( count($_FILES) > 0 ){
	        $upload = new UploadHelper();
	        $upload->setFile($_FILES['file']);
	        
	        $file_explode = explode('.',$_FILES['file']['name']);
	        $file_name = $file_explode[0];
		    $extent = strtolower(end($file_explode));
	        
	        $file_name = $file_name.'-'.md5(time()).'.'.$extent;
	        $upload->setFileName($file_name);
	        $upload->setPath("uploads/material/");
	
	        if( $upload->upload() ) {
	        
	        
	        $sessionHelper = new SessionHelper();
        
	        $authCheck = $sessionHelper->checkSession( "userAuth" );
	        $userData = $sessionHelper->selectSession( "userData" );
	        if($authCheck === false){
	            $userData["user_id"] = "";
	        }
	        	
	        	
				$type       = $_POST["type"];
		        $content    = $_POST["content"];
		        $professor  = $_POST["professor"];
		        $text       = $_POST["text"];
		        $area       = $_POST["area"];
		        $college    = $_POST["college"];
		        $unity      = $_POST["unity"];
		        $link       = $_POST["type"];
		        
		        date_default_timezone_set('America/Sao_Paulo');
   				$date = date('Y-m-d H:i:s', time());
		        
		        $data = array(
		            "type" => $type,
		            "content" => $content,
		            "author_id" => $userData["user_id"],
		            "professor" => $professor,
		            "text" => $text,
		            "area" => $area,
		            "college" => $college,
		            "unity" => $unity,
		            "link" => $link,
		            "date" => $date,
		            "name_file" => $file_name
		        );
		        $db = new Model();	
			        	
	        	
	        	
	        	
	            if($db->insert($table,$data)){
	            	echo "<br><br>
		        	Arquivo enviado. Muito obrigado e continue compartilhando (:";
		        	
		        	$this->view('share', $material);
	            }
	        }else{
	        	
	        	echo "<br><br>
	        	O arquivo não foi enviado. Tente novamente";
	        	
	        	$this->view('share', $material);
	        }
            
        }else{
        	echo 'Desculpe, não conseguimos receber o arquivo. Tente mais tarde ou nos envie no email: contato@seumerito.com, obrigado.';

        }
    }
    
    public function update(){
		$table = "articles";
 
 		$sessionHelper = new SessionHelper();
        $authCheck = $sessionHelper->checkSession( "userAuth" );
	    $userData = $sessionHelper->selectSession( "userData" );

    	if($userData["permissions"] == 0){
    		header("Location: " . ROOT);
    	}
	        	
		$type       = $_POST["type"];
		$content    = $_POST["content"];
		$professor  = $_POST["professor"];
		$area       = $_POST["area"];
		$text       = $_POST["text"];
		$college    = $_POST["college"];
		$unity      = $_POST["unity"];
		$id			= $_POST["id"];
		
		date_default_timezone_set('America/Sao_Paulo');
   		$date = date('Y-m-d H:i:s', time());
		
		$data = array(
		    "type" => $type,
		    "content" => $content,
		    "author_id" => $userData["user_id"],
		    "professor" => $professor,
		    "area" => $area,
		    "text" => $text,
		    "college" => $college,
		    "unity" => $unity,
		    "date" => $date
		);
		$db = new Model();	
				
	        	
	    $where = "id = $id";
        if($db->update($table,$data, $where)){
	       	$this->message = "Post editado.";
           	$message = $this->message;
           	$this->view('message', $message);
           	
	    }
        header("Location: " . ROOT . "page/material/id/".$id);
    }
    
    
    public function delete(){
		$table = "articles";
 
 		$sessionHelper = new SessionHelper();
        $authCheck = $sessionHelper->checkSession( "userAuth" );
	    $userData = $sessionHelper->selectSession( "userData" );

    	if($userData["permissions"] == 0){
    		header("Location: " . ROOT);
    	}
	        	
		$id			= $_POST["id"];
		
		date_default_timezone_set('America/Sao_Paulo');
   		$date = date('Y-m-d H:i:s', time());
		
		$db = new Model();	
	        	
	    $where = "id = $id";
        $db->delete($table, $where);
        $this->redirectorHelper = new RedirectorHelper();
        $this->redirectorHelper->goToController('index');
    }
}