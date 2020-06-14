<div class="site-blocks-cover overlay" style="background-image: url(../../../assets/images/site/hero_1.jpg); margin-top: -25px; " data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center text-center">

			<div class="col-md-12" data-aos="fade-up" data-aos-delay="400">

				<div class="row justify-content-center mb-4">
					<div class="col-md-8 text-center">
						<h1>We Love To Build <span class="typed-words"></span></h1>
						<p class="lead mb-5">Free Web Template by <a style="color: #32dbc6" href="#" target="_blank">Lorem Ipsum</a></p>
						<div><a style="background: #32dbc6;color: white; border: none" data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="btn btn-primary btn-md">Watch Video</a></div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<div style="display: flex">
	<div style="margin-top: 25px" class="left-bar-main bg-dark">
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
		<h2 style="margin: 25px 0px 25px 85px;">Recommended Products</h2>
		<div class="product_cards">

			<?php foreach ($products->result_array() as $product) : ?>

				<div style="margin-bottom: 0px!important;" id="counted" class="card">
					<a href="<?= site_url('/products/'.$product['slug']) ?>">
						<img class="img-thumbnail" style="width:248px;height: 248px" src="../../../assets/images/products/<?= $product['image'] ?>" alt="">
					</a>
					<h1 style="font-size: 21px;" class="mt-2 mb-0"><?=$product['title'] ?></h1>
					<p class="price"><span style="color: darkred">Price</span> <?=$product['price']?> $</p>
					<div style="display: flex;justify-content: center;">
						<input type="number" name="quantity" id="<?=$product['id'];?>" class="quantity quantity_input" value="1">
					</div>
					<button class="add_cart btn btn-success btn-block mt-2 change_cont" name="change_cont" data-productid="<?php echo $product['id'];?>"
							data-productname="<?php echo $product['title'];?>" data-productprice="<?php echo $product['price'];?>" data-productimage="<?php echo $product['image'];?>">Add To Cart
					</button>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</div>
<section class="container site-section">
	<div >
		<div style="margin: 0;" class="row">
			<div class="col-md-6 col-lg-4">
				<div class="p-3 box-with-humber">
					<div class="number-behind">01.</div>
					<h2 class="text-primary">Innovate</h2>
					<p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et praesentium eos nulla qui commodi consectetur beatae fugiat. Veniam iste rerum perferendis.</p>
					<ul class="list-unstyled ul-check primary">
						<li>Customer Experience</li>
						<li>Product Management</li>
						<li>Proof of Concept</li>
					</ul>
				</div>
			</div>

			<div class="col-md-6 col-lg-4">
				<div class="p-3 box-with-humber">
					<div class="number-behind">02.</div>
					<h2 class="text-primary">Create</h2>
					<p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et praesentium eos nulla qui commodi consectetur beatae fugiat. Veniam iste rerum perferendis.</p>
					<ul class="list-unstyled ul-check primary">
						<li>Web Design</li>
						<li>Branding</li>
						<li>Web &amp; App Development</li>
					</ul>
				</div>
			</div>

			<div class="col-md-6 col-lg-4">
				<div class="p-3 box-with-humber">
					<div class="number-behind">03.</div>
					<h2 class="text-primary">Scale</h2>
					<p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et praesentium eos nulla qui commodi consectetur beatae fugiat. Veniam iste rerum perferendis.</p>
					<ul class="list-unstyled ul-check primary">
						<li>Social Media</li>
						<li>Paid Campaigns</li>
						<li>Marketing &amp; SEO</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
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
					$('.badge').text(data.cart_item);
				}
			});
		});
	})

</script>
