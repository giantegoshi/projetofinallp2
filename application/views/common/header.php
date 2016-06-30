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

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		
		<body role="document">
		<div class="container">
		<?php if(!isset($menu_off)){?>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Gian Seiji Tegoshi</a>
		    </div>
		<?php } ?>
		<!-- END header.php -->