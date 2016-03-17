<?php include_once("header.php");?>

	<div id="dg">
		<div class="container">
			<div class="row centered">
			    <?php if($this->auth->checkLogin('boolean') && $this->userData["permissions"] != 0){ ?>
					<div class="col-lg-12" style="text-align: right">
						<a class="btn btn-info" href="share">Criar curso</a><br><br>
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
	</div><!-- DG -->

<?php include_once("footer.php");?>