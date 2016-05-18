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

	<div id="dg">
		<div class="container">
			<div class="row centered">
				
			    <?php if($this->auth->checkLogin('boolean') && $this->userData["permissions"] != 0){ ?>
					<div class="col-lg-12" style="text-align: right">
						<a class="btn btn-info" href="<?php echo ROOT;?>videos/manage">Criar curso</a><br><br>
					</div>
				<?php } ?>
				<?php foreach ( $view_list_posts as $list_posts ) : ?>
                    <div class="col-lg-4">
                        <div class="pricing-option">
                            <div class="pricing-top">
                                <span class="pricing-edition"><?php echo $list_posts['content']; ?></span>
                            </div>
                            <a href="<?php echo ROOT."videos/material/content/".$list_posts['content'];?>" class="pricing-signup">Ver mais</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
			</div><!-- row -->
		</div><!-- container -->
		<h4>Atenção: as vídeo-aulas ainda estão em fase de teste</h4>



<div class="table-container">
    <table class="table table-condensed col-lg-12">
        <tr><td>
        <script type="text/javascript">
	 bb_bid = "1703461";
	 bb_lang = "pt-BR";
	 bb_name = "custom";
	 bb_limit = "7";
	 bb_format = "bbc";
	 bb_bbdo = "344";
	</script>
	<script type="text/javascript" src="http://static.boo-box.com/javascripts/embed.js"></script>
        </td></tr>
    </table>
</div>


	</div><!-- DG -->

<?php include_once("footer.php");?>