<?php


class Users extends CI_Controller
{

	public function register(){

		if ($this->session->userdata('logged_in')){
			redirect('products');
		}

		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('password2','Confirm Password','matches[password]');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('users/register',$data);
			$this->load->view('templates/footer');
		}else{
			$hash_password = md5($this->input->post('password'));

			$this->user_model->register($hash_password);

			$this->session->set_flashdata('user_registered','You are registered');

			redirect('products');
		}
	}

	public function login(){

		if ($this->session->userdata('logged_in')){
			redirect('products');
		}

		$data['title'] = 'Sign In';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('users/login',$data);
			$this->load->view('templates/footer');
		}else{
			$username = $this->input->post('username');

			$data['username'] = $username;

			// get hash password
			$password = md5($this->input->post('password'));

			$user_id = $this->user_model->login($username,$password);

			$role = $this->user_model->get_user($user_id)['role'];



			if ($user_id){

				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'role' => $role,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('user_loggedIn','You are logged in');

				redirect('products');

			}else{
				$this->session->set_flashdata('login_failed','invalid login');

				redirect('users/login');
			}
		}

	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_id');

		$this->session->set_flashdata('user_loggedOut','You are logged out');

		redirect('users/login');
	}

	function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists','This Username already exists.');
		if ($this->user_model->check_username_exists($username)){
			return true;
		}else{
			return false;
		}
	}

	function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists','This Email already exists.');
		if ($this->user_model->check_email_exists($email)){
			return true;
		}else{
			return false;
		}
	}


}
