<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function config_upload($nombre="termo"){
	
}
function app_termo($app="app.termo"){
	$ci =& get_instance();
	$ci->load->database('app1');
	$res = $ci->db->get_where("aplicacion","nombre_app = '".$app."'");
	$r = $res->row();
	return $r->ruta_app;
}

function addlog($ip, $accion, $privilegio, $user){
	$data["direccion_ip"] = $ip;
	$data["actividad_realizada"] = $accion;
	$data["privilegio_idprivilegio"] = $privilegio;
	$data["usuario_idusuario"] = $user;
	$data["fecha_actividad"] = date("Y-m-d H:i:s a");
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->insert("log_movimientos",$data);
}
function checkEstados($value='')
{
	$ci =& get_instance();
	$ci->load->model("afiliado_db");
	$activos = $ci->afiliado_db->getActives();
	foreach ($activos->result() as $af) {
		checkEstadoBy($af->idafiliado);
	}
}
function checkEstadoBy($af)
{
	date_default_timezone_set("America/Bogota");
	
	$ci =& get_instance();
	$ci->load->model("afiliado_db");
	$ci->load->model("mensualidad_db");
	$rows = $ci->afiliado_db->getGruposActivosBy($af);
	$indicador = FALSE;
	foreach ($rows->result() as $f) {
		$num_meses = checkEstadoMeses($f->idafiliado_grupo);
		$diff = date_diff( date_create($f->fecha_afiliacion), date_create(date("Y-m-d")) );
		if( ($diff->y * 12 + $diff->m) > $num_meses ){
			$ci->afiliado_db->setMora($f->idafiliado_grupo,TRUE);
			$indicador = TRUE;
		}else{
			$ci->afiliado_db->setMora($f->idafiliado_grupo,FALSE);
		}
	}
	$ci->afiliado_db->moraGeneral($af,$indicador);
}

function checkEstadoMeses($idafiliacion)
{
	$ci =& get_instance();
	$rows = $ci->mensualidad_db->gets($idafiliacion);
	return $rows->num_rows();
}