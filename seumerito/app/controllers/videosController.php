<?php
class Videos extends Controller{
    public function index_action(){
        $posts = new VideosModel();

        $list_posts = $posts->listCourses(160);
        $data['list_posts'] = $list_posts;
        
        $this->view('videos', $data);
    }
    
    public function material(){
    	
    	$posts = new VideosModel();
    	
    	
    	$data = $this->getParams();
        $content = $data["content"];
        
        $class = $data["class"];
        
        if($class == ""){
        	$vclass = $posts->listPosts(1, "content = '$content'");
        }else{
        	$vclass = $posts->listPosts(1, "id = '$class'");
        }
		
        $list_posts = $posts->listPosts(160, "content = '$content'");
        $data['list_posts'] = $list_posts;
        
        $data['list_class'] = $vclass;
        $this->view('module', $data);
    }
    
    public function manage(){
		$posts = new VideosModel();
		
		$data = $this->getParams();

        $list_posts = $posts->listPosts(160, "content = '".$data["content"]."'");
  
        $data['list_posts'] = $list_posts;
        $this->view('manageVideos', $data);
    }
    
    public function send(){
		$table = "videos";
 
	    $sessionHelper = new SessionHelper();
        
	    $authCheck = $sessionHelper->checkSession( "userAuth" );
	    $userData = $sessionHelper->selectSession( "userData" );
	    if($authCheck === false || $_POST["title"] == "" || $_POST["link"] == ""){
	        break;
	    }


		date_default_timezone_set('America/Sao_Paulo');
   		$date = date('Y-m-d H:i:s', time());
    
		$data = array(
		    "title"      => $_POST["title"],
	    	"url"       => $_POST["link"],
	    	"text"       => $_POST["text"],
			"content"    => $_POST["content"],
			"module"     => $_POST["module"],
			"professor"  => $_POST["professor"],
			"author_id"  => $userData["user_id"],
			"area"       => $_POST["area"],
			"date"       => $date
		);
		$db = new Model();	
			        	
	    if($db->insert($table,$data)){
        	echo "<br><br>
        	<b>Aula enviada. Muito obrigado e continue compartilhando (:</b>
        	<br>
        	Caso queira ver o curso: <a href='".ROOT."videos/material/content/".$_POST["content"]."'>Clique aqui</a>";
        	
        	$posts = new VideosModel();

	        $list_posts = $posts->listPosts(160, "content = '".$_POST["content"]."'");
	        $data['list_posts'] = $list_posts;
	        $this->view('manageVideos', $data);
	    }
    }

}