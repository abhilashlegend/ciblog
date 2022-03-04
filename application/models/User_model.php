<?php
	class User_model extends CI_Model {

		const SUBSCRIBER = 65468;

		public function __construct() {
			$this->load->database();
		}

		public function create_user($activation_code) {

			$option = ['cost' => 12];

   			$encrypted_pwd = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);

			$data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name'	 => $this->input->post('lastname'),
				'email'		 => $this->input->post('email'),
				'username'	 => $this->input->post('username'),
				'password'	 => $encrypted_pwd,
				'role' 		 => self::SUBSCRIBER,
				'activation' => $activation_code,
				'active'	 => false 
			);

			return $this->db->insert('users', $data);
		}


		public function activateUser($code) {
			$data = array(
				'active' => true
			);

			$this->db->where('activation', $code);
			return $this->db->update('users', $data);
		}

		public function loginUser($username, $password) {

   			$this->db->where('username',$username);

			$result = $this->db->get('users');

			$dbPassword = $result->row(6)->password;

			if(password_verify($password, $dbPassword)) {
				$userId = $result->row(1)->id;
				$status = (boolean)$result->row(9)->active;
				return [$userId, $status];
			} else {
				return false;
			}
			
			
		}
	}

?>