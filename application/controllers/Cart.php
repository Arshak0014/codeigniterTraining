<?php


class Cart extends CI_Controller
{

	public function index(){

		$data['title'] = 'Shopping cart';

		$content = array(
			'id' => $this->input->post('product_id'),
			'name' => $this->input->post('product_name'),
			'price' => $this->input->post('product_price'),
			'image' => $this->input->post('product_image'),
			'qty' => $this->input->post('quantity'),
		);
		$this->cart->insert($content);

		$data['products'] = $this->cart->contents();

		$data['total'] = $this->cart->total();

		$data['categories'] = $this->category_model->get_categories();


		$this->load->view('templates/header',$data);
		$this->load->view('cart/index',$data);
		$this->load->view('templates/footer');
	}

	function add()
	{
		$this->load->library("cart");
		$data = array(
			"id"  => $_POST["product_id"],
			"name"  => $_POST["product_name"],
			"qty"  => $_POST["quantity"],
			"price"  => $_POST["product_price"]
		);
		$this->cart->insert($data); //return rowid
//		echo "<pre>";
//		var_dump(count($this->cart->contents()));
//		echo "</pre>";
//		exit();

		echo $this->view();
	}

	function change(){
		$this->load->library("cart");
		$output = array('countM' => count($this->cart->contents()));
		echo json_encode($output);
	}

	function remove()
	{
		$this->load->library("cart");
		$row_id = $_POST["row_id"];
		$data = array(
			'rowid'  => $row_id,
			'qty'  => 0
		);
		$this->cart->update($data);
		echo $this->view();
	}

	function clear()
	{
		$this->load->library("cart");
		$this->cart->destroy();
		echo $this->view();
	}

	function view()
	{
		$this->load->library("cart");
		$output = '';
		$output .= '
		  <h2>Shopping Cart</h2><br />
		  <div class="table-responsive">
		   <div align="right">
			<button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
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
  		';
		$count = 0;
		foreach($this->cart->contents() as $items)
		{
			$count++;
			$output .= '
   <tr> 
    <td>'.$items["name"].'</td>
    <td>'.$items["qty"].'</td>
    <td>'.$items["price"].'$</td>
    <td>'.$items["subtotal"].'$</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">✘</button></td>
   </tr>
   ';
		}
		$output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>'.$this->cart->total().'$</td>
   </tr>
  </table>

  </div>
  ';

		if($count == 0)
		{
			$output = '<div align="center">Cart is Empty.</div>';
		}
		return $output;
	}


}

