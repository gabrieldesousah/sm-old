<?php include_once("header.php");?>

	<!-- Faz um foreach aqui para todas as matérias-->
	<div id="dg">
	    <div class="container">
	    <?php if($this->auth->checkLogin('boolean') == false){ ?>
	    <div class="row left" id="box">
		    <center>
		    Você não está cadastrado, faça login para gerenciar melhor seus documentos:
		    <br>
		    <a data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin">Entrar</a></center>
	    </div>
	    <?php } ?>
	    
			<div class="row left">
				<form action="upload" method="post" enctype="multipart/form-data">
					
					<div class="">
						<label>O que você vai compartilhar? </label><br>
						<select class="input-large" name="type">
							<option value="exam" selected="selected">Prova</option>
							<option value="list">Lista de exercícios</option>
							<option value="answers">Gabaritos e resoluções</option>
							<option value="resume">Resumos e explicações</option>
						</select>
					</div>
					
					<div class="">
						<label>Matéria: </label><br>
						<input class="input-large" name="content" id="content" value="" placeholder="Nome da Matéria" type="text" required>
					</div>
					
					<div class="">
						<label>Professor(necessário): </label><br>
						<input class="input-large" name="professor" id="professor" value="" placeholder="Nome do professor" type="text" required>
					</div>
					
					<div class="">
						<label>Área: </label><br>
						<select class="input-large" name="area">
							<option value="Exatas" selected="selected">Exatas</option>
							<option value="Humanas">Humanas</option>
							<option value="Biologicas">Biológicas</option>
						</select>
					</div>
					
					<div class="">
						<label>Tópicos, curso e descrição: </label><br>			
						<input class="input-large" type='text' name='text' placeholder="ex. 1° ou 2° prova; Produto vetorial, matrizes; eng. civil.."/>
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
						<input class="input-large" type='text' name='unity' placeholder="Ex. Campus II"/>
					</div>
					
					<!--
					<div class="">
						<label>E/Ou: Link externo(gogle drive, dropbox, ou outro link de compartilhamento)(opcional): </label>				
						<input class="input-large" type='text' name='link' placeholder="http://linkexterno"/>
					</div>
					-->
					
					<div class="">
						<label>Arquivo:</label><br>
						<input class="input-large" type="file" name="file">
					</div>
					<?php
					if ( $_SESSION['logado'] === true ){
						$author_id = $_SESSION['user_id'];
					}
					else{
						$author_id = "";
					}
					?>

					<input type="hidden" name="author_id" value="<?php echo $author_id;?>">
					<div class="centered">
						<input class="btn btn-default" type="submit" value="Enviar">
					</div>
				</form>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->


<?php include_once("footer.php");?>