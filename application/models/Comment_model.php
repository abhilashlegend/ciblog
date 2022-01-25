<?php

class Comment_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function create_comment() {
		$data = array(
			'post_id'	=> $this->input->post('postId'),
			'name'   	=> strip_tags($this->input->post('name')),
			'email' 	=> strip_tags($this->input->post('email')),
			'body' 	=> strip_tags($this->input->post('comment'))
		);

		return $this->db->insert('comments', $data);
	}

	public function get_comments_by_post($post_id) {
		$this->db->order_by('created_at');
		$query = $this->db->get_where('comments', array('post_id' => $post_id));
		return $query->result_array();
	}
}

?>