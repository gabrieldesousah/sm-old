<?php
class Index extends Controller{
    public $auth;
    
    public function init(){
        /*codigo que se repete em todas as actions*/
        
    }
    
    public function index_action(){

        $posts = new ContentsModel();

        $list_posts = $posts->listPosts(160);
        $data['list_posts'] = $list_posts;
        
        
        $dados = $this->getParams();
        $id=$this->getParams("id");
        
        
        
        $this->view('index', $data);

        /*
        $redirector = new RedirectorHelper();
        $redirector->goToIndex();
        */
    }
    
    public function alternativo(){
        echo "se digitar site/index/alternativo é para aqui que abre. essa é a action";
        
        /*
        $dados = $this->getParams();
        
        
        $this->view('index', $data); 
        */
        $dados = $this->getParams();
        print_r($dados);
    }
    
    
    
    public function teste(){
        echo 'Action Teste';
    }
} 
