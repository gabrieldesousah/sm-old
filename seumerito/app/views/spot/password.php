<?php
if($this->auth->checkLogin('boolean')){
    $this->redirectorHelper = new RedirectorHelper();
    $this->redirectorHelper->goToController( "dashboard" );
}
?>
<?php include_once("header.php");?>

    <div id="dg">
		<div class="container centered">
			<div id="box" class="centered">
                <h2>Quase lá...</h2>
                <form action="<?php echo ROOT;?>auth/signUpSocial" name="signUp" method="post">
                	
                	<h4>Para você poder acessar de qualquer 
                	dispositivo com maior segurança, 
                	crie uma senha:</h4>
                	
                    Senha:<br>
                    <input type="password" name="password" style="height: 45px; font-size: 25px;"><br>

<input type="hidden" name="fb_id" 	value="<?php echo $this->data["fb_id"];		?>">
<input type="hidden" name="email" 	value="<?php echo $this->data["email"];		?>">
<input type="hidden" name="name" 		value="<?php echo $this->data["name"];		?>">
<input type="hidden" name="gender"	value="<?php echo $this->data["gender"];	?>">
<input type="hidden" name="locale"	value="<?php echo $this->data["locale"];	?>">
<input type="hidden" name="timezone" 	value="<?php echo $this->data["timezone"];	?>">
<input type="hidden" name="verified" 	value="<?php echo $this->data["verified"];	?>">
                    

                    <input type="submit">
                </form>
            </div>

            <a href=<?php echo ROOT;?>>Índice</a>
        </div>
    </div>

<?php include_once("footer.php");?>