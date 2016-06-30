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
		<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">
			<?php
				$attributes = array('class'=>'block-center');
				echo form_open(base_url('admin/alterarUsuario'),$attributes);
			?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
						);
						echo form_label('Senha: ', 'senha',$attributes);
						
						$attributes = array(
							'name' => 'senha',
							'class' => 'form-control text-center',
							'maxLength' => '80',
							'autofocus'   => 'autofocus',
							'rows' => '5'
						);
						echo form_password($attributes);
					?>
				</div>
				<div class="form-group">
					<?php
						$attributes = array(
							'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
						);
						echo form_label('Confimar Senha: ', 'confSenha',$attributes);
						
						$attributes = array(
							'name' => 'confSenha',
							'class' => 'form-control text-center',
							'maxLength' => '80',
							'autofocus'   => 'autofocus',
							'rows' => '5'
						);
						echo form_password($attributes);
					?>
				</div>
				<div class="form-group">
					<?php
						$attributes = array(
							'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
						);
						echo form_label('Pergunta Secreta: ', 'pergunta',$attributes);
						
						$attributes = array(
							'name' => 'pergunta',
							'class' => 'form-control text-center',
							'maxLength' => '80',
							'autofocus'   => 'autofocus',
							'rows' => '5',
							'value' => $usuario_value['pergunta']
						);
						echo form_input($attributes);
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
							'rows' => '5',
							'value' => $usuario_value['resposta']
						);
						echo form_input($attributes);
					?>
				</div>
				<input type="text" class="hidden" name="id" value="<?php echo $usuario_value['id']; ?>">
				<button class="btn btn-primary col-sm-4 col-sm-offset-4" type='submit' name = 'submit'>Aterar</button>
			<?php
				echo form_close();
			?>
		</div>
	</div>