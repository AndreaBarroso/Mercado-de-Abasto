<?php

class CHome extends CI_Controller
{
	function index(){
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}

?>