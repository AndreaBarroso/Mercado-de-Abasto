<?php

class CResponsables extends CI_Controller
{
	function index(){
		$crud = new grocery_CRUD();
 		
 		$crud->set_theme('datatables');
		$crud->set_table('responsable_mercado');
		$crud->set_subject('Responsables');
		$crud->columns('nombre','apellido','cuil');
		$output = $crud->render();

		$this->load->view('header');
		$this->load->view('vResponsables',$output);
		//$this->load->view('footer');
	}
}

?>