<?php include_once("header.php");?>

<?php
/*
if (!$this->auth->checkLogin('boolean')){ 
    $_SESSION['current'] = $_SERVER["REQUEST_URI"];
    $current = $_SESSION['current'];
    
    
}else{
    $_SESSION['current'] = $_SERVER["REQUEST_URI"];
    $_SESSION['current'] = "";
}
*/
?>

<style>
.embed-container{
	position: relative;
	padding-bottom: 56.25%;
	height: 0;
	overflow: hidden;
	max-width: 100%;
} 
.embed-container iframe, .embed-container object, .embed-container embed { 
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>

	<!-- Faz um foreach aqui para todas as matÃ©rias-->
	<div id="dg">
		<div class="container">
			<div class="row centered">
			    <?php if($this->auth->checkLogin('boolean') && $this->userData["permissions"] != 0){ ?>
					<div class="col-lg-12" style="text-align: right; padding: 0">
						<a class="btn btn-info" href="<?php echo ROOT;?>videos/manage/content/<?php echo($view_content);?>">Gerenciar curso</a><br><br>
					</div>
				<?php } ?>

<?php
$pattern = "/youtu(be.com|.b)(\/v\/|\/watch\\?v=|e\/|\/watch(.+)v=)(.{11})/";
$subject = $view_list_class[0]['url'];
$matches = array();


$resultado = preg_match($pattern, $subject, $matches);
?>

				<div class="col-lg-8" style="padding: 0">
					<div class='embed-container'>
						<iframe src='https://www.youtube.com/embed/<?php echo $matches[4]; ?>' frameborder='0' allowfullscreen></iframe>
					</div>
					<br>
					
					<!--
					<div>
						<a class="btn btn-info" href="#">Anterior</a>
						<a class="btn btn-info" href="#">Pr¨®xima</a>
					</div>
					<br>
					-->
                </div>

<div class="col-lg-1"></div>

				<div class="col-lg-3" style="padding: 0;">
		            <span class="btn btn-block btn-primary">Aulas</span>
		            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
		            	<?php foreach ( $view_list_posts as $list_posts ) : ?>
		              		<li>
		              			
						<?php if($this->auth->checkLogin('boolean')){ ?>
			                <a href="<?php echo ROOT;?>videos/material/content/<?php echo $list_posts["content"];?>/class/<?php echo $list_posts["id"];?>">
		              			<?php echo $list_posts["title"];?>
		              		</a>
			            <?php }else{ ?>
				            <a data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin">
			              		<?php echo $list_posts["title"];?>
			              	</a>
			            <?php } ?>
			            
			            
		              			
		              		</li>
		              	 <?php endforeach; ?>
		            </ul>
		        </div>
		                
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->

<?php include_once("footer.php");?>