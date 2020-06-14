
<?php

class Products extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('url');
	}

	public function index(){

		$data['brand_data'] = $this->filter_model->get_filtered_type('brand');
		$data['price_data'] = $this->filter_model->get_filtered_type('price');


		// pagination configs

		$config = array();
		$config["base_url"] = base_url() . "products";
		$config["total_rows"] = $this->product_model->get_count();
		$config["per_page"] = 9;
		$config["uri_segment"] = 2;
		$config["use_page_numbers"] = TRUE;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$data["links"] = $this->pagination->create_links();

		// end

		$data['title'] = "Latest Products";

		$data['products'] = $this->product_model->get_products(FALSE,$config["per_page"],$page);


		$data['categories'] = $this->category_model->get_categories();


		$this->load->view('templates/header',$data);
		$this->load->view('products/index',$data);
		$this->load->view('templates/footer');
	}

	public function view($slug = null){
		$data["product"] = $this->product_model->get_products($slug,FALSE,FALSE);
		$data['categories'] = $this->category_model->get_categories();

		$data_id = $data['product']['id'];

		if (empty($data['product'])){
			show_404();
		}
		$data['title'] = $data['product']['title'];

		$categories = $this->category_model->get_categories();

		$data['category'] = '';

		foreach ($data['categories'] as $category){
			if ($category['id'] == $data['product']['categories_id']){
				$data['category'] .= $category['name'];
			}
		}

		$this->load->view('templates/header',$data);
		$this->load->view('products/view',$data);
		$this->load->view('templates/footer');
	}

}
