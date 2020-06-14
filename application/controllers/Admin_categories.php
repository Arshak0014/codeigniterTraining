<?php


class Admin_categories extends CI_Controller
{

	public function index() {
		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}

		$data['title'] = "Admin Categories";

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('admin_templates/header',$data);
		$this->load->view('admin_categories/index',$data);
		$this->load->view('admin_templates/footer');
	}

	public function create(){
		if (!$this->session->userdata('role') == "admin"){
			show_404();
		}

		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin_templates/header',$data);
			$this->load->view('admin_categories/create', $data);
			$this->load->view('admin_templates/footer');
		} else {
			$this->category_model->create_category();

			$this->session->set_flashdata('category_created','Category Created');


			redirect('admin_categories');
		}

	}

}
