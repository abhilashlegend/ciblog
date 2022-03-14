<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Categories extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			checkAuth();
			checkIsAdmin();
		}

		// Categories Index Page
		public function index() {

			
			$data['title'] = 'Categories';
			$data['categories'] = $this->category_model->get_categories();
			$data['message'] = $this->session->flashdata('message');

			$this->load->view('templates/header', $data);
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		// Add categories page
		public function create() {
			$this->form_validation->set_rules('name', 'Name', 'required');

			$this->category_model->create_category();
			$this->session->set_flashdata('message','Category added successfully');
			redirect('categories');
		}

		// update category post method
		public function update() {
			$this->category_model->update_category();
			$this->session->set_flashdata('message', 'Category Updated successfully');
			redirect('categories');
		}

		// Delete category
		public function delete($id) {
			$this->category_model->delete_category($id);
			$this->session->set_flashdata('message', 'Category deleted successfully');
			redirect('categories');
		}


	}

?>