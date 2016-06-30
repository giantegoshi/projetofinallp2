<?php echo $menu; ?>
<div class="container">
	<div class = "row">
		
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">
			<form>
				<div class="form-group">
					<label class="control-label col-sm-12 text-center"><h1><?php echo str_replace("\r\n",'<br>',str_replace("  ", " &nbsp;", $home_value['titulo'])); ?></h1></label>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-12 text-center"><h3><?php echo str_replace("\r\n",'<br>',str_replace("  ", " &nbsp;", $home_value['descricao'])); ?></h3></label>
				</div>
			</form>
		</div>
	</div>