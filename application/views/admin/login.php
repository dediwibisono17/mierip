<!DOCTYPE html>
<html>
<head>
	<title><?php echo $meta_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<style>
		body { background-color: #a5a5a5; }
	</style>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<div class="modal show">
			<div class="modal-dialog">
				<div class="modal-content">
				<?php echo form_open('auth/login_post', array('role' => 'form')); ?>
					<div class="modal-header">
						<?php echo form_button(array('class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => 'true', 'content' => '&times;')); ?>
						<h4 class="modal-title">Log In - Admin Panel</h4>
					</div>
					<div class="modal-body">
						<?php if($this->session->flashdata('error')) : ?>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<?php echo form_label('Login', 'login'); ?>
							<?php echo form_input(array('name' => 'login', 'id' => 'login', 'class' => 'form-control', 'placeholder' => 'Login')); ?>
						</div>
						<div class="form-group">
							<?php echo form_label('Password', 'password'); ?>
							<?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')); ?>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo form_submit(array('name' => 'submit', 'value' => 'Login', 'class' => 'btn btn-primary')); ?>
					</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>