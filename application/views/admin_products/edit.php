<div style="margin: 15px">
<h2><?=$title;?></h2>

<?php echo validation_errors() ?>
<?php echo form_open('admin_products/update'); ?>
<input type="hidden" name="id" value="<?=$product['id']?>">

<div class="form-group">
	<label>Category</label>
	<select name="categories_id" id="" class="form-control">
		<?php foreach ($categories as $category): ?>
			<option value="<?= $category['id'] ?>" <?= $category['id'] == $product['categories_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
		<?php endforeach; ?>
	</select>
</div>

<div class="form-group">
	<label>Title</label>
	<input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Write title" value="<?=$product['title']?>">
</div>

<div class="form-group">
	<label>Brand</label>
	<input type="text" name="brand" class="form-control" aria-describedby="emailHelp" placeholder="" value="<?=$product['brand']?>">
</div>

<div class="form-group">
	<label>Body</label>
	<textarea id="editor1" name="body" class="form-control" placeholder="Write body"><?=$product['body']?></textarea>
</div>

<button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
