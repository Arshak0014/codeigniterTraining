<div style="margin: 15px">
	<div style="display: flex; justify-content: space-between">

		<a class="create nav-link" href="<?php echo base_url() ?>admin_categories/create">CREATE CATEGORY</a>
	</div>
	<div class="table-responsive">
		<table id="employee_data" class="table table-striped table-bordered ">
			<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">Name</th>
				<th scope="col">Create date</th>

			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($categories as $category){
				echo '  
				   <tr>  
						<td>'.$category["id"].'</td>  
						<td>'.$category["name"].'</td>                                 
						<td>'.$category["create_date"].'</td>                                   
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
</script>
