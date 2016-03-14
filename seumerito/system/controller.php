<?php
class Controller extends System{
    protected function view( $nome, $vars= null ){
        if( is_array($vars) && count($vars) > 0 ){
            extract($vars, EXTR_PREFIX_ALL, 'view');
        }
        
        $file = VIEWS . $nome . '.php';
        
        if( !file_exists($file) ){
            die("Houve um erro. View não existe");
        }
        
        /*Verifica a sessao
        <?php
        if($this->auth->checkLogin('boolean')){
            echo "entrou";
        }
        ?>
        */
        $this->auth = new AuthHelper();
        $this->auth->setLoginControllerAction('auth', 'index');
   
        
        
        $this->sessionHelper = new SessionHelper();
        $this->userData = $this->sessionHelper->selectSession( "userData" );
        
        
        require_once( $file );
    }
    
    public function init(){}
}