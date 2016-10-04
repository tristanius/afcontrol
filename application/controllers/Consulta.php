<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

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
		$this->mview("consultas/menu_crud", array("gestion"=>NULL) );
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
				$crud->set_relation("categoria_idcategoria","categoria","{descripcion}, $ {valor_mensual}");
			}

			if($table == "afiliado"){
				$crud->set_relation_n_n("grupos_afialidos", "afiliado_grupo", "grupo", "afiliado_idafiliado", "grupo_idgrupo", "nombre_grupo", "fecha_afiliacion");
				$crud->unset_add();
				$crud->unset_edit();
			}

			if($table == "mensualidad"){
				$crud->set_relation('afiliado_grupo_idafiliado_grupo','afiliado_grupo','afiliado_idafiliado');
				$crud->columns("valor_mensualidad", "recibo_idrecibo","fecha_pago","mes","year","afiliado","grupo", "categoria","observacion");
				$crud->display_as('recibo_idrecibo',"recibo");
				$crud->callback_column('afiliado',array($this,'field_callback_1'));
				$crud->callback_column('grupo',array($this,'field_callback_2'));
				$crud->callback_column('categoria',array($this,'field_callback_3'));
				$crud->unset_add();
				$crud->unset_edit();
			}

			$output = $crud->render();
			$gestion = $this->load->view("grocery",$output, TRUE);
			$this->mview("consultas/menu_crud", array("gestion"=>$gestion ) );

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function examen_medico($id)
	{
		try{
			$this->load->database();
			$this->load->model("afiliado_db");
			$this->load->helper('url');

			$this->load->library('Grocery_CRUD');
			date_default_timezone_set("America/Bogota");
			$table = 'examen_medico';
			$crud = new grocery_CRUD();
			$crud->set_language('spanish'); 

			$crud->set_theme('flexigrid');
			$crud->set_table($table);
			$crud->set_subject($table);
			$crud->set_subject('Ficha medica');
			$crud->set_relation("afiliado_idafiliado","afiliado","{nombres} {apellidos}");

			$crud->unset_add();
			$crud->unset_edit();

			$output = $crud->render();
			$gestion = $this->load->view("grocery",$output, TRUE);
			$this->mview("afiliados/examen_medico", array("crud"=>$gestion, "af"=>$pers->row()) );
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	} 

	public function field_callback_1($value, $row)
	{
		$this->load->model("afiliado_db","af");
		$rows = $this->af->getAfiliadoGrupo($row->afiliado_grupo_idafiliado_grupo);
		if($rows->num_rows() > 0 ){
			$row = $rows->row();
			return $row->nombres." ".$row->apellidos;
		}
		return "".$row->afiliado_grupo_idafiliado_grupo;
	}

	public function field_callback_2($value, $row)
	{
		$this->load->model("afiliado_db","af");
		$rows = $this->af->getAfiliadoGrupo($row->afiliado_grupo_idafiliado_grupo);
		if($rows->num_rows() > 0 ){
			$row = $rows->row();
			return $row->nombre_grupo;
		}
		return "";
	}

	public function field_callback_3($value, $row)
	{
		$this->load->model("afiliado_db","af");
		$rows = $this->af->getAfiliadoGrupo($row->afiliado_grupo_idafiliado_grupo);
		if($rows->num_rows() > 0 ){
			$row = $rows->row();
			return $row->descripcion;
		}
		return "";
	}


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
