
<div class="container">
	<?php
		if($success=="true"){
	?>
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span><strong> Cadastro realizado com sucesso !</strong>
	</div>
	<?php
		}
	?>
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('register/index', 'role="form" class="formsignin"'); ?>
		<h2 class="form-signin-heading"><?php echo $this->lang->line('register_page_title'); ?></h2>
		
		<input type="text" class="form-control" name="usr_fname" placeholder="Digite seu nome" autofocus>
		<input type="text" class="form-control" name="usr_lname" placeholder="Digite seu sobrenome" >
		<input type="email" class="form-control" name="usr_email" placeholder="Digite seu e-mail" >
		
		<?php echo form_submit('submit', 'Register', 'class="btn btnlg btn-primary btn-block"'); ?>
	</form>
	
</div>