<?php
class Videos extends Controller{
    public function index_action(){
        $posts = new VideosModel();

        $list_posts = $posts->listCourses(160);
        $data['list_posts'] = $list_posts;
        
        $this->view('videos', $data);
    }
    
    public function share(){
		$posts = new VideosModel();

        $list_posts = $posts->listPosts(9999);
        $data['list_posts'] = $list_posts;
        $this->view('shareVideos', $data);
    }
    
    public function send(){
		$table = "videos";
 
	    $sessionHelper = new SessionHelper();
        
	    $authCheck = $sessionHelper->checkSession( "userAuth" );
	    $userData = $sessionHelper->selectSession( "userData" );
	    if($authCheck === false){
	        $userData["user_id"] = "";
	    }
	        	
	    $type       = $_POST["type"];
		$content    = $_POST["content"];
		$professor  = $_POST["professor"];

		date_default_timezone_set('America/Sao_Paulo');
   		$date = date('Y-m-d H:i:s', time());
		        
		$data = array(
		    "type" => $type,
		    "type" => $type,
		    "type" => $type,
		    "type" => $type
		);
		$db = new Model();	
			        	
	    if($db->insert($table,$data)){
	       	$this->message = "Aula enviada. Muito obrigado e continue compartilhando (:";
        	echo "<h4>".$this->message."</h4>";
        	
        	$posts = new VideosModel();

	        $list_posts = $posts->listPosts(9999);
	        $data['list_posts'] = $list_posts;
	        $this->view('shareVideos', $data);
	    }
    }

}