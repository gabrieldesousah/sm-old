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

	<!-- Faz um foreach aqui para todas as matérias-->
	<div id="dg">
		<div class="container">
			<div class="row centered">
			    
				<?php foreach ( $view_list_posts as $list_posts ) : ?>
                    <div class="col-lg-4">
                        <div class="pricing-option">
                            <div class="pricing-top">
                                <span class="pricing-edition"><?php echo $list_posts['content']; ?></span>
                            </div>
                            <a href="<?php echo ROOT."search/material/key/".$list_posts['content'];?>" class="pricing-signup">Ver mais</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->

<?php include_once("footer.php");?>