<!DOCTYPE html>
<html>
<head>
	<title><?php echo $meta_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<style type="text/css">
		body { padding-top: 70px; }
	</style>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-admin">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo anchor(base_url(), 'Mierip', array('class' => 'navbar-brand')); ?>
			</div>
			<div class="collapse navbar-collapse navbar-admin">
				<ul class="nav navbar-nav pull-right">
					<li><?php echo anchor('auth/logout', 'Log out'); ?></li>
				</ul>
				<ul class="nav navbar-nav">
					