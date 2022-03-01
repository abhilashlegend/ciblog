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


			$createUser = $this->user_model->create_user($activation_code);
			if($createUser) {

				$sendMail = $this->sendAccountActivationEmail($this->input->post('email'), $activation_code);

				if($sendMail) {
					$this->session->set_flashdata('message','Please check your email to login');
				}
				
			} else {
				$this->session->set_flashdata('error','Something went wrong!');
			}
			
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

	public function sendAccountActivationEmail($toEmail, $activationLink) {
		$from_email = "admin@ciblog.com";
		$to_email = $toEmail;

		// Load Email Library
		if(ENVIRONMENT == "development") {
			$config = array(
			    'protocol' => 'ssmtp',
			    'smtp_host' => 'ssl://ssmtp.gmail.com', 
			    'smtp_port' => '465',
			    'smtp_user' => 'abhilash.ciblog@gmail.com',
			    'smtp_pass' => '@ciblog123456789',
			    'mailtype' => 'html',
			    'smtp_timeout' => '4', 
			    'charset' => 'iso-8859-1',
			    'wordwrap' => TRUE
			);
			$this->load->library('email', $config);
		} else {
			$this->load->library('email');
		}
		

		$this->email->from($from_email, 'CiBlog');
		$this->email->to($to_email);
		$this->email->subject('Please activate your ciblog account');

		$body = 'Please click on the activation link to successfully login to your account ' . site_url() . 'auth/user/' . $activationLink;

		$this->email->message($body);

		return $this->email->send();
	}

	function activate($code) {
		$activated = $this->user_model->activateUser($code);

		if($activated) {
			$this->session->set_flashdata('message','User activated successfully, you can now login.');
		} else {
			$this->session->set_flashdata('error','User could not be activated');
		}

		redirect('/');
	}
}

?>