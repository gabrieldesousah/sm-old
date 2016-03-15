<?php include_once("header.php");?>

<?php
if(isset($_SESSION['current']) and $_SESSION['current'] != ""){
	header("Location: ".URL.$_SESSION['current']);
}
?>

	<!-- Faz um foreach aqui para todas as matérias-->
	<div id="dg">
		<div class="container">
			<div class="row left" id="box">
				<div class="col-lg-8 ">
	                Olá,  <?php echo($this->userData["name"])    ;?><br>
	                <b>Seu email:</b>
	                <?php echo($this->userData["email"])   ;?><br>
				</div>
                <div class="col-lg-4">
                	<img class="icon rounded" src="https://graph.facebook.com/<?php echo($this->userData["fb_id"]);?>/picture?height=120" alt="<?php echo($this->userData["name"]);?>" />
                	<hr>
            		<a href="<?php echo ROOT;?>auth/logout">Sair</a>
                </div>
			</div>
			
			
			<div class="row left" id="box">
				<b>Histórico</b>
                <?php 
                if($this->userHistoricPosts == 0){
                	echo '<br>Seu histórico está vazio.';
                }else{ ?>
                <div class="table-container">
	                <table class="table table-condensed col-lg-12">
	                	<?php
	                	foreach ( $view_list_posts as $list_posts ) :
	                		$articles = new HistoricModel();
	                		$articles = $articles->listArticles($list_posts['file_id']);
	                		?>
	                		
	                    	<tr>
	                    		<td><a class="btn" href="<?php echo ROOT.'page/material/id/'.$list_posts['file_id']; ?>"><?php echo $articles[0]["content"]; ?></td>
	                    		<td class="right"><a class="btn btn-info" target="_blank" href="<?php echo ROOT.'reader/material/id/'.$list_posts['file_id']; ?>">Visualizar</a></td>
	                    	</tr>
	                	<?php endforeach; ?>
	                </table>
                </div>
                <?php } ?>
			</div>

			
			<!-------------------------------------------------------------------------------------->
			
			<div class="row left" id="box">
				<b>Compartilhados</b>
                <?php 
                if($this->userHistoricSends == 0){
                	echo '<br>Você ainda não compartilhou nada :( Colabore conosco clicando <a href="share.php">aqui</a>';
                }else{ ?>
                
                <div class="table-container">
	                <table class="table table-condensed col-lg-12">
		                <?php
		                foreach ( $view_list_sends as $list_sends ) : ?>
		                    <tr>
		                    	<td><a class="btn" href="<?php echo ROOT.'page/material/id/'.$list_sends['id']; ?>"><?php echo $list_sends['content']; ?></td>
			                    <td class="right"><a class="btn btn-info" target="_blank" href="<?php echo ROOT.'reader/material/id/'.$list_sends['id']; ?>">Visualizar</a></td>
		                    </tr>
		                <?php endforeach; ?>
                	</table>
                </div>
                <?php } ?>
			</div>
			
			<!-------------------------------------------------------------------------------------->
			
			<div class="row left" id="box">
				<b>Mensagens</b>
                <div class="table-container">
	                <table class="table table-condensed col-lg-12">
		                <?php if(count($view_list_messages) != 0) { ?>
			                <?php
			                foreach ( $view_list_messages as $list_messages ) : ?>
				                    <tr>
				                    	<td><?php echo $list_messages['message']; ?></td>
				                    	<td style="color: yellow">
				                    		<?php if($list_messages['status'] == "1"){ ?>
				                    			Respondido
				                    		<?php }else{ ?>
				                    			Aguardando resposta
				                    		<?php } ?> 
				                    	</td>
					                </tr>
				                <?php endforeach; ?>
		                <?php }else{ ?>
		                	Você ainda nioão envu nenhuma mensagem
  		                <?php } ?>
              	</table>
                </div>
			</div>
			

			
		</div><!-- container -->
	</div><!-- DG -->
<?php include_once("footer.php");?>