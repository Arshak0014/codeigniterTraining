<?php

class Product_model extends CI_Model {

	protected $table = 'products';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all($limit = ''){
		$this->db->limit($limit);
		$this->db->order_by('products.id',"DESC");
		$this->db->select('products.*, categories.name')
			->from('products')
			->join('categories', 'categories.id = products.categories_id');
		return $this->db->get();
	}

	public function get_products($slug = FALSE,$limit = '',$start = ''){
		if ($slug === FALSE){
			$this->db->limit($limit, $start);
			$this->db->order_by('products.id',"DESC");
			$this->db->select('products.*, categories.name')
				->from('products')
				->join('categories', 'categories.id = products.categories_id');
			return $this->db->get();
		}

		$query = $this->db->get_where('products', array('slug' => $slug));


		return $query->row_array();
	}

	public function get_products_admin(){
		$this->db->order_by('products.id',"DESC");
		$this->db->select('products.*, categories.name')
			->from('products')
			->join('categories', 'categories.id = products.categories_id');
		return $this->db->get();
	}

	public function get_count() {
		return $this->db->count_all($this->table);
	}

	public function get_cat_prod_count($categories_id){
		$this->db->count_all($this->table);
		$result = $this->db->get_where($this->table, array('categories_id' => $categories_id))->result();
		return count($result);
	}

	public function get_products_by_category($categories_id,$limit,$start){
		$this->db->limit($limit, $start);
		$this->db->order_by('products.id',"DESC");
		$this->db->select('products.*, categories.name')
			->join('categories', 'categories.id = products.categories_id');

		return $this->db->get_where('products', array('categories_id' => $categories_id));

	}


	public function create_product($image){
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'brand' => $this->input->post('brand'),
			'body' => $this->input->post('body'),
			'categories_id' => $this->input->post('categories_id'),
			'image' => $image,
			'price' => $this->input->post('price'),
			'is_new' => $this->input->post('is_new'),
		);

		return $this->db->insert('products', $data);
	}

	public function delete_product($id){
		$this->db->where('id', $id);
		$this->db->delete('products');
	}

	public function update_product(){
		$slug = url_title($this->input->post('title'));

		$id = $this->input->post('id');

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
		);

		$this->db->where('id', $id);
		return $this->db->update('products', $data);
	}




}
