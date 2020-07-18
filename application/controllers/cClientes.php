<?php

class CClientes extends CI_Controller
{
	function index(){
		$crud = new grocery_CRUD();
 		
 		$crud->set_theme('datatables');
		$crud->set_table('cliente');
		$crud->set_subject('Clientes');
		$crud->columns('nombre','apellido','nombre_empresa','cuil');
		$output = $crud->render();

		$this->load->view('header');
		$this->load->view('vClientes',$output);
		//$this->load->view('footer');
	}
}

?>