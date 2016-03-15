<?php include_once("header.php");?>
	<!-- Faz um foreach aqui para todas as matérias-->
	<div id="dg">
		<div class="container">
			<div class="row centered">

                <?php foreach ( $view_list_messages as $list_messages ) : ?>
                    <div class="col-lg-12">
                        <div class="pricing-option">
                            <div class="pricing-top" style="overflow: auto; height: auto; min-height: 50px; max-height: 200px;">
                                <span style="width: 300px; overflow:hidden; height:11px; color:yellow;"><a href="<?php echo ROOT."page/material/id/".$list_messages['post_id'];?>">Resposta ao artigo <?php echo $list_messages['post_id'];?></a></span>
								<br>
                                <span><?php echo $list_messages['message']; ?></span>
                            </div>
                            <a data-toggle="modal" data-target="#ModalRespond" class="pricing-signup" href="#ModalRespond">Responder</a>  
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
	</div><!-- DG -->



	<!-- MODAL FOR REPORT -->
	<!-- Modal -->
	<div class="modal fade" id="ModalRespond" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">Tem algo de errado?</h4>
	            </div>
	            <div class="modal-body">
        		    <div class="row left" style="padding:0; margin:0;">
        		       	<div class="col-lg-12" style="padding:0; margin:0;">
        					Qual o  problema? Conte pra gente... Responderemos em breve!
        					<br><br>
        					<form action="<?php echo ROOT;?>messages/send" method="post">
        						<textarea style="width: 100%; margin:0" name="message" id="message" placeholder="Diz aí..." required></textarea>
        						<br><br>
        						<input type="hidden" name="id" value="<?php echo $this->materialData[0]["id"];?>">
        						<input style="width: 50%; margin:0" type="submit" class="btn btn-success" value="Confirmar">
        						<a style="width: 50%; float: right;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</a>
            	        	</form>
            	       	</div>
            	     </div><!-- /.row -->
    	        </div><!-- /.modal-body -->
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
    
    
<?php include_once("footer.php");?>