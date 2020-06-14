<?php

class Categories extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('url');
	}

	public function index(){
		$data['title'] = "Categories";

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header',$data);
		$this->load->view('categories/index',$data);
		$this->load->view('templates/footer');
	}

	public function products($id){

		$config = array();
		$config["base_url"] = base_url() . "categories/products/17";
		$config["total_rows"] = $this->product_model->get_cat_prod_count($id);
		$config["per_page"] = 9;
		$config["uri_segment"] = 4;
		$config["use_page_numbers"] = TRUE;


		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['title'] = $this->category_model->get_category($id)->name;

		$data['products'] = $this->product_model->get_products_by_category($id,$config["per_page"],$page);

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header',$data);
		$this->load->view('products/index',$data);
		$this->load->view('templates/footer');
	}
}
