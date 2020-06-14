<?php

class Pages extends CI_Controller{


	public function view($page = "home"){
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
		}

		$data['title'] = ucfirst($page);

		$data['products'] = $this->product_model->get_all('12');

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header',$data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer');
	}

	public function contact(){

		$data['title'] = 'Contact Us';

		$this->load->library('email');
		$this->load->library('form_validation');

		//Set form validation
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[12]|max_length[200]');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('pages/contact',$data);
			$this->load->view('templates/footer');
		}else{
			$name = $this->input->post('name');
			$from_email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$to_email = 'gabrielyan77arsh14@gmail.com';


			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'melkonian.elise@gmail.com';
			$config['smtp_pass'] = '07777031214aa';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->email->initialize($config);

			$this->email->from($from_email, $name);
			$this->email->to($to_email);
			$this->email->subject($subject);
			$this->email->message($message);

			if ($this->email->send())
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success">Mail sent!</div>');

				redirect('pages/contact');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Problem in sending</div>');
				$this->load->view('templates/header',$data);
				$this->load->view('pages/contact',$data);
				$this->load->view('templates/footer');
			}
		}

	}
}
