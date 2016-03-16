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
				<form action="videos/share" method="post" enctype="multipart/form-data">
					
					<div class="">
						<label>Título: </label><br>
						<input class="input-large" name="title" id="title" value="" placeholder="Nome da aula" type="text" required>
					</div>
					
					<div class="">
						<label>Qual conteúdo? </label><br>
						<input list="content" class="input-large" name="content" value="" placeholder="Nome da matéria" required>
						<datalist id="content">
							<?php foreach ( $view_list_posts as $list_posts ) : ?>
								<option value="<?php echo $list_posts['content']; ?>">
			                <?php endforeach; ?>
						</datalist>
					</div>
					
					<div class="">
						<label>Qual Módulo/curso? </label><br>
						<input list="course" class="input-large" name="course" value="" placeholder="Nome do módulo" required>
						<datalist id="course">
							<?php foreach ( $view_list_posts as $list_posts ) : ?>
								<option value="<?php echo $list_posts['course']; ?>">
			                <?php endforeach; ?>
						</datalist>
					</div>

					<div class="">
						<label>Professor: </label><br>
						<input list="professor" class="input-large" name="professor" value="" placeholder="Nome do professor" required>
						<datalist id="professor">
							<?php foreach ( $view_list_posts as $list_posts ) : ?>
								<option value="<?php echo $list_posts['professor']; ?>">
			                <?php endforeach; ?>
						</datalist>
					</div>
					
					<div class="">
						<label>Link: </label><br>
						<input class="input-large" name="link" id="link" value="" placeholder="http://youtube.com/...." type="text" required>
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
						<label>T&oacute;picos, curso e descri&ccedil;&atilde;o: </label><br>			
						<input class="input-large" type='text' name='text' placeholder="ex. 1&ordf; ou 2&ordf; prova; Produto vetorial, matrizes; eng. civil.."/>
					</div>
					
					<div class="centered">
						<input class="btn btn-default" type="submit" value="Enviar">
					</div>
				</form>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->


<?php include_once("footer.php");?>