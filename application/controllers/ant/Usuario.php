<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('Grocery_CRUD');
		date_default_timezone_set("America/Bogota");
	}

	public function index()
	{
		
	}

	public function manejo()
	{
		$crud = new grocery_CRUD();
 
		$crud->set_table('usuario');
		$crud->set_language("spanish");
		$crud->set_subject('User');
		$crud->columns('usuario','tipo','mail');

		$crud->callback_add_field('password',array($this,'set_password_input_to_empty'));
		$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));

		$crud->callback_add_field('tipo',array($this,'set_tipo_select'));	
		$crud->callback_edit_field('tipo',array($this,'set_tipo_select'));		

		$crud->callback_before_insert(array($this,'encrypt_password_callback'));
		$crud->callback_before_update(array($this,'encrypt_password_callback'));

		$output = $crud->render();
		$gestion = $this->load->view("grocery",$output, TRUE);
		$this->mview("panel/crud", array("gestion"=>$gestion ) );
	}

	function encrypt_password_callback($post_array, $primary_key=NULL) {
		$this->load->library('encrypt');
		$post_array['password'] = $this->encrypt->encode($post_array['password']);		 
		return $post_array;
	}
	function set_password_input_to_empty() {
		return "<input type='password' name='password' value='' required/>";
	}

	function set_tipo_select() {
		return "
		<select name='tipo' id='tipo' class='select'>
			<option value='Gestor de afiliados'>Gestor de afiliados</option>
			<option value='Tesorero'> Tesorero</option>
			<option value='Presidente'>Presidente</option>
		</select>
		";
	}


	public function mview($ruta, $data=NULL, $ubicacion = NULL)
	{
		$gestion = $this->load->view($ruta, $data , TRUE);
		#$direccion = $this->load->view("utils/direccion", array("ubicacion"=>$ubicacion), TRUE);
		$body = $this->load->view("utils/plantilla1",array("gestion"=>$gestion, "ubicacion"=>$ubicacion ),TRUE);
		$this->load->view("principal/indice",array("body"=>$body));
	}
}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */