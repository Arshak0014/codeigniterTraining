<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#hide").click(function(){
				$("#p-profile-data-inputs").hide();
				$("#div-show-password-settings").show();

			});
			$("#show").click(function(){
				$("#p-profile-data-inputs").show();
				$("#div-show-password-settings").hide();
			});
		});
	</script>

	<title><?=$title?></title>
</head>
<body>

<div style="position: relative">
	<div class="cart_count">
		<a style="color: white; font-weight: bold;position: relative;" href="<?php echo base_url() ?>cart">
			<span style="margin-right:3px;font-size: 20px;" class="cart_main  glyphicon-shopping-cart" aria-hidden="true"></span>
			Cart (<span style="font-size: 16px;color: white!important;" class="pt-3 change_res"><?= count($this->cart->contents()) ?></span>)
		</a>
	</div>
</div>

<nav class="mb-4 navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">

		<a class="navbar-brand text-warning" href="<?php echo base_url() ?>"><b>Electronics.</b></a>
		<div style="margin-left: 50px;" class="my-head-menu collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>about">About</a>
				</li>
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>products">Products</a>
				</li>
				<li style="margin-right: 420px" class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>contact">Contact</a>
				</li>

				<?php if (!$this->session->userdata('logged_in')) : ?>
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>users/login">Login</a>
				</li>
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>users/register">Register</a>
				</li>
				<?php else: ?>
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>profile">Profile</a>
				</li>
				<li class="nav-item">
					<a class="text-white nav-link" href="<?php echo base_url() ?>users/logout">Logout</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>

<div>
	<div  class="container">
	<?php if($this->session->flashdata('user_registered')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_failed')): ?>
		<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedIn')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedIn').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedOut')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedOut').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_data_changed')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_data_changed').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_password_changed')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_password_changed').'</p>'; ?>
	<?php endif; ?>
	</div>

