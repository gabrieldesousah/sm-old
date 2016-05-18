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
				<br><br>
                <form action="<?php echo ROOT;?>auth/signUp" name="signUp" method="post">
                    <label class="input-label">Nome: </label>  <input type="text" name="name"><br>
                    <label class="input-label">Email:</label> <input type="email" name="email"><br>
                    <label class="input-label">Senha:</label> <input type="password" name="password"><br>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input  class="btn btn-danger" type="submit" value="Cadastrar">
                </form>
<!--
                Por enquanto o login está sendo feito exclusivamente pelo facebook. Se preferir uma outra forma de entrada, envie um email para contato@seumerito.com
                -->
                
<br>
              		<a class="pricing-signup" href="https://www.facebook.com/dialog/oauth?client_id=1445655249068689&scope=email,public_profile&redirect_uri=<?php echo _GET; ?>">Cadastrar com Facebook</a>
            </div>
                    
            <div id="box" class="row centered">
                <h2>Entrar:</h2>
                <br><br>
                <div class="col-lg-4 pricing-option">
              		<a class="pricing-signup" href="https://www.facebook.com/dialog/oauth?client_id=1445655249068689&scope=email,public_profile&redirect_uri=<?php echo _GET; ?>">Entrar com Facebook</a>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
	                <form action="<?php echo ROOT;?>auth/login" name="logIn" method="post">
	                    <label class="input-label">Email:</label> <input type="email" name="email"><br>
	                    <label class="input-label">Senha:</label> <input type="password" name="password"><br>
	                    <br>
	                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    <input  class="btn btn-danger" type="submit" value="Entrar">
	                </form>
                </div>
            </div>
            <a href=<?php echo ROOT;?>>Índice</a>
        </div>
    </div>

<?php include_once("footer.php");?>