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
 
	<div id="headerwrap">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
				<div style="margin-top: 9%;"><br></div>
        			<img width="100" src="<?php echo PATH_STYLE; ?>assets/img/logo.png" style="margin-top:7px;"/>
        			
        			<h2>Seu M&eacute;rito</h2>
        			<h3>
        			    Sua plataforma colaborativa de <span class="typer" data-delay="100" data-words="provas, listas, resumos, resoluções, aulas" data-colors="white"></span><span class="cursor" data-owner="first-typer"></span><br> 
        			    <a style="text-decoration: none; color: #fff" href="<?php echo ROOT;?>share/material">Contribua para um maior acervo.</a>

        			</h3>

            			<form action="<?php echo _GET; ?>" method="GET">
            				<input type="text" name="search" class="search-input" placeholder="Pesquisar por nome  do professor ou conteúdo">
            			</form>
                        <br>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- headerwrap -->


	
	<!-- Faz um foreach aqui para todas as matérias-->
	<div id="dg">
		<div class="container">
			<div class="row centered">
			<!--
			<a target=="_blank" href="http://www.blesshost.com.br/"><img src="<?php echo URL.ROOT.'banner.jpg'; ?>"/></a>
			    <br style="clear:all"><br>
			-->
			    
		   <div class="col-lg-4">
                                                   
                            <a target=="_blank" href="http://www.blesshost.com.br/"><img src="<?php echo URL.ROOT.'banner2.jpg'; ?>"/></a>
                       <br><br>
                    </div>	    
			    
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
	
	<div id="blue">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
    				<h2>De universit&aacute;rios para universit&aacute;rios</h2>
    
    				<p>Estamos trabalhando para conseguir o m&aacute;ximo de conte&uacute;do para voc&ecirc;.
    				Aproveite e compartilhe o que voc&ecirc; j&aacute; possui. &Eacute; ajudando que se recebe ajuda ;)</p>
    	    		<br>
    				<div class="pricing-option">
    				   <a href="<?php echo ROOT; ?>share/material" class="pricing-signup">Compartilhe</a>
    				</div>
		        </div>
		    </div>
		</div>
	</div><!-- container -->


	<!-- PORTFOLIO SECTION -->
	<div id="dg">
		<div class="container">
			<h2>Sobre</h2>
						
			<div class="container">
				<p>O Seu Mérito é uma plataforma de crowdsourcing, ou seja, um site colaborativo feito de alunos para alunos. 
					Faça sua contribuição upando suas provas para que possamos disponibilizar a vocês, de forma gratuita, o maior acervo de provas do mundo. 
                    <br>
                    Apesar de focados em engenharias nossa plataforma é aberta a qualquer pessoa ou curso que deseje colaborar com essa preservação de conhecimento.</p>
        	</div>
		</div><!-- container -->
	</div><!-- DG -->

	
	<div id="blue">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
    				<h2>Como funciona</h2>
    				<p>
    				É simples e rápido. Basta enviar uma prova para nosso sistema que automaticamente ela estará disponível para qualquer usuário. Você também pode visualizar qualquer prova online ou realizar o download da mesma.
                    <br>
                    Nossa plataforma ainda te dá a oportunidade de comprar aulas particulares de nossos usuários, ou se preferir ofertar suas próprias aulas. Você também tem a opção de comercializar a sua resolução da prova.
                    </p>
		        </div>
		    </div>
		</div>
	</div><!-- container -->


<?php include_once("footer.php");?>