	<!-- FOOTER -->
	<div id="f">
		<div class="container">
			<div class="row centered">
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
			    <br>
			    <section class="col-lg-12">
					<div id="fb-root"></div>
					<script>
						(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=361932343976909";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));
					</script>
					<div class="fb-like" data-href="https://www.facebook.com/seumerito" data-width="100" data-colorscheme="dark" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				</section>
				<br>
				<!--<a href="#"><i class="fa fa-twitter"></i></a>-->
				<a href="https://www.facebook.com/seumerito" target="_blanck" title="Nossa página no Facebook"><i class="fa fa-facebook"></i></a>
				<a href="https://instagram.com/seumerito/" target="_blanck" title="Nossa página no Instagram"><i class="fa fa-instagram"></i></a>
				
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Footer -->

	
	
	
	<!-- MODAL FOR CONTACT -->
	<!-- Modal -->
	<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">Entrar</h4>
	            </div>
	            <form action="<?php echo ROOT;?>auth/login" method="post">
    	          <div class="modal-body">
        		      <div class="row centered">
        		  	    <div class="col-lg-12 pricing-option">
              	      <a  href="https://www.facebook.com/dialog/oauth?client_id=1445655249068689&scope=email,public_profile&redirect_uri=<?php echo _GET; ?>" class="pricing-signup">Entrar com Facebook</a>
                    </div>
	        					<div class="col-lg-12">
	        						<input name="email" id="email" value="" placeholder="E-mail" type="email">
	        					</div>
		        					<div class="col-lg-12">
		        						<input name="password" id="pas" value="" placeholder="Senha" type="password">
		        					</div>
	         	        </div>
					    			
					    			<input type="submit" class="btn btn-danger" value="enviar">
					          <div class="col-lg-12">
					        		<a href="<?php echo ROOT;?>auth">Não é cadastrado? Clique aqui</a>
				        	</div>
					        	
    	            </div><!-- /.modal-content -->
	            </form>
	        </div><!-- /.modal-dialog -->
	    </div><!-- /.modal -->
    </div>
    
    <!-- MODAL FOR CONTACT -->
	<!-- Modal -->
	<div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel">Entre em contato</h4>
	            </div>
	            <form action="<?php echo ROOT;?>messages/send" method="post">
    	            <div class="modal-body">
        		        <div class="row centered">
        					<header class="major">
        						<p>Voc&ecirc; tem sugest&otilde;es e quer entrar em contato conosco? Use nosso e-mail: contato@seumerito.com 
        						ou preencha abaixo</p>
        					</header>

        					<div class="col-lg-12">
        						<textarea style="width: 100%; margin:0" name="message" id="message" placeholder="Diz aí... Não se esqueça de por nome e e-mail" required></textarea>
        						<input type="hidden" name="id" value="000">
    						
        						
        						
        					</div>
            	        </div>
            	            <input type="submit" class="btn btn-danger" value="enviar">
                         <br><br>
    	            </div><!-- /.modal-content -->
	            </form>
	        </div><!-- /.modal-dialog -->
	    </div>
    </div><!-- /.modal -->
    
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-61679208-4', 'auto');
			  ga('send', 'pageview');

			</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="//code.jquery.com/jquery.js"></script>
    
    <script src="<?php echo PATH_STYLE; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo PATH_STYLE; ?>assets/js/typer.js"></script>
    
    
        
    <!--Evitar print
    <div style="position: absolute; bottom: 0; opacity: 0; background: RGBA(0,0,0,0);">
		<input type="text" id="copy_message" value="Print screen is not allowed" />
	</div>
	<script>
		$(document).keyup(function(e){
		  if (e.keyCode == 44 || e.keyCode == 16) {
		    $("#copy_message").select();
		    document.execCommand("copy");
		  }
		});
	</script>
     -->


  </body>
</html>