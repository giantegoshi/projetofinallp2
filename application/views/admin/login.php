<div class="container">
	<br /><br />
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">
			<p><h1>Sistema Admin</h1></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">
			<?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
			<p class="text-danger"><?php echo $erro;?></p>
		</div>
	</div>
	<div class="row">
		<?php
			$attributes = array('class'=>'block-center col-sm-4 col-sm-offset-4');
			echo form_open(base_url('admin'),$attributes);
		?>
			<div class="form-group">
				<?php
					$attributes = array(
						'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
					);
					echo form_label('Usuário: ', 'usuario',$attributes);
					
					$attributes = array(
						'name' => 'usuario',
						'class' => 'form-control text-center',
						'maxLength' => '80',
						'autofocus'   => 'autofocus',
					);
					echo form_input($attributes);
				?>
			</div>
			
			<div class="form-group">
				<?php
					$attributes = array(
						'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
					);
					echo form_label('Senha: ', 'senha',$attributes);
					
					$attributes = array(
						'name' => 'senha',
						'class' => 'form-control text-center',
						'maxLength' => '80'
					);
					echo form_password($attributes);
				?>
			</div>
			<button class="btn btn-primary col-sm-4 col-sm-offset-4" type='submit' name = 'submit'>Entrar</button>
		<?php
			echo form_close();
		?>
		<div class="col-md-12 text-center">
		<br>
			<a href="<?php echo base_url('admin/recuperaSenha'); ?>">Esqueci a Senha</a>
		</div>
	</div>
</div>