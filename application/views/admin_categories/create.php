
<div style="margin: 15px;">

	<h2><?=$title;?></h2>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>

	<?php echo form_open_multipart('admin_categories/create'); ?>


	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control" placeholder="Write category name">
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
