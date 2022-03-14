<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function view($page = 'home') {
		if(!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);

		$data['message'] = $this->session->flashdata('message');

		$data['error'] = $this->session->flashdata('error');

		if($page == 'home') {
			$data['recent_posts'] = $this->post_model->get_latest_posts();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}

	
}

?>