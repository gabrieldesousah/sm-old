<?php include_once("header.php");?>
<style>
#text-paper, #input-title{
	width: 100%;
	background: transparent;
	border: none;
}
#input-title{
	text-align: center;
	font-size: 20px;
}
#text-paper{
	min-height: 700px;
	text-align: justify;
}
</style>
	<div id="dg">
		<div class="container">
			<div class="row centered" id="box">
				<div class="col-lg-12">
					<input id="input-title" type="text" value="<?php echo($this->materialData[0]["title"]);?>">
					<textarea id="text-paper"><?php echo($this->materialData[0]["text"]);?></textarea>
		              
		     </div>   
		</div>
	</div>
    
    
<?php include_once("footer.php");?>