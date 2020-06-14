<h2 align="center"><?php echo $title ?></h2>
<div class="row">
	<div align="center" style="margin: 0 auto" class="col-md-4">
	<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	</div>
</div>
<?php echo form_open('users/login') ?>
<div class="row">
	<div style="margin: 0 auto" class="col-md-4 ">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" required autofocus value="<?= $this->input->post('username');?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
		</div>
		<button type="submit" class="btn btn-success btn-block">Login</button>
	</div>
	</div>

<?php echo form_close() ?>
