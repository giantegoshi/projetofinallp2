<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<title><?php echo $this->lang->line('system_system_name'); ?></title>
			
			<!-- Bootstrap core CSS -->			
			<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>"	rel="stylesheet">
			
			<!-- Bootstrap theme -->
			<link href="<?php echo base_url ( 'bootstrap/css/bootstrap-theme.min.css' );?>"	rel="stylesheet">
			
			<!-- Custom styles for this template -->
			<!--link href="< ?php echo base_url ( 'bootstrap/css/theme.css' );?>" rel="stylesheet"-->
			
			<!-- Custom styles for app specific stuff -->
			<link href="<?php echo base_url ( 'assets/css/table.css' );?>" rel="stylesheet">
			<link href="<?php echo base_url ( 'assets/css/layout.css' );?>" rel="stylesheet">
			<link href="<?php echo base_url ( 'assets/css/main_nav.css' );?>" rel="stylesheet">
			<link href="<?php echo base_url ( 'assets/css/dashboard.css' );?>" rel="stylesheet">
			<link href="<?php echo base_url ( 'assets/css/tablesorter/blue/style.css' );?>" rel="stylesheet">
			
			<script src="<?php echo base_url('assets/js/jquery/jquery.js');?>"></script>
			<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>	
			<script src="<?php echo base_url('assets/js/jquery/jquery.tablesorter.min.js');?>"></script>
		</head>
		
		<body role="document">
		<div class="container">


		<?php
			echo $sobre_value;
		?>

		</div>
	</body>
</html>