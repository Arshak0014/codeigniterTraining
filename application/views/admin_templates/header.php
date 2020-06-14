<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/style.css">


	<title><?php echo $title ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

</head>

<body>
<div  class="wrapper " style="display: flex;">
	<div class="my_left_side sidebar" data-color="purple" data-background-color="white">

		<div class="logo">
			<a class="simple-text logo-mini">
				ADMINISTRATOR
			</a>
		</div>
		<div class="sidebar-wrapper">
			<ul class="nav">
				<li class="my_nav_it nav-item">
					<a style="background: #32383e;padding: 20px;" class="nav-link" href="<?php echo base_url() ?>admin_dashboard">
						DASHBOARD
					</a>
				</li>
				<li class="my_nav_it nav-item">
					<a style="background: #32383e;padding: 20px;" class="nav-link" href="<?php echo base_url() ?>admin_categories">
						CATEGORIES
					</a>
				</li>
				<li class="my_nav_it nav-item">
					<a style="background: #32383e;padding: 20px;" class="nav-link" href="<?php echo base_url() ?>admin_products">
						PRODUCTS
					</a>
				</li>
				<li class="my_nav_it nav-item">
					<a style="background: #32383e;padding: 20px;" class="nav-link" href="#">
						ORDERS
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-panel" style="width: 100%;">
		<!-- Navbar -->
		<nav style="margin: 0" class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
			<div style="padding: 6px;" class="container-fluid">
				<h2 class="my_title"><?= $title ?></h2>
				<div style="padding: 0;float: right" class="header_main collapse navbar-collapse justify-content-end">

					<ul class=" navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url() ?>" target="_blank">
								SITE HOME
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url() ?>users/logout">
								LOG OUT
							</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>
		<div style="margin: 15px">
		<?php if($this->session->flashdata('product_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('product_created').'</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('product_updated')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('product_updated').'</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('category_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('product_deleted')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('product_deleted').'</p>'; ?>
		<?php endif; ?>
		</div>
