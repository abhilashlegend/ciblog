<?php
	class Post_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_posts($slug = FALSE) {
			if($slug === FALSE) {
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}


		public function get_posts_by_id($id) {
			$query = $this->db->get_where('posts', array('id' => $id));
			return $query->row_array();
		}

		public function create_post($post_image) {
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'image' => $post_image,
				'slug' => $slug,
				'category_id' => $this->input->post('category'),
				'body' => $this->input->post('content')
			);

			return $this->db->insert('posts', $data);
		}

		public function update_post($post_image) {
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'image' => $post_image,
				'slug' => $slug,
				'category_id' => $this->input->post('category'),
				'body' => $this->input->post('content')
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

		public function delete_post($id) {
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}
	}

?>