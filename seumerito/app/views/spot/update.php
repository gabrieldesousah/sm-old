<?php
if(!$this->auth->checkLogin('boolean')){
    $this->redirectorHelper = new RedirectorHelper();
    $this->redirectorHelper->goToController( "dashboard" );
}
?>
<?php include_once("header.php");?>

    <div id="dg">
		<div class="container">
			<div id="box" class="row centered">
                <h2>Alterar a senha:</h2>

                <form action="<?php echo ROOT;?>auth/up" name="signUp" method="post">

                    Senha:<input type="password" name="password"><br>
                            
                    <input type="submit">
                </form>
                
            </div>
                    
            <a href=<?php echo ROOT;?>>Índice</a>
        </div>
    </div>

<?php include_once("footer.php");?>