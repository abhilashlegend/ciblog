<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function register() {

		

		$this->load->helper('captcha_helper');
		$this->load->helper('input_attribute_helper');

		$captcha = create_captcha();

		// Send captcha image to view
        $data['captchaImg'] = $captcha['image'];
		$data['code'] = $captcha['word'];

		$this->form_validation->set_message('is_unique','The %s is already taken');
		$this->form_validation->set_rules('firstname','First Name','required');
		$this->form_validation->set_rules('lastname','Last Name','required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username','Username','required|is_unique[users.username]|trim|min_length[3]');
		$this->form_validation->set_rules('password','Password','required|min_length[8]|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('security','Security','trim|required|callback_validate_captcha');

		if($this->form_validation->run() == FALSE) {

			$data['errors'] = validation_errors();
			$data['title'] = 'Register';

			$this->load->view('templates/header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('templates/footer');
		} else {
			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$activation_code = substr(str_shuffle($set), 0, 12);

			$this->sendAccountActivationEmail();

			$this->user_model->create_user($activation_code);
			$this->session->set_flashdata('message','User Created Successfully');
			redirect('/');
		}


		
	}


	public function validate_captcha(){
	    if($this->input->post('security') != $this->input->post('code'))
	    {
	        $this->form_validation->set_message('validate_captcha', 'Security code does not match captcha');
	        return false;
	    }else{
	        return true;
	    }
	}

	public function sendAccountActivationEmail() {

	}
}

?>