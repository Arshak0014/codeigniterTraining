
	<div class="container bootstrap snippet">
		<div class="row">
			<div class="col-sm-10">
				<h1><?= $user['name'] ?></h1></div>
			<div class="col-sm-2">
				<a href="#" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
			</div>
		</div>
		<div align="left" class="row">
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
					<li style="float: left" class="mr-3"><a style="margin: 0;" class="user_prof_tabs btn btn-warning" id="show-settings" href="profile/change_password">Change Password</a></li>
				</ul>

				<div class="tab-content" id="profile-data">

					<h2 class="mt-5">Change your data</h2>

					<div class="mt-5">
						<?php echo form_open('profile') ?>
							<div class="row">
								<div align="center" style="margin: 0 auto" class="col-md-4">
									<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
								</div>
							</div>
							<div class="form-group">

								<div class="col-xs-6">
									<label for="first_name">
										Name</label>
									<input type="text" value="<?= $user['name'] ?>" class="form-control" name="name" id="first_name" placeholder="first name" title="enter your first name if any.">
								</div>
							</div>
							<div class="form-group">

								<div class="col-xs-6">
									<label for="last_name">
										Username</label>
									<input type="text" value="<?= $user['username'] ?>" class="form-control" name="username" id="last_name" placeholder="last name" title="enter your last name if any.">
								</div>
							</div>

							<div class="form-group">

								<div class="col-xs-6 pb-3">
									<label for="email">
										Email</label>
									<input disabled type="email" value="<?= $user['email'] ?>" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
								</div>
							</div>

							<div class="form-group">
								<div class="col-xs-12">
									<button style="width: 100%" class="btn btn-lg btn-success" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
								</div>
							</div>
						</form>

					</div>

				</div>
				<!--/tab-pane-->
			</div>
			<!--/tab-content-->

		</div>
		<!--/col-9-->
	</div>





