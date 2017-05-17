<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {

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
		$this->mview("panel/crud", array("gestion"=>"" ) );
	}

	public function by($table)
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_language('spanish');
			$crud->set_theme('flexigrid');
			$crud->set_table($table);
			$crud->set_subject($table);

			if($table == "grupo"){
				$crud->set_relation("categoria_idcategoria","categoria","{descripcion}");
			}

			$output = $crud->render();
			$gestion = $this->load->view("grocery",$output, TRUE);
			$this->mview("panel/crud", array("gestion"=>$gestion ) );

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function addpago()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table("mensualidad");
			$crud->set_relation_n_n('afiliado', 'afiliado_grupo', "afiliado",  'afiliado_idafiliado', 'nombres');
			#$crud->set_relation_n_n('grupo', 'afiliado_grupo', 'grupo_idgrupo', 'idafliado', 'nombre');

			$output = $crud->render();
			$gestion = $this->load->view("grocery",$output, TRUE);
			$this->mview("panel/crud", array("gestion"=>$gestion ) );

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	#==========================================================================================================
	#==========================================================================================================
	#PRIVATES

	#==========================================================================================================
	# Vista
	#==========================================================================================================
	public function mview($ruta, $data=NULL, $ubicacion = NULL)
	{
		$gestion = $this->load->view($ruta, $data , TRUE);
		#$direccion = $this->load->view("utils/direccion", array("ubicacion"=>$ubicacion), TRUE);
		$body = $this->load->view("utils/plantilla1",array("gestion"=>$gestion, "ubicacion"=>$ubicacion ),TRUE);
		$this->load->view("principal/indice",array("body"=>$body));
	}

}

/* End of file  */
/* Location: ./application/controllers/ */