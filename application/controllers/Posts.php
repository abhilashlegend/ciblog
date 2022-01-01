<?php

class Posts extends CI_Controller {

	// Get all posts
	public function index() {
		
		$data['title'] = "Latest Posts";
		$data['posts'] = $this->post_model->get_posts();

		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');

	}	

	// Get single post
	public function view($slug = NULL) {

		$data['post'] = $this->post_model->get_posts($slug);

		// return 404 page if slug is empty
		if(empty($data['post'])) {
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

	}

	// Create post method
	public function create() {

		$data['title'] = 'Create Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');


		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->post_model->create_post();
			redirect('posts');
		}
		
	}

	// Delete post method
	public function delete($id) {
		$this->post_model->delete_post($id);
		redirect('posts');
	}


}

?>