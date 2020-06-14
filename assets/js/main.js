$('.delete').on('click', function () {
	let del_id = $(this).attr('data-id');
	let conf = confirm('delete?');
	if (conf) {
		$(this).attr('href', '/admin_products/delete/' + del_id);
	}
})
CKEDITOR.replace( 'editor1' );



$(document).ready(function(){
	$("#hide").click(function(){
		$("#p-profile-data-inputs").hide();
		$("#div-show-password-settings").show();

	});
	$("#show").click(function(){
		$("#p-profile-data-inputs").show();
		$("#div-show-password-settings").hide();
	});
});

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
