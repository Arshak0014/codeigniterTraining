<?php //var_dump($product['id']); exit();?>


<div style="display: flex">
	<div style="width: 325px!important;" class="left-bar-main bg-dark">
		<div>
			<ul class="list-group">
				<?php foreach ($categories as $category_item): ?>
					<li style="background: dimgray;text-align: center" class="m-1 list-group-item">
						<a style="color: white;" href="<?= site_url('/categories/products/'.$category_item['id'])?>"><?= $category_item['name'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div style="margin: 0 65px" class="container">
		<div style="width: 100%; display: flex;justify-content: space-between">
			<div style="" class="col-xs-4 mr-5">
				<img style="width: 400px" src="../../../assets/images/products/<?= $product['image'] ?>" />
			</div>
			<h2 class="text-dark"><?=$product['title'] ?></h2>
		</div>
		<div class="col-xs-5 mb-4" style="border:0px solid gray">

			<h6 class="titles"><span>Category:</span></h6>
			<div>
				<div style="font-size: 16px"><?=$category?></div>
			</div>

			<h6 class="titles"><span>Product Price</span></h6>
			<div>
				<div style="font-size: 16px"><?=$product['price'] ?>$</div>
			</div>

			<div style="background: aliceblue" class="section">
				<h6 class="titles title-attr" style="margin-top:15px;" ><span>Description</span></h6>
				<div>
					<?=$product['body'] ?>
				</div>
			</div>
			<div style="background: aliceblue;padding-bottom:5px;" class="section">
				<h6 class="titles title-attr"><span>Status</span></h6>
				<div>
					<?php if ($product['is_new'] == '1'):?>
						<div class="status_active">NEW</div>
					<?php else: ?>
						<div class="status_passive">OLD</div>
					<?php endif; ?>
				</div>
			</div>
			<div style="background: aliceblue" class="section">
				<h6 class="titles title-attr" style="margin-top:15px;" ><span>Adding Time</span></h6>
				<div>
					<?=$product['create_date'] ?>
				</div>
			</div>
			<div class="mt-4 mb-4">
				<h6 class=$product"titles title-attr" style="margin-top:15px;" ><span>Count</span></h6>
				<div  style="display: flex;">
					<b class="mr-2">QTY</b>
					<input type="text" name="quantity" id="quantity<?=$product['id'];?>" class="quantity_input" value="1">
				</div>
			</div>
			<input type="hidden" name="hidden_image" id="image<?=$product['id'];?>" value="<?=$product['image'] ?>">
			<input type="hidden" name="hidden_name" id="name<?=$product['id'];?>" value="<?=$product['title'] ?>">
			<input type="hidden" name="hidden_price" id="price<?=$product['id'];?>" value="<?=$product['price'] ?>">
			<input type="button" name="add_to_cart" id="<?=$product['id'];?>" class="btn btn-warning mt-2 add_to_cart " value="Add To Cart">
		</div>
	</div>
</div>


<script>
	$(document).ready(function(){
		//-- Click on detail
		$("ul.menu-items > li").on("click",function(){
			$("ul.menu-items > li").removeClass("active");
			$(this).addClass("active");
		})

		$(".attr,.attr2").on("click",function(){
			var clase = $(this).attr("class");

			$("." + clase).removeClass("active");
			$(this).addClass("active");
		})

		//-- Click on QUANTITY
		$(".btn-minus").on("click",function(){
			var now = $(".section > div > input").val();
			if ($.isNumeric(now)){
				if (parseInt(now) -1 > 0){ now--;}
				$(".section > div > input").val(now);
			}else{
				$(".section > div > input").val("1");
			}
		})
		$(".btn-plus").on("click",function(){
			var now = $(".section > div > input").val();
			if ($.isNumeric(now)){
				$(".section > div > input").val(parseInt(now)+1);
			}else{
				$(".section > div > input").val("1");
			}
		})
	})
</script>
