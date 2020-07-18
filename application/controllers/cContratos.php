<?php

class CContratos extends CI_Controller
{
	function index(){
		$crud = new grocery_CRUD();
 		
 		$crud->set_theme('datatables');
		$crud->set_table('contrato');
		$crud->set_subject('Contratos');
		$crud->columns('fecha_inicio','fecha_fin','cuil_cliente','cuil_responsable','id_puesto');
		$output = $crud->render();

		$this->load->view('header');
		$this->load->view('vContratos',$output);
		//$this->load->view('footer');
	}
}

?>