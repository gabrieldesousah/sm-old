<?php
if(!$this->auth->checkLogin('boolean')){
    $this->redirectorHelper = new RedirectorHelper();
    $this->redirectorHelper->goToController( "auth" );
}
?>
<?php include_once("header.php");?>

    <div id="dg">
		<div class="container">
			<div id="box" class="row centered">
                <h2>Alterar a senha:</h2>

                <form action="<?php echo ROOT;?>auth/up" name="signUp" method="post">

                    Senha anterior:<br>
                    <input type="password" name="last"><br>
                    
                    Nova senha:<br>
                    <input type="password" name="password"><br>
                    Confirmar senha<br>
                    <input type="password" name="c_password"><br>
                            
                    <input type="submit">
                </form>
                
            </div>
                    
            <a href=<?php echo ROOT;?>>Índice</a>
        </div>
    </div>

<?php include_once("footer.php");?>