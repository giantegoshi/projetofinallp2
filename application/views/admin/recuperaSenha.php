<div class="container">
	<br /><br />
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">
			<p><h1>Sistema Admin</h1></p>
			<p><h3>Recuperar Senha</h3></p>
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
			echo form_open(base_url('admin/recuperaSenha'),$attributes);
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
						'class' => 'control-label col-sm-8 col-sm-offset-2 text-center',
					);
					echo form_label($usuario_value['pergunta'], 'pergunta',$attributes);
				?>
			</div>
			<div class="form-group">
				<?php
					$attributes = array(
						'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
					);
					echo form_label('Resposta: ', 'resposta',$attributes);
					
					$attributes = array(
						'name' => 'resposta',
						'class' => 'form-control text-center',
						'maxLength' => '80',
						'autofocus'   => 'autofocus',
					);
					echo form_input($attributes);
				?>
			</div>
			
			<button class="btn btn-primary col-sm-4 col-sm-offset-4" type='submit' name = 'submit'>Recuperar</button>
		<?php
			echo form_close();
		?>
		<div class="col-sm-4 col-sm-offset-4 text-center">
		<br>
			<a href="<?php echo base_url('admin'); ?>"><button class="btn btn-primary" type='submit' name = 'submit'>Voltar</button></a>
		</div>
	</div>
</div>