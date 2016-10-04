<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("America/Bogota");
	}

	public function index()
	{

	}

	public function manejos($value='')
	{
		if(!$this->isSesion()){
			redirect(site_url(),'refresh');
		}
		$this->mview("afiliados/menu");
	}
	#==========================================================================================================
	#agregar un nuevo afiliado
	#==========================================================================================================
	public function form_add($value='')
	{
		$this->mview("afiliados/add");
	}
	public function add($value='')
	{
		$d["identificacion"] = $this->input->post("identificacion");
		$d["tipo_identificacion"] = $this->input->post("tipo_identificacion");
		$d["nombres"] = $this->input->post("nombres");
		$d["apellidos"] = $this->input->post("apellidos");
		$d["fecha_nacimiento"] = date("Y-m-d", strtotime($this->input->post("fecha_nacimiento")) );
		$d["correo"] = $this->input->post("correo");
		$d["direccion"] = $this->input->post("direccion");
		$d["tipo_sanguineo"] = $this->input->post("tipo_sangre");
		$d["telefono"] = $this->input->post("telefono");
		$d["entidad_salud"] = $this->input->post("entidad_salud");
		$d["tipo_registro"] = $this->input->post("tipo_registro");
		$d["talla"] = $this->input->post("talla");
		$d["estado"]=TRUE;

		$c["nombre_familiar1"] = $this->input->post("nombre_familiar1");
		$c["nombre_familiar2"] = $this->input->post("nombre_familiar2");

		try {
			$this->load->model("afiliado_db");
			$id = $this->afiliado_db->add($d);
			$c["afiliado_idafiliado"] = $id;
			$test = $this->afiliado_db->addcontacto($c);
			redirect(site_url('afiliado/uploadimg/'.$id),'refresh');
		} catch (Exception $e){
			redirect(site_url('afiliado/list'),'refresh');
		}

	}

	public function uploadimg($id=NULL)
	{
		$this->mview("afiliados/uploadfoto",array("idp"=>$id));
	}

	public function addimg()
	{
		$idafiliado = $this->input->post("idafiliado");

		$config['upload_path'] = './uploads/afiliados/';
		$config['allowed_types'] ='gif|jpg|png';
		$config["file_name"] = $idafiliado;
		$this->load->library("upload",$config);

		if ($this->upload->do_upload("file")) {
			$this->load->model("afiliado_db");
			$data = $this->upload->data();
			try {
				$this->deleteimg($idafiliado);
				$this->afiliado_db->addimg($idafiliado, $config["upload_path"], $data["file_name"] );
				echo $data["file_name"];
			} catch (Exception $e) {
				echo "failed";
			}
		}else{
			echo $this->upload->display_errors();
		}
	}

	private function deleteimg($idaf)
	{
		#$this->load->model("afiliado_db");
		$rows = $this->afiliado_db->getimg($idaf);
		foreach ($rows->result() as $r ) {
			unlink($r->ruta.$r->nombre_img);
			$this->afiliado_db->delimg($r->idimg);
		}
	}

	#==========================================================================================================
	# Listado de afiliados
	#=========================================================================================================
	public function lista($value='')
	{
		$this->checkEstados();
		$this->load->model("afiliado_db");
		$rows = $this->afiliado_db->getActives();
		$this->mview("afiliados/list", array("afiliados"=>$rows ) );
	}

	#==========================================================================================================
	# Ver
	#=========================================================================================================
	public function ver($id)
	{
		$this->load->model("afiliado_db");
		$this->load->model("grupo_db");

		$this->checkEstadoBy($id);

		$rows = $this->afiliado_db->getById($id);
		$grupos = $this->grupo_db->getBy($id);
		if($rows->num_rows() > 0){
			$this->mview("afiliados/ver",array("af"=>json_encode($rows->row()), "grupos"=>json_encode($grupos->result()) ));
		}else{
			redirect(site_url(),'refresh');
		}
	}

	#==========================================================================================================
	# Editar
	#=========================================================================================================
	public function edit($id)
	{
		$this->load->model("afiliado_db");
		$pers = $this->afiliado_db->getById($id);
		$this->mview("afiliados/edit",array("per"=>$pers->row()));
	}


	public function update($value='')
	{
		$idafiliado = $this->input->post("idafiliado");

		$id= $this->input->post("id");
		$d["identificacion"] = $this->input->post("identificacion");
		$d["tipo_identificacion"] = $this->input->post("tipo_identificacion");
		$d["nombres"] = $this->input->post("nombres");
		$d["apellidos"] = $this->input->post("apellidos");
		$d["fecha_nacimiento"] = date("Y-m-d", strtotime($this->input->post("fecha_nacimiento")) );
		$d["correo"] = $this->input->post("correo");
		$d["tipo_sanguineo"] = $this->input->post("tipo_sangre");
		$d["telefono"] = $this->input->post("telefono");
		$d["entidad_salud"] = $this->input->post("entidad_salud");
		$d["direccion"] = $this->input->post("direccion");
		$d["tipo_registro"] = $this->input->post("tipo_registro");
		$d["talla"] = $this->input->post("talla");
		$d["estado"]=TRUE;

		$c["nombre_familiar1"] = $this->input->post("nombre_familiar1");
		$c["nombre_familiar2"] = $this->input->post("nombre_familiar2");

		$this->load->model("afiliado_db");
		$this->afiliado_db->update($id, $d);
		$this->afiliado_db->updateContacto($id, $c);

		redirect(site_url("afiliado/uploadimg/".$id),'refresh');
	}
	
	#Examen medico
	#Examen medico
	public function examen_medico($id)
	{
		try{
			$this->load->database();
			$this->load->model("afiliado_db");
			$pers = $this->afiliado_db->getById($id);
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
			
			$crud->where('afiliado_idafiliado',$id);
			
			$crud->callback_add_field('afiliado_idafiliado', function(){
				$id = $this->uri->segment(3);
				return '<input type="text" maxlength="10" value="'.$id.'" name="afiliado_idafiliado" style="width:6ex" disabled>';
			});
			$crud->callback_edit_field('afiliado_idafiliado',array($this,'edit_field_callback'));


			$output = $crud->render();
			$gestion = $this->load->view("grocery",$output, TRUE);
			$this->mview("afiliados/examen_medico", array("crud"=>$gestion, "af"=>$pers->row()) );
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	} 
	function edit_field_callback($value, $primary_key)
	{
		return '<input type="text" maxlength="10" value="'.$value.'" name="afiliado_idafiliado" style="width:6ex" disabled>';
	}


	#==========================================================================================================
	# Afiliar
	#==========================================================================================================
	public function form_afiliar($id=NULL)
	{
		if(!isset($id)){
			$id = $this->input->post("idafiliado");
		}
		$this->load->database();
		$categorias = $this->db->get("categoria");
		$grupos = $this->db->get("grupo");
		$this->mview("afiliados/afiliar",array("grupos"=>$grupos, "categorias"=>$categorias, "id"=>$id ));
	}
	public function afiliar()
	{
		$idgrupo = $this->input->post("idgrupo");
		$idaf = $this->input->post("idaf");
		$fecha_afiliacion = $this->input->post("fecha");
		$this->load->model("grupo_db");
		$rows = $this->grupo_db->getActivos($idaf, $idgrupo);
		if($rows->num_rows() > 0){
			echo "none";
		}else{

			$this->load->model("afiliado_db");
			$this->afiliado_db->addgrupo($idaf,$idgrupo,$fecha_afiliacion);
			echo "success";
		}
	}

	#==========================================================================================================
	# desafiliar
	#==========================================================================================================
	public function confirm_afiliacion($idafiliacion)
	{
		$this->load->model("afiliado_db","af");
		$rows = $this->af->getAfiliadoGrupo($idafiliacion);
		if($rows->num_rows() > 0){
			$fila = $rows->row();
			$this->mview("afiliados/confir_desafiliar",array( "fila"=>$fila ));
		}else{
			redirect(site_url(),'refresh');
		}
	}

	public function desfiliacion($idafiliacion)
	{
		$this->load->helper("config");
		checkEstados();
		$this->load->model("afiliado_db","af");
		$this->af->desafiliar($idafiliacion);
		redirect(site_url('afiliado/lista'),'refresh');
	}

	#==========================================================================================================
	#private and utils
	#==========================================================================================================
	private function isSesion($value='')
	{
		$this->load->library("session");
		if($this->session->userdata('sess')){
			return TRUE;
		}
		return FALSE;
	}

	#==========================================================================================================
	#Vista
	#==========================================================================================================
	public function mview($ruta, $data=NULL, $ubicacion = NULL)
	{
		$gestion = $this->load->view($ruta, $data , TRUE);
		#$direccion = $this->load->view("utils/direccion", array("ubicacion"=>$ubicacion), TRUE);
		$body = $this->load->view("utils/plantilla1",array("gestion"=>$gestion, "ubicacion"=>$ubicacion ),TRUE);
		$this->load->view("principal/indice",array("body"=>$body));
	}

	#==========================================================================================================
	# check estados de pagos de afiliados
	#==========================================================================================================
	public function checkEstados($value='')
	{
		$this->load->model("afiliado_db");
		$activos = $this->afiliado_db->getActives();
		foreach ($activos->result() as $af) {
			$this->checkEstadoBy($af->idafiliado);
		}
	}

	public function checkEstadoBy($af)
	{
		$this->load->model("afiliado_db");
		$this->load->model("mensualidad_db");
		$rows = $this->afiliado_db->getGruposActivosBy($af);
		$indicador = FALSE;
		foreach ($rows->result() as $f) {
			$num_meses = $this->checkEstadoMeses($f->idafiliado_grupo);
			$diff = date_diff( date_create($f->fecha_afiliacion), date_create(date("Y-m-d")) );
			if( ($diff->y * 12 + $diff->m) > $num_meses ){
				$this->afiliado_db->setMora($f->idafiliado_grupo,TRUE);
				$indicador = TRUE;
			}else{
				$this->afiliado_db->setMora($f->idafiliado_grupo,FALSE);
			}
		}
		$this->afiliado_db->moraGeneral($af,$indicador);
	}

	private function checkEstadoMeses($idafiliacion)
	{
		$rows = $this->mensualidad_db->gets($idafiliacion);
		return $rows->num_rows();
	}
}

/* End of file Afiliado.php */
/* Location: ./application/controllers/Afiliado.php */
