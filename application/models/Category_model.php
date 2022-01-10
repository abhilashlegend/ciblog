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
			$data = array('name' => strip_tags($this->input->post('name')));
			return $this->db->insert('categories',$data);
		}


		public function update_category() {
			$data = array('name' => $this->input->post('catName'));
			$this->db->where('id', $this->input->post('catId'));
			return $this->db->update('categories', $data);
		}

		public function delete_category($id) {
			$this->db->where('id', $id);
			$this->db->delete('categories');
			return true;
		}

	}

?>