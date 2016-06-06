<?php
	$veiculo['placa'] = isset($veiculo['placa'])?$veiculo['placa']:'Vazio';
	$veiculo['modelo'] = isset($veiculo['modelo'])?$veiculo['modelo']:'Vazio';
	$veiculo['cor'] = isset($veiculo['cor'])?$veiculo['cor']:'Vazio';
	$user['nome'] = isset($user['nome'])?$user['nome']:'Vazio';
	$user['sobrenome'] = isset($user['sobrenome'])?$user['sobrenome']:'';
	$user['email'] = isset($user['email'])?$user['email']:'Vazio';
?>
<div class="row">
	<div class="col-sm-12 text-center">
		<img src="<?php echo base_url('assets/img/car.png'); ?>" class="img-responsive center-block" alt="Responsive image" style="max-width:150px;">
		<h1 style="margin-top:0px;">Sistema Cars 2.0</h1>
	</div>
	<div class="col-sm-12 text-center">
		<h3>Informa&ccedil;&otilde;es do Ve&iacute;culo</h3>
	</div>
</div>
<br><br><br>
<?php if($veiculo['placa']==='Vazio'){echo "<div class='alert alert-danger col-sm-6 col-sm-offset-3' role='alert'>Ve&iacute;culo n&atilde;o encontrado.</div>";} ?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 text-center">
		<table class="table">
		<tr><th colspan="2" class="text-center"><h4>Ve&iacute;culo</h4></th></tr>
			<tr><td>Placa: </td><td><?php echo $veiculo['placa']; ?></td></tr>
			<tr><td>Modelo: </td><td><?php echo $veiculo['modelo']; ?></td></tr>
			<tr><td>Cor: </td><td><?php echo $veiculo['cor']; ?></td></tr>
		</table>
	</div>
</div><br><br><br>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 text-center">
		<table class="table">
		<tr><th colspan="2" class="text-center"><h4>Propriet&aacute;rio</h4></th></tr>
			<tr><td>Nome: </td><td><?php echo $user['nome'].' '.$user['sobrenome']; ?></td></tr>
			<tr><td>E-mail: </td><td><?php echo $user['email']; ?></td></tr>
		</table>
	</div>
</div>