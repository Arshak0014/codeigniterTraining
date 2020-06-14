<?php


class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		if (!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = "User Profile";

		$this->form_validation->set_rules('name','Name','required|min_length[3]');
		$this->form_validation->set_rules('username','Username','required|min_length[3]');

		if ($this->form_validation->run() === FALSE){
			$data['user'] = $this->user_model->get_user($_SESSION['user_id']);

			$this->load->view('templates/header',$data);
			$this->load->view('profile/index',$data);
			$this->load->view('templates/footer');
		}else{
			$this->user_model->edit_user_data($_SESSION['user_id']);

			$this->session->set_flashdata('user_data_changed','Your profile data changed.');

			redirect('profile');

		}

	}
	public function change_password(){

		$this->form_validation->set_rules('old_password','Old Password','trim|required|max_length[150]|min_length[5]');
		$this->form_validation->set_rules('new_password','New Password','trim|required|max_length[150]|min_length[5]');
		$this->form_validation->set_rules('repeat_password','Repeat Password','trim|required|max_length[150]|min_length[5]|matches[new_password]');

		if ($this->form_validation->run() === FALSE){
			$data['title'] = "Change Password";

			$data['user'] = $this->user_model->get_user($_SESSION['user_id']);

			$this->load->view('templates/header',$data);
			$this->load->view('profile/change_password',$data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'password' => md5($this->input->post('new_password')),
			);

			$result = $this->user_model->check_old_password($_SESSION['user_id'],md5($this->input->post("old_password")));


			if ($result > 0 and $result === true){
				$this->user_model->update_password($_SESSION['user_id'],$data);
				$this->session->set_flashdata('user_password_changed','Your password changed.');
				redirect('profile');
			}
		}

	}


}
