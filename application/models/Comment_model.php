<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function create_comment() {
		$data = array(
			'post_id'	=> $this->input->post('postId'),
			'user_id'   => $this->input->post('user_id'),
			'body' 		=> strip_tags($this->input->post('comment'))
		);

		return $this->db->insert('comments', $data);
	}

	public function get_comments_by_post($post_id) {
		$this->db->order_by('created_at');
		$query = $this->db->get_where('comments', array('post_id' => $post_id));
		return $query->result_array();
	}

	public function delete_comment($id) {
		$this->db->where('id', $id);
		$this->db->delete('comments');
		return true;
	}
}

?>