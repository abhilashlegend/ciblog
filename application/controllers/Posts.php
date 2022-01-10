<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

		$data['category'] = $this->category_model->get_categories($data['post']['category_id']);

		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

	}

	// Create post method
	public function create() {

		$data['title'] = 'Create Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		$data['categories'] = $this->category_model->get_categories();


		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		} else {
			// Upload Image
			$config['upload_path'] = './assets/uploads/images/posts';
			$config['allowed_types'] = 'gif|jpeg|jpg|png';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('postImage')) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['postImage']['name'];
			}

			$this->post_model->create_post($post_image);
			redirect('posts');
		}
		
	}

	// Edit post method
	public function edit($id) {

		$data['post'] = $this->post_model->get_posts_by_id($id);

		$data['title'] = 'Edit Post';

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header', $data);
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');

	}

	// Update post method
	public function update() {
		$this->post_model->update_post();
		redirect('posts');
	}

	// Delete post method
	public function delete($id) {
		$this->post_model->delete_post($id);
		redirect('posts');
	}


}

?>