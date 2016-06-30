<?php echo $menu; ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">
			<?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
			<p class="text-danger"><?php echo $erro;?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<h1><p class="text-center"><?php echo $title; ?></p></h1>
		</div>
		<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">
			<?php
				$attributes = array('class'=>'block-center');
				echo form_open(base_url('inserirContato'),$attributes);
			?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
						);
						echo form_label('E-mail: ', 'email',$attributes);
						
						$attributes = array(
							'name' => 'email',
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
						echo form_label('Descrição: ', 'descricao',$attributes);
						
						$attributes = array(
							'name' => 'descricao',
							'class' => 'form-control',
							'maxLength' => '80',
							'autofocus'   => 'autofocus',
							'rows' => '5',
						);
						echo form_textarea($attributes);
					?>
				</div>
				<button class="btn btn-primary col-sm-4 col-sm-offset-4" type='submit' name = 'submit'>Enviar</button>
			<?php
				echo form_close();
			?>
		</div>
	</div>