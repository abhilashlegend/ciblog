<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('checkAuth'))
{

    function checkAuth() {
    	$CI =& get_instance();

      	$CI->load->library('session');

		if(!$CI->session->userdata('logged_in')){
			$CI->session->set_flashdata('error', 'You need to login to access page');
     		redirect('home');
   		}
	}  
}

function checkIsAdmin() {
      $CI =& get_instance();

        $CI->load->library('session');
        
    if($CI->session->userdata('role') != User_Model::ADMIN){
      $CI->session->set_flashdata('error', 'You are not authorized to view this page');
        redirect('home');
      }
  }

 // For view
 function isAdmin() {
    $CI =& get_instance();
    $CI->load->library('session');

     if($CI->session->userdata('role') == User_Model::ADMIN){
        return true;
     }
     return false;
 } 


  function checkIsAdminOrAuthor() {
    $CI =& get_instance();

    $CI->load->library('session');
    
    // If user is just a member redirect
    if($CI->session->userdata('role') != User_Model::ADMIN || $CI->session->userdata('role') != User_Model::AUTHOR) {
      $CI->session->set_flashdata('error', 'You are not authorized to view this page');
      redirect('/');
    }
  }

  function isAdminOrAuthor() {
    $CI =& get_instance();

    $CI->load->library('session');

    if($CI->session->userdata('role') == User_Model::ADMIN || $CI->session->userdata('role') == User_Model::AUTHOR) {
      return true;
    } else {
      return false;
    }

  }

  

?>