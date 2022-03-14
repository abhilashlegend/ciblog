<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {


	// Get all posts
	public function index($category_name = NULL) {

		$this->load->helper('input_attribute_helper');
		
		$data['categories'] = $this->category_model->get_categories();
		
		if($category_name == NULL) {
			$data['title'] = "Latest Posts";
			$data['posts'] = $this->post_model->get_posts();
		} else {
			$data['title'] = $category_name;
			$data['posts'] = $this->post_model->get_posts_by_category($category_name);

		}

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE) {

			$this->load->view('templates/header', $data);
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
			
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$result = $this->user_model->loginUser($username, $password);

			$userId = $result[0];
			$role = $result[1];
			$status = $result[2];

			
			if($result && $status) {
				$user_data = array( 
					'user_id'   => $userId,
					'username'  => $username,
					'role'		=> $role,
					'active' => $status,
					'logged_in' => true
				);


			

			$this->session->set_userdata($user_data);
			$this->session->set_flashdata('message','You are now logged in');


			} else if($status == false && $userId > 0) {
				$this->session->set_flashdata('error','Please check your email and activate account');
			}
			else if($status == false && $result == false) {
				$this->session->set_flashdata('error','Login Failed! Please check your credentials');
			}

			redirect('posts');
		
		}
		

		

	}


	// Get single post
	public function view($slug = NULL) {

		$this->load->helper('captcha_helper');

		$captcha = create_captcha();

		// Send captcha image to view
        $data['captchaImg'] = $captcha['image'];
		$data['code'] = $captcha['word'];
	

		$data['post'] = $this->post_model->get_posts($slug);

		// return 404 page if slug is empty
		if(empty($data['post'])) {
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$data['message'] = $this->session->flashdata('message');

		$data['category'] = $this->category_model->get_categories($data['post']['category_id']);

		$data['comments'] = $this->comment_model->get_comments_by_post($data['post']['id']);

		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

	}

	// Create post method
	public function create() {

		checkAuth();
		checkIsAdminOrAuthor();

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
			$update_filename = time() . "-" . str_replace(' ', '-', $_FILES['postImage']['name']);
			$config['upload_path'] = './assets/uploads/images/posts';
			$config['allowed_types'] = 'gif|jpeg|jpg|png';
			$config['file_name'] = $update_filename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('postImage')) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.png';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $update_filename;
			}

			$this->post_model->create_post($post_image);

			$this->session->set_flashdata('message', 'Post created successfully');
			redirect('posts');
		}
		
	}

	// Edit post method
	public function edit($id) {


		checkAuth();
		checkIsAdminOrAuthor();

		$data['post'] = $this->post_model->get_posts_by_id($id);

		$data['title'] = 'Edit Post';

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('templates/header', $data);
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');

	}

	// Update post method
	public function update() {

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		$id = $this->input->post('id');
		$oldImage = $this->input->post('oldImage');

		if($this->form_validation->run())
		{

			// Upload Image
			$update_filename = time() . "-" . str_replace(' ', '-', $_FILES['postImage']['name']);
			$config['upload_path'] = './assets/uploads/images/posts';
			$config['allowed_types'] = 'gif|jpeg|jpg|png';
			$config['file_name'] = $update_filename;

			$this->load->library('upload', $config);

			//var_dump($this->upload->do_upload('postImage')); exit();

			if(!$this->upload->do_upload('postImage')) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = $oldImage;
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $update_filename;

				if(file_exists("./assets/uploads/images/posts/" . $oldImage) && $oldImage != 'noimage.png') {
					unlink("./assets/uploads/images/posts/" . $oldImage);
				}
			}

			$this->post_model->update_post($post_image);
			$this->session->set_flashdata('message','Post has been updated');
			redirect('posts');
		} else {
			return $this->edit($id);
		}
	}

	// Delete post method
	public function delete($id) {

		checkAuth();
		checkIsAdminOrAuthor();
		// Delete image
		$post = $this->post_model->get_posts_by_id($id);
		$image = $post['image'];

		if(file_exists("./assets/uploads/images/posts/" . $image) && $image != 'noimage.png') {
				unlink("./assets/uploads/images/posts/" . $image);
		}

			$this->post_model->delete_post($id);
			redirect('posts');
	}


}

?>