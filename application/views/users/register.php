
<h2 align="center"><?= $title ?></h2>

<div class="row">
	<div align="center" style="margin: 0 auto" class="col-md-4">
		<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	</div>
</div>

<?php echo form_open('users/register') ?>
<div class="row">
	<div style="margin: 0 auto" class="col-md-4">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control" placeholder="Name" value="<?= $this->input->post('name');?>">
		</div>
		<div class="form-group">
			<label>Zipcode</label>
			<input type="text" name="zipcode" class="form-control" placeholder="Zipcode" value="<?= $this->input->post('zipcode');?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Email" value="<?= $this->input->post('email');?>">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $this->input->post('username');?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" value="<?= $this->input->post('password');?>">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="password2" class="form-control" placeholder="Confirm Password"value="<?= $this->input->post('password2');?>">
		</div>
		<button type="submit" class="btn btn-success btn-block">Register</button>
	</div>
</div>

<?php echo form_close() ?>

