<?php
if($this->auth->checkLogin('boolean')){
    $this->redirectorHelper = new RedirectorHelper();
    $this->redirectorHelper->goToController( "dashboard" );
}
?>
<?php include_once("header.php");?>

    <div id="dg">
		<div class="container">
			<div id="box" class="row centered">
                <h2>Registrar:</h2>
                <!--
                <form action="<?php echo ROOT;?>auth/signUp" name="signUp" method="post">
                    Nome: <input type="text" name="name"><br>
                    Email:<input type="email" name="email"><br>
                    Senha:<input type="password" name="password"><br>
                            
                    <input type="submit">
                </form>
                -->
                Por enquanto o login está sendo feito exclusivamente pelo facebook. Se preferir uma outra forma de entrada, envie um email para contato@seumerito.com
<br>
              		<a class="pricing-signup" href="https://www.facebook.com/dialog/oauth?client_id=1445655249068689&scope=email,public_profile&redirect_uri=<?php echo _GET; ?>">Cadastrar com Facebook</a>
            </div>
                    
            <div id="box" class="row centered">
                <h2>Entrar:</h2>
                <div class="col-lg-4 pricing-option">
              		<a class="pricing-signup" href="https://www.facebook.com/dialog/oauth?client_id=1445655249068689&scope=email,public_profile&redirect_uri=<?php echo _GET; ?>">Entrar com Facebook</a>
                </div>
                
                <form action="<?php echo ROOT;?>auth/login" name="logIn" method="post">
                    Email: <input type="email" name="email"><br>
                    Senha: <input type="password" name="password"><br>
                    <input type="submit">
                </form>
            </div>
            <a href=<?php echo ROOT;?>>Índice</a>
        </div>
    </div>

<?php include_once("footer.php");?>