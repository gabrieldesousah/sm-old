<?php include_once("header.php");?>
	<!-- Faz um foreach aqui para todas as matérias-->
	<div id="dg">
		<div class="container">
			<div class="row centered">

                <?php foreach ( $view_list_posts as $list_posts ) : ?>
                    <div class="col-lg-4">
                        <div class="pricing-option">
                            <div class="pricing-top">
                            	<span class="pricing-edition">
				                    <?php
					                switch($list_posts['type']){
					                    case 'exam': echo "Prova";
					                    break;
					                    
					                    case 'list': echo "Lista de exercícios";
					                    break;
					                    
					                    case 'answers': echo "Gabarito/ resolução";
					                    break;
					                    
					                    case 'resume': echo "Resumo";
					                    break;
					                }
					                ?>
					                de
					                
	                                <?php echo $list_posts['content']; ?>
	                                <?php
		                            if($list_posts['professor'] != ''){ ?>
		                            	<span class="pricing-info" style="clear: all"><?php echo $list_posts['professor']; ?></span>
		                            <?php }if($list_posts['text'] != ''){ ?>
		                            	<span class="pricing-info" style="width: 300px; overflow:hidden; height:11px; color:yellow;"><?php echo $list_posts['text']; ?></span>
		                            <?php } ?>
                                </span>
					                
                            </div>
                            
                            <a href="<?php echo ROOT."page/material/id/".$list_posts['id'];?>" class="pricing-signup">Ver mais</a>
                        </div>
        			</div>
                <?php endforeach; ?>
                    <!--
                    <ul>
                        <li><strong>Numero de</strong> Provas</li>
                        <li><strong>Número de</strong> Resumos</li>
                    </ul>
                    -->
			</div><!-- row -->
		</div><!-- container -->
		

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