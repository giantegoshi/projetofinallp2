<?php echo $menu; ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">
			<?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
			<p class="text-danger"><?php echo $erro;?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4">
			<h1><p class="text-center"><?php echo $title; ?></p></h1>
		</div>
		<?php echo $contato_value; ?>
	</div>