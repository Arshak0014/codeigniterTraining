<?php


class Admin_products extends CI_Controller
{

	public function index(){

		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}

		$data['title'] = "Admin Products";

		$data['products'] = $this->product_model->get_products_admin();

		$this->load->view('admin_templates/header',$data);
		$this->load->view('admin_products/index',$data);
		$this->load->view('admin_templates/footer');
	}

	public function create(){
		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}

		$data['title'] = 'Create Products';

		$data['categories'] = $this->category_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin_templates/header',$data);
			$this->load->view('admin_products/create', $data);
			$this->load->view('admin_templates/footer');
		} else {
			// Upload Image
			$config['upload_path'] = './assets/images/products';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$image = 'noimage.png';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$image = $_FILES['userfile']['name'];
			}

			$this->product_model->create_product($image);

			$this->session->set_flashdata('product_created','Post Created');

			redirect('admin_products');
		}
	}

	public function delete($id){
		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}
		$this->product_model->delete_product($id);

		$this->session->set_flashdata('product_deleted','Product Deleted');

		redirect('admin_products');
	}

	public function edit($slug){
		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}
		$data["product"] = $this->product_model->get_products($slug);

		$data['categories'] = $this->category_model->get_categories();

		if (empty($data['product'])){
			show_404();
		}
		$data['title'] = 'Edit Product';

		$this->load->view('admin_templates/header',$data);
		$this->load->view('admin_products/edit',$data);
		$this->load->view('admin_templates/footer');
	}

	public function update(){
		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}
		$this->product_model->update_product();

		$this->session->set_flashdata('product_updated','Product Updated');

		redirect('admin_products');
	}
}
