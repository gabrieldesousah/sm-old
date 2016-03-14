<?php
class AuthHelper{
    protected $sessionHelper, $redirectorHelper, $tableName, $userColumn,
    $passColumn, $user, $pass, $loginController = 'index', $loginAction = 'index',
    $logoutController = 'index', $logoutAction = 'index', $data;
    
    public function __construct(){
        $this->sessionHelper = new SessionHelper();
        $this->redirectorHelper = new RedirectorHelper();
        return $this;
    }
    
    public function authCheck(){
        $auth = new AuthHelper();
        $sessionHelper = new SessionHelper();
        
        $authCheck = $sessionHelper->checkSession( "userAuth" );
        $userData = $sessionHelper->selectSession( "userData" );
        if($authCheck === true){
            return true;
        }else{
            return false;
        }
    }
    
    //Estabelece os campos no banco de dados que deve verificar
    public function setTableName( $val ){
        $this->tableName = $val;
        return $this;
    }
    
    public function setUserColumn( $val ){
        $this->userColumn = $val;
        return $this;
    }
    
    public function setPassColumn( $val ){
        $this->passColumn = $val;
        return $this;
    }
    
    //Pega os dados para o login
    public function setUser( $val ){
        $this->user = $val;
        return $this;
    }
    
    
    public function setData( Array $val ){
        $this->data = $val;
        return $this;
    }
    
    public function setPass( $val ){
        $this->pass = $val;
        return $this;
    }
    
    
    //Diz qual o controller e action que está fazendo o login.
    public function setLoginControllerAction( $controller, $action ){
        $this->loginController = $controller;
        $this->loginAction = $action;
        return $this;
    }
    
    public function setLogoutControllerAction( $controller, $action ){
        $this->logoutController = $controller;
        $this->logoutAction = $action;
        return $this;
    }
    
    public function signUp(){
        //Verifica se existe o usuário
        $data = $this->data;
        
        date_default_timezone_set('America/Sao_Paulo');
   		$data["date"] = date('Y-m-d H:i:s', time());

        
        $db = new Model();
        $where = $this->userColumn."='".$data[$this->userColumn]."'";
        $sql = $db->read($this->tableName, '*', $where, '1');
        
        if( count($sql) > 0 ){
            echo "Este usuário já existe. <a href='".ROOT."auth/'>Fazer login</a>";
        }else{
            if( $db->insert($this->tableName,$data) ){
           	
                echo"Usuário criado.  <a href='".ROOT."auth/'>Fazer login</a>"; // Faz um redirecionamento aqui.
            }else{
                echo"Ocorreu algum erro.  <a href='".ROOT."auth/'>Tente novamente</a>";
            }

        }
    }
    
    
    public function login(){
        //Verifica se existe o usuário e a senha
        $db = new Model();
        $data = $this->data;
        $where = $this->userColumn."='".$data[$this->userColumn]."'";
        $sql = $db->read($this->tableName, '*', $where, '1');

        if( $data[$this->passColumn] == $sql[0]["password"]){
            $user_id   = $sql[0]["user_id"];
            $user_name = $sql[0]["email"];
            //a senha coincidiu! Faça uma sessão e redirecione
            
            $this->sessionHelper->createSession("userAuth", true)
                                ->createSession("userData", $sql[0]);
            $this->redirectorHelper->goToControllerAction($this->loginController, $this->loginAction);
            return $this;
        }else{}

    }
    
    public function loginSocial(){
        
        $db = new Model();
        $where = "fb_id ='".$data["fb_id"]."'";
        $sql = $db->read($this->tableName, '*', $where, '1');
        
        $data = $sql[0];
        
        if( count($sql) > 0 ){
            //Este usuário já existe. 
        	$this->sessionHelper->createSession("userAuth", true)
                                ->createSession("userData", $data);
            $this->redirectorHelper->goToControllerAction($this->loginController, $this->loginAction);
            return $this;
        }
    }
    
    public function signUpSocial(){
        $data = $this->data;
        
        date_default_timezone_set('America/Sao_Paulo');
   		$data["date"] = date('Y-m-d H:i:s', time());

        
        $db = new Model();
        $where = $this->userColumn."='".$data[$this->userColumn]."'";
        $sql = $db->read($this->tableName, '*', $where, '1');
        
        if( count($sql) > 0 ){
            echo "Este usuário já existe. <a href='".ROOT."auth/'>Fazer login</a>";
        }else{
            if( $db->insert($this->tableName,$data) ){

	        
                echo"Usuário criado.  <a href='".ROOT."auth/'>Fazer login</a>"; // Faz um redirecionamento aqui.
            }else{
                echo"Ocorreu algum erro.  <a href='".ROOT."auth/'>Tente novamente</a>";
            }

        }
        
        
        	
        

        
    }
    
    public function update($id){

        $data = $this->data;
        
        $db->update($this->tableName, $data, "`user_id` = ".$id);
    }
    
    public function logout(){
        $this->sessionHelper->deleteSession("userAuth")
                            ->deleteSession("userData");
        $this->redirectorHelper->goToControllerAction($this->logoutController, $this->logoutAction);
        return $this;
    }
    
    public function checklogin( $action ){
        switch($action){
            case "boolean":
                
                if( !$this->sessionHelper->checkSession("userAuth") ){
                    return false;
                }else{
                    return true;
                }
                break;
                
            case "redirect":
                if( !$this->sessionHelper->checkSession("userAuth") ){
                    if( $this->redirectorHelper->getCurrentController() != $this->loginController || $this->redirectorHelper->getCurrentAction() != $this->loginAction() ){
                        $this->redirectorHelper->goToControllerAction( $this->loginController, $this->loginAction );
                    }
                }
                break;
                
            case "stop":
                if( !$this->sessionHelper->checkSession("userAuth") ){
                    exit;
                }
                break;
        }
    }
    
    public function userData( $key ){
        $s = $this->sessionHelper->selectSession("userData");
        return $s[$key];
    }
}