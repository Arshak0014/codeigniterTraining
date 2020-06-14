<?php


class Admin_dashboard extends CI_Controller
{

	public function index(){
		$data['title'] = "Admin Dashboard";

		$this->load->view('admin_templates/header',$data);
		$this->load->view('admin_dashboard/index',$data);
		$this->load->view('admin_templates/footer');
	}

}
