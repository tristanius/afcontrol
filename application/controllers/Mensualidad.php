<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mensualidad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("America/Bogota");
	}

	public function index()
	{

	}

	public function form_pago($idpersona=NULL, $idafilgrupo=NULL)
	{
		if (!isset($idgrupo)) {
			$idgrupo = $this->input->post("grupo");
		}
		if (!isset($idpersona)) {
			$idpersona = $this->input->post("persona");
		}

		$this->load->model("afiliado_db");
		$this->load->model("mensualidad_db");

		$rows = $this->mensualidad_db->getBy($idpersona, $idafilgrupo);
		$per = $this->afiliado_db->getAfiliadoGrupo($idafilgrupo)->row();

		$data = json_encode($rows->result());
		$this->mview("pagos/add", array("per"=>$per,"data"=>$data, "fecha_af"=>$per->fecha_inicio) );
	}

	public function genPago()
	{
		$id = $this->input->post("idafiliacion");
		$vmes = $this->input->post("valor_mes");
		$obser = $this->input->post("observacion");
		$data = $this->input->post("data");
		$user = $this->input->post("idusuario");
		#$data = json_decode($jsondata);
		$this->load->model("afiliado_db");
		$per = $this->afiliado_db->getAfiliadoGrupo($id)->row();

		$this->load->model("mensualidad_db","mes");
		
		$idrecibo = $this->mes->addRecibo($per->idafiliado, (sizeof($data) * $vmes), date('Y-m-d'), $user);

		foreach ($data as $value) {
			$this->mes->add($id, $vmes, $value["id"], $value["year"], $obser, $idrecibo);
		}

		$this->load->helper("config");
		checkEstadoBy($id);
		
		$success_msj = array(
				'success' => 1,
				'idrecibo' => $idrecibo,
				'valor_total' => (sizeof($data) * $vmes)
			);
		echo json_encode($success_msj);
	}

	public function genRecibo()
	{
		$idafiliacion = $this->input->post("afiliacion");
		$idpersona = $this->input->post("idafiliado");
		$data = $this->input->post("data");
		$jdata = json_decode($data);
		$valor_mes = $this->input->post("valor_mes");

		$this->load->model("afiliado_db");
		$per = $this->afiliado_db->getAfiliadoGrupo($idafiliacion)->row();
		$this->load->view("pagos/recibo",array("per"=>$per,"data"=>$jdata,"valor"=>$valor_mes));
	}

	public function getPagosBy()
	{
		$this->checkEstadoBy($idpersona);
		$idpersona = $this->input->post("idpersona");
		$idafilgrupo = $this->input->post("afiliacion");
		$this->load->model("mensualidad_db");
		$rows = $this->mensualidad_db->getBy($idpersona, $idafilgrupo);
		echo json_encode($rows->result());
	}

	#==========================================================================================================
	#
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

	#==========================================================================================================
	# listado
	#==========================================================================================================
	public function lista($value='')
	{
		$this->load->model("afiliado_db");
		$this->load->model("grupo_db", "grupo");
		$rows = $this->afiliado_db->getActivesByGroup();
		$categorias = $this->grupo->getCategoria();
		$this->mview("pagos/list", array("afiliados"=>$rows, "categorias"=>json_encode($categorias->result())) );
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

}

/* End of file Mensualidad.php */
/* Location: ./application/controllers/Mensualidad.php */
