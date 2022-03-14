<?php

class Comments extends CI_Controller {

	function security_check() {
		if($this->input->post('security') == $this->input->post('code')) {
			return true;
		}
		else {
			$this->form_validation->set_message('security_check', 'The {field} field does not match captcha code');
			return false;	
		}
	}	
	
	public function create() {

		$postSlug = $this->input->post('slug');

		$this->form_validation->set_rules('comment','Comment','required');
		$this->form_validation->set_rules('security','Security','required|callback_security_check');

		$data = $this->input->post();

		if($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('fail', validation_errors());
			foreach($data as $Key => $Value)
			{
			   $this->session->set_flashdata($Key, $Value);
			}
			
		} else {
			$this->comment_model->create_comment();
			$this->session->set_flashdata('message','Comment Added');
		}
		redirect('posts/' . $postSlug);

	}

	public function delete($id) {
		$this->comment_model->delete_comment($id);
		$this->session->set_flashdata('message', 'Comment deleted successfully');

			redirect('posts/' . $_GET['slug']);
	}
}

?>
