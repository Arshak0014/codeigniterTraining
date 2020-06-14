
<div style="margin: 15px">
	<div style="display: flex; justify-content: space-between">

		<a class="create nav-link" href="<?php echo base_url() ?>admin_products/create">CREATE PRODUCT</a>
	</div>
	<div class="table-responsive">
		<table id="employee_data" class="table table-striped table-bordered bg-dark">
			<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">Category</th>
				<th scope="col">Brand</th>
				<th scope="col">Title</th>
				<th scope="col">Price</th>
				<th scope="col">Create date</th>
				<th scope="col"></th>
				<th scope="col"></th>

			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($products->result_array() as $product){
				echo '  
				   <tr>  
						<td>'.$product["id"].'</td>  
						<td>'.$product["name"].'</td>  
						<td>'.$product["brand"].'</td>  
						<td>'.$product["title"].'</td>                                 
						<td>'.$product["price"].'</td>  
						<td>'.$product["create_date"].'</td>                                   
						<td style="text-align: center;"><a class="delete" data-id="'.$product['id'].'">✘</a></td>  
						<td style="text-align: center;" class="update"><a href="'.base_url().'admin_products/edit/'.$product['slug'].'">↻</a></td>  
				   </tr>  
				   ';
			}
			?>

			</tbody>
		</table>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('#employee_data').DataTable({
			"order": [[ 0, 'desc' ]]
		});
	});

	$('.delete').on('click', function () {
		let del_id = $(this).attr('data-id');
		let conf = confirm('delete?');
		if (conf) {
			$(this).attr('href', '/admin_products/delete/' + del_id);
		}
	})
</script>
