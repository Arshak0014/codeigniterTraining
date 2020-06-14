<div style="display: flex;">
	<div class="left-bar-main bg-dark">
		<ul class="list-group">
			<h2 align="center" class="p-2">Categories</h2>
			<?php foreach ($categories as $category): ?>
				<li style="background: dimgray;text-align: center" class="m-1 list-group-item">
					<a style="color: white;" href="<?= site_url('/categories/products/'.$category['id'])?>"><?= $category['name'] ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div id="cart_details">
		<div>
			<h2>Shopping Cart</h2>
			<div class="table-responsive">
				<?php if ($products) : ?>
				<div align="right">
					<button type="button" id="clear_cart" class="clear_cart2 btn btn-warning">Clear Cart</button>
				</div>
				<br />
				<table class="table table-bordered">
					<tr>
						<th width="40%">Name</th>
						<th width="15%">Quantity</th>
						<th width="15%">Price</th>
						<th width="15%">Total</th>
						<th width="15%">Action</th>
					</tr>
					<?php foreach ($products as $product) : ?>

					<tr>
						<td><?= $product['name'] ?></td>
						<td><?= $product['qty'] ?></td>
						<td><?= $product['price'] ?>$</td>
						<td><?= $product['subtotal'] ?>$</td>
						<td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="<?= $product['rowid'] ?>">✘</button></td>
					</tr>

					<?php endforeach; ?>

					<tr>
						<td colspan="4" align="right">Total</td>
						<td><?= $this->cart->total() ?>$</td>
					</tr>
				</table>
				<?php else: ?>
				<div align="center">Cart is Empty.</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$(document).on('click', '.remove_inventory', function(){
			var row_id = $(this).attr("id");
			if(confirm("Are you want to remove this?"))
			{
				$.ajax({
					url:"<?php echo base_url(); ?>cart/remove",
					method:"POST",
					data:{row_id:row_id},
					success:function(data)
					{
						$('#cart_details').html(data);
					}
				});
			}
			else
			{
				return false;
			}
		});

		$('.clear_cart2').click(function(){
			$.ajax({
				url : "<?php echo base_url(); ?>cart/change",
				dataType: "JSON",
				method : "POST",
				success: function(data){
					$('.change_res').html(data.countM);
				}
			});
		});

		$(document).on('click', '#clear_cart', function(){
			if(confirm("Are you want to clear cart?"))
			{
				$.ajax({
					url:"<?php echo base_url(); ?>cart/clear",
					success:function(data)
					{
						alert("Your cart cleared.");
						$('#cart_details').html(data);
					}
				});
			}
			else
			{
				return false;
			}
		});
	})
</script>



