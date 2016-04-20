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
			<div class="row centered" id="box">
				<div class="col-lg-12">
					<h2>
		                <?php
		                switch($this->materialData[0]["type"]){
		                    case 'exam': echo "Prova";
		                    break;
		                    
		                    case 'list': echo "Lista de exercícios";
		                    break;
		                    
		                    case 'answers': echo "Gabaritos/ resoluções";
		                    break;
		                    
		                    case 'resume': echo "Resumo";
		                    break;
		                }
		                ?>
		                de <?php echo($this->materialData[0]["content"]);?>
		             </h2>
		                <?php if($this->materialData[0]["professor"] != ""){ ?>
		                    Professor(a):  <?php echo($this->materialData[0]["professor"]);?><br>
		                <?php } ?>
		                
		                Instituição: <?php echo($this->materialData[0]["college"]);?> <?php echo($this->materialData[0]["uf"]);?><br>
		                <?php echo($this->materialData[0]["text"]);?><br>
		                
		                <hr>
<div class="container">
<div class="row centered">
<script type="text/javascript">
 bb_bid = "1703461";
 bb_lang = "pt-BR";
 bb_name = "custom";
 bb_limit = "4";
 bb_format = "bbm";
 bb_bbdo = "344";
</script>
<script type="text/javascript" src="http://static.boo-box.com/javascripts/embed.js"></script>
</div>
</div>
		            <div class="col-lg-8" style="padding: 0">
		                <?php if($this->auth->checkLogin('boolean')){ ?>
			                <a class="btn btn-info"    target="_blank" href="<?php echo ROOT.'reader/material/id/'.$this->materialData[0]["id"];?>">Visualizar</a>
					    	<a class="btn btn-default" target="_blank" href="<?php echo ROOT.'download/material/id/'.$this->materialData[0]["id"];?>">Download</a>
			            <?php }else{ ?>
			                <a class="btn btn-info"    data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin">Visualizar</a>
					   		<a class="btn btn-default" data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin">Download</a>
			            <?php } ?>
			        </div>
			        
			        <?php if($this->auth->checkLogin('boolean')){ ?>
			        <div class="col-lg-4 right" style="padding: 0">
		            	<a data-toggle="modal" data-target="#ModalReport" href="#ModalReport" alt="Reportar" style="margin-right: 5px;"> <i class="fa fa-exclamation-triangle"></i></a> 
		            	
		            	<?php if($this->userData["permissions"] != 0){ ?>
		            		<a data-toggle="modal" data-target="#ModalEdit" href="#ModalEdit" alt="Editar"   style="margin-right: 5px;"> <i class="fa fa-pencil-square-o"></i></a> 
		            		<a data-toggle="modal" data-target="#ModalDelete" href="#ModalDelete" alt="Apagar"   style="margin-right: 5px;"> <i class="fa fa-minus-circle"></i></a> 
		            	<?php } ?>
		            </div>
		            <?php }else{ ?>
		            	<a data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin" alt="Reportar" style="margin-right: 5px;"> <i class="fa fa-exclamation-triangle"></i></a> 
					<?php } ?>
				</div>
			</div>
		</div><!-- container -->
	</div><!-- DG -->






		            
	<!-- MODAL FOR REPORT -->
	<!-- Modal -->
	<div class="modal fade" id="ModalReport" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
        						<input style="width: 50%; margin:0" type="submit" class="btn btn-info" value="Confirmar">
        						<a style="width: 50%; float: right;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</a>
            	        	</form>
            	       	</div>
            	     </div><!-- /.row -->
    	        </div><!-- /.modal-body -->
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->	    
    
    
	<!-- MODAL FOR EDIT -->
	<!-- Modal -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">Tem algo de errado?</h4>
	            </div>
	            <form action="<?php echo ROOT;?>share/update" method="post">
    	            <div class="modal-body">
    	            	
        		        <div class="row left col-lg-12">
        					<div class="">	
        						<label>Tipo de material: </label><br>
								<select class="input-large" name="type">
									<option value="exam" selected="selected">Prova</option>
									<option value="list">Lista de exerc&iacute;cios</option>
									<option value="answers">Gabaritos e resolu&ccedil;&otilde;es</option>
									<option value="resume">Resumos e explicações</option>
								</select>
							</div>
							
							<div class="">
								<label>Matéria: </label><br>
								<input class="input-large" name="content" id="content" value="<?php echo($this->materialData[0]["content"]);?> " placeholder="Nome da Mat&eacute;ria" type="text" required>
							</div>
							
							<div class="">
								<label>Professor: </label><br>
								<input class="input-large" name="professor" id="professor" value="<?php echo($this->materialData[0]["professor"]);?>" placeholder="Nome do professor" type="text">
							</div>
							
							<div class="">
								<label>Área: </label><br>
								<select class="input-large" name="area">
									<option value="Exatas" selected="selected">Exatas</option>
									<option value="Humanas">Humanas</option>
									<option value="Biologicas">Biol&oacute;gicas</option>
								</select>
							</div>
							
							<div class="">
								<label>Tópicos, curso e descrição: </label><br>			
								<input class="input-large" type='text' name='text' value="<?php echo($this->materialData[0]["text"]);?>"/>
							</div>
							
						
							<div class="">
								<label>O material é de qual universidade? </label><br>
								<select class="input-large" name="college">
									<option value="UFG" selected="selected">UFG</option>
									<option value="UEG">UEG</option>
									<option value="IFG">IFG</option>
									<option value="PUC">PUC</option>
									<option value="UNIP">UNIP</option>
									<option value="Uni-ANHANGUERA">Uni-ANHANGUERA</option>
									<option value="Uni-EVANGÉLICA">Uni-EVANGÉLICA</option>
									<option value="ALFA">ALFA</option>
									<option value="PADRÃO">PADRÃO</option>
									<option value="Outras">Outras</option>
								</select>
							</div>
							
							<div class="">
								<label>Unidade/descrição: </label><br>			
								<input class="input-large" type='text' name='unity' value="<?php echo($this->materialData[0]["unity"]);?>" placeholder="Ex. Campus II"/>
							</div>
							
							<input type="hidden" name="id" value="<?php echo $this->materialData[0]["id"];?>">
        					<br>
        					
        					<input style="width: 50%; margin:0" type="submit" class="btn btn-info" value="Confirmar">
            	       		<a style="width: 50%; float: right;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</a>
            	        </div>
            	            
    	            </div><!-- /.modal-content -->
	            </form>
	        </div><!-- /.modal-dialog -->
	    </div>
    </div><!-- /.modal -->
    
    
    <!-- MODAL FOR DELETE -->
	<!-- Modal -->
	<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja excluir este material?</h4>
	            </div>
    	        <div class="modal-body">
        		    <div class="row centered">
        		      	<form action="<?php echo ROOT;?>share/delete" method="post">
        		      		<input type="hidden" name="id" value="<?php echo $this->materialData[0]["id"];?>">
        		       	
        					<a style="width: 50%; margin:0" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Cancelar</a>
        					<input type="submit" style="width: 50%; margin:0" class="btn btn-danger" value="Apagar">
            	       	</form>
                   </div><!-- /row -->
    	        </div><!-- /.modal-body -->
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
    
    
    
<?php include_once("footer.php");?>