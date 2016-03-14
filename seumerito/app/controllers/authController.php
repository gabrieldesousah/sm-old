<?php
class Auth extends Controller{
    public $auth;
    public $authCheck;
    public $sessionHelper;
    public $userData;
    public $error;
    
    
    public function init(){
        $this->tableName = "users";
        
        //Essas linhas podem estar no sistema para verificação mais ampla.
        $this->auth = new AuthHelper();
        $this->auth->setLoginControllerAction('auth', 'index');
        $this->auth->setLogoutControllerAction('auth', 'index');
        
        $this->sessionHelper = new SessionHelper();
        $this->redirectorHelper = new RedirectorHelper();
        
    }
    
    public function index_action(){
        
        $data="";
        $this->view('auth', $data); 
        
        
        if($this->authCheck === true){
            echo '<a href="'.ROOT.'auth/logout">Sair</a>';
        }
    }
    
    public function loginSocial(){
		/*
		OBS: Devido as "URLs amigáveis", fica complicado receber os parâmetros do facebook. 
		Por isso, escolhi criar um arquivo chamado _get.php e por na raiz do documento
		que por sua vez cria os parâmetros e redireciona para aqui.
		*/
		$dados = $this->getParams();
        
		if(isset($dados['code'])){
		    $appId = '1445655249068689';
		    $appSecret = 'f242821c46966c3918a93177138730c1';
		    // Url informada no campo "Site URL"
		    $redirectUri = urlencode(_GET);
		    // Obtém o código da query string
		    $code = $dados['code'];
		    // Monta a url para obter o token de acesso
		    $token_url = "https://graph.facebook.com/oauth/access_token?"
		    . "client_id=" . $appId . "&redirect_uri=" . $redirectUri
		    . "&client_secret=" . $appSecret . "&code=" . $code;
		    // Requisita token de acesso
		    $response = @file_get_contents($token_url);
		    if($response){
		        $params = null;
		        parse_str($response, $params);
		        // Se veio o token de acesso
		        if(isset($params['access_token']) && $params['access_token']){
		            $graph_url = "https://graph.facebook.com/me?access_token=" . $params['access_token'];
		            // Obtém dados através do token de acesso
		            $user = json_decode(file_get_contents($graph_url));
		            // Se obteve os dados necessários


		            if(isset($user->email) && $user->email){

		                $data = array(
			        	"fb_id" 	=> $user->id,
			        	"email" 	=> $user->email,
			        	"name" 		=> $user->name,
			        	"gender"	=> $user->gender,
			        	"locale"	=> $user->locale,
			        	"timezone"	=> $user->timezone,
			        	"verified"	=> $user->verified
			        	);
			        	
			        	$db = new Model();
				        $where = "email ='".$data["email"]."'";
				        $sql = $db->read($this->tableName, '*', $where, '1');
				        
					    if($sql != null){
					    	//email já cadastrado, crie uma sessão
					    	$data = $sql[0];
	
					    	$this->sessionHelper->createSession("userAuth", true)
                               				    ->createSession("userData", $data);
                            $this->redirectorHelper->goToControllerAction('dashboard', 'index');
					    	
					    }else{
					    						    	
					    	$this->auth->setTableName ( "users" )
					                   ->setUserColumn( "email" )
					                   ->setPassColumn( "password" )
					                   ->setData($data)
					                   ->signUp();
					                   
					        //Agora tem que redirecionar a fim de fazer a sessão
					        
					        $this->sessionHelper->createSession("userDataTemp", $data);
					        
					        $this->redirectorHelper->goToControllerAction('auth', 'signUpSocial');

					    }

		               
		            }
		        }
		        else{
		            $_SESSION['fb_login_error'] = 'Falha ao logar no Facebook';
		        }
		    }
		    else{
		        $_SESSION['fb_login_error'] = 'Falha ao logar no Facebook';
		    }
		}
		else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])){
		    $_SESSION['fb_login_error'] = 'Permissão não concedida';
		}
    }
    
    
    public function signUpSocial(){
        
        $userDataTemp =  $this->sessionHelper->selectSession("userDataTemp");
        
        $db = new Model();
		$where = "email ='".$userDataTemp["email"]."'";
		$sql = $db->read($this->tableName, '*', $where, '1');
		
		$this->sessionHelper->deleteSession("userDataTemp");
		        
		if($sql != null){
		   	//email já cadastrado, crie uma sessão
		  	$data = $sql[0];
	    	$this->sessionHelper->createSession("userAuth", true)
               				    ->createSession("userData", $data);
            $this->redirectorHelper->goToController('dashboard');
					    	
	    }else{
			echo "Erro";
			$this->redirectorHelper->goToControllerAction('auth', 'index');
	    }
	        
    }
    
    public function signUp(){
        
        $name  = $_POST["name"];
        $email = $_POST["email"];
        $pass  = md5($_POST["password"]);
        
        echo"<div style='padding-top: 40px; padding-left:20px; text-align: center;'>";
        $this->auth->setTableName ( "users" )
                   ->setUserColumn( "email" )
                   ->setPassColumn( "password" )
                   ->setData(
                    array(
                        "email"    => $email,
                        "password" => $pass,
                        "name"     => $name
                        )
                    )
                    ->signUp();
        echo"</div>";

        $message = "";
        
        $this->view('message', $message);
    }
    
    public function login(){
        
        $email = $_POST["email"];
        $pass = md5($_POST["password"]);
        
        $this->auth->setTableName ( "users" )
                   ->setUserColumn( "email" )
                   ->setPassColumn( "password" )
                   ->setData(
                    array(
                        "email"    => $email,
                        "password" => $pass
                        )
                    )
                   ->setLoginControllerAction('dashboard', 'index');
                   
                   
        if($this->auth->login()){

        }else{
            $this->message = "Email ou senha errada";
            $message = $this->message;
            $this->view('message', $message);
        }
        
    }
    
    public function logout(){
        $this->auth->logout();
    }

} 