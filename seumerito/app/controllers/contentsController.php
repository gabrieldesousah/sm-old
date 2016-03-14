<?php
class Contents extends Controller{
    public function index_action(){
        $posts = new ContentsModel();

        $list_posts = $posts->listPosts(160);
        $data['list_posts'] = $list_posts;
        
        $this->view('contents', $data);
    }
    

}