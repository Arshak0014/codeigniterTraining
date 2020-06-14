
<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-sm-10">
			<h1><?= $user['name'] ?></h1></div>
		<div class="col-sm-2">
			<a href="#" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<!--left col-->

			<ul class="list-group">
				<li class="list-group-item text-muted">Profile</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Joined: </strong></span><?= $user['register_date'] ?></li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Last seen: </strong></span> Yesterday</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Real name: </strong></span><?= $user['name'] ?></li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Email: </strong></span><?=$user['email']?></li>
			</ul>

			<ul class="list-group">
				<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>User Zipcode</strong></span> <?= $user['zipcode'] ?></li>
			</ul>

		</div>
		<!--/col-3-->
		<div class="col-sm-8">

			<ul style="font-size: 20px" class="nav nav-tabs" id="myTab">
				<li class="mr-3"><a style="margin: 0;" class="user_prof_tabs btn btn-dark" id="show-settings" href="/profile">Settings</a></li>
			</ul>

			<?php echo form_open('profile/change_password') ?>

			<h2 class="mt-5">Change your password</h2>

					<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>


					<div class="form-group">

						<div class="col-xs-6">
							<label for="old_password">
								Old Password</label>
							<input type="password" value="<?= $this->input->post('old_password');?>" class="form-control" name="old_password" id="old_password" placeholder="Old password">
						</div>
					</div>
					<div class="form-group">

						<div class="col-xs-6">
							<label for="new_password">
								New Password</label>
							<input type="password" value="<?= $this->input->post('new_password');?>" class="form-control" name="new_password" id="new_password" placeholder="New password">
						</div>
					</div>
					<div class="form-group">

						<div class="col-xs-6">
							<label for="repeat_password">
								Repeat Password</label>
							<input type="password" value="<?= $this->input->post('new_password');?>" class="form-control" name="repeat_password" id="repeat_password" placeholder="Repeat password">
						</div>
					</div>


					<div class="form-group">
						<div class="col-xs-12">
							<button style="width: 100%;" class="btn btn-lg btn-success" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
						</div>
					</div>

			</form>
			<!--/tab-pane-->
		</div>
		<!--/tab-content-->

	</div>
	<!--/col-9-->
</div>

