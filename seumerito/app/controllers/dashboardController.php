<?php
class Dashboard extends Controller{
	public $auth;
    public $authCheck;
    public $sessionHelper;
    public $userData;
    public $userHistoricPosts;
    public $userHistoricSends;
    
    public function init(){
        $this->auth = new AuthHelper();
        $this->auth->setLoginControllerAction('auth', 'index');
        $this->sessionHelper = new SessionHelper();
    }
    
    public function index_action(){
    	
    	$this->auth->checkLogin('redirect');

    	$userData =  $this->sessionHelper->selectSession("userData");

        $users = new DashboardModel();
        
        $list_data = $users->userData($userData["user_id"]);
        $data['listData'] = $list_data;
        $this->userData = $data['listData'];
        
        $posts = new HistoricModel();
        
        $list_posts = $posts->listPosts(10, $userData["user_id"]);
        $data['list_posts'] = $list_posts;
        $this->userHistoricPosts = count($list_posts);
		$data["userHistoricPosts"] = $this->userHistoric;
        
        $list_sends = $posts->listSends(10, $userData["user_id"]);
        $data['list_sends'] = $list_sends;
   
		$this->userHistoricSends = count($list_sends);
		$data["userHistoricSends"] = $this->userHistoricSends;
        
        
        
        $this->view('dashboard', $data);
        $this->view('dashboard', $users);
        
    }
}