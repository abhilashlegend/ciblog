<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('classChecker')) {

	function classChecker($inputName, $attributes) {

		if(form_error($inputName)) {
		$attributes['class'] = 'form-control is-invalid';
		}
		else if(count($_POST)) {
			$attributes['class'] = 'form-control is-valid';
		} 
		else {
			$attributes['class'] = 'form-control';
		}

		return $attributes;

	}
}

?>