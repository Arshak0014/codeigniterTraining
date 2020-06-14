<?php


class User_model extends CI_Model
{
	public function register($hash_password){

		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $hash_password,
			'zipcode' => $this->input->post('zipcode'),
		);

		return $this->db->insert('users',$data);
	}

	public function login($username,$password){

		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1){
			return $result->row(0)->id;
		}else{
			return false;
		}

	}

	public function is_admin($role)
	{
		$this->db->where('role',$role);
		$result = $this->db->get('users');
		return $result->row_array();

	}

	public function check_username_exists($username){
		$query = $this->db->get_where('users',array('username' => $username));
		if (empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}

	public function check_email_exists($email){
		$query = $this->db->get_where('users',array('email' => $email));
		if (empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}

	public function get_user($user_id){
		if ($user_id){
			$this->db->where('id',$user_id);
			$query = $this->db->get('users');
			return $query->row_array();
		}
		return false;
	}

	public function edit_user_data($user_id){

		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),

		);
		return $this->db->update('users',$data);
	}

	public function check_old_password($user_id,$old_password){
		$this->db->where('id',$user_id);
		$this->db->where('password',$old_password);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function update_password($user_id,$data){

		$this->db->set($data);
		$this->db->where('id',$user_id);
		$this->db->update('users');
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
