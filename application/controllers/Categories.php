<?php 
	class Categories extends CI_Controller {

		// Categories Index Page
		public function index() {
			$data['title'] = 'Categories';
			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header', $data);
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		// Add categories page
		public function create() {
			$this->form_validation->set_rules('name', 'Name', 'required');

			$this->category_model->create_category();

			redirect('categories');
		}
	}

?>