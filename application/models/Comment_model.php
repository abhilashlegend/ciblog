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
			'body' 	=> strip_tags($this->input->post('comment')),
			'security'	=> strip_tags($this->input->post('security')) 
		);

		return $this->db->insert('comments', $data);
	}
}

?>