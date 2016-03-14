<?php
class Users extends Controller{
    public function index_action(){
        $users = new UsersModel();

        $list_users = $users->listUsers('4');
        $data['listarUsuarios'] = $list_users;

        
        
        $this->view('users', $data);
    }
}