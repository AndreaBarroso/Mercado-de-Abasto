<?php

Class CPuestos extends CI_Controller
{

	function index()
	{
		$crud = new grocery_CRUD();
 		
 		$crud->set_theme('datatables');
		$crud->set_table('puesto');
		$crud->set_subject('Puestos');
		$crud->columns('id_puesto','dimension_puesto','sector','precio_mensual','id_tipo_puesto');
		$output = $crud->render();

		$this->load->view('header');
		$this->load->view('vPuestos',$output);
	}
}

?>