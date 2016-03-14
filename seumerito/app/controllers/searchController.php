<?php
class Search extends Controller{
    public function index_action(){
        $this->message = "Coloque aqui uma pesquisa avançada.";
        $message = $this->message;
        $this->view('message', $message);
    }
    
    public function material(){
        $posts = new SearchModel();

		$data = $this->getParams();
        $search = $data["key"];
        
        $list_posts = $posts->listPosts($search, 160);
        $data['list_posts'] = $list_posts;
        
        $this->view('search', $data);
    }
}