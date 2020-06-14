<?php //debug($_POST); ?>
<div style="margin: 15px;">

	<h2><?=$title;?></h2>
	<?php echo validation_errors() ?>

	<?php echo form_open_multipart('admin_products/create'); ?>

	<div class="form-group">
		<label>Category</label>
		<select name="categories_id" id="" class="form-control">
			<?php foreach ($categories as $category): ?>
				<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group">
		<label>Brand</label>
		<input type="text" name="brand" class="form-control" aria-describedby="emailHelp" placeholder="Write Brand">
	</div>

	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Write title">
	</div>

	<div class="form-group">
		<label>Body</label>
		<textarea id="editor1" name="body" class="form-control" placeholder="Write body"></textarea>
	</div>

	<div class="form-group">
		<label>Upload Image</label>
		<input type="file" name="userfile" size="20">
	</div>

	<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control" placeholder="Write price">
	</div>

	<div class="form-group">
		<label>Status</label>
		<select name="is_new" id="" class="form-control">
			<option disabled selected value>Is new?</option>
			<option value="1">New</option>
			<option value="0">Old</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
