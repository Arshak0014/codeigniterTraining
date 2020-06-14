<?php


class Filter_model extends CI_Model
{

	protected $table = 'products';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_filtered_type($type){
		$this->db->distinct();
		$this->db->select($type);
		$this->db->from('products');
		return $this->db->get();
	}

}
