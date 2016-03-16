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
    

}