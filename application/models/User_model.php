<?php
	class User_model extends CI_Model {

		const SUBSCRIBER = 65468;

		public function __construct() {
			$this->load->database();
		}

		public function create_user($activation_code) {

			$data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name'	 => $this->input->post('lastname'),
				'email'		 => $this->input->post('email'),
				'username'	 => $this->input->post('username'),
				'password'	 => $this->input->post('password'),
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
	}

?>