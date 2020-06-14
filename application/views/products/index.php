<?php
//echo '<pre>';
//var_dump($brand_data->result_array());
//echo '</pre>';
//exit();
?>
<div style="display: flex">
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
	<div>
		<div class="product_cards">

			<?php foreach ($products->result_array() as $product) : ?>

				<div id="counted" class="card">
					<a href="<?= site_url('/products/'.$product['slug']) ?>">
						<img class="img-thumbnail" style="width:248px;height: 248px" src="../../../assets/images/products/<?= $product['image'] ?>" alt="">
					</a>
					<h1 style="font-size: 21px;" class="mt-2 mb-0"><?=$product['title'] ?></h1>
					<p class="price"><span style="color: darkred">Price</span> <?=$product['price']?> $</p>
					<div style="display: flex;justify-content: center;">
						<input type="number" name="quantity" id="<?=$product['id'];?>" class="quantity quantity_input" value="1">
					</div>
					<button class="add_cart change_qty btn btn-success btn-block mt-2 change_cont" name="change_cont" data-productid="<?php echo $product['id'];?>"
							data-productname="<?php echo $product['title'];?>" data-productprice="<?php echo $product['price'];?>" data-productimage="<?php echo $product['image'];?>">Add To Cart
					</button>
				</div>

			<?php endforeach; ?>


		</div>
		<p style="margin-left: 85px;" class="main_pagination" ><?php echo $links; ?></p>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('.add_cart').click(function(){
			var product_id    = $(this).data("productid");
			var product_name  = $(this).data("productname");
			var product_price = $(this).data("productprice");
			var product_image = $(this).data("productimage");
			var quantity      = $('#' + product_id).val();

			$.ajax({
				url : "<?php echo base_url(); ?>cart/add",
				method : "POST",
				data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity, product_image: product_image},
				success: function(data){
					alert("Product Added into Cart");
					$('#cart_details').html(data);
					$('#' + product_id).val('');
				}
			});
		});
		$('.change_qty').click(function(){
			$.ajax({
				url : "<?php echo base_url(); ?>cart/change",
				dataType: "JSON",
				method : "POST",
				success: function(data){
					$('.change_res').html(data.countM);
				}
			});
		});

	})

</script>

