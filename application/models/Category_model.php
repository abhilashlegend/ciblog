<?php

	class Category_model extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		public function get_categories($id = FALSE) {
			if($id === FALSE) {
				$this->db->order_by('name');
				$query = $this->db->get('categories');
				return $query->result_array();
			}
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row_array();
		}

		public function create_category() {
			$data = array('name' => $this->input->post('name'));
			return $this->db->insert('categories',$data);
		}
	}

?>