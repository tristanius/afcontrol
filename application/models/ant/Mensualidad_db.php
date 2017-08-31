<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mensualidad_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function gets($idafiliacion)
	{
		return $this->db->from("mensualidad AS m")
				->join("afiliado_grupo AS ag","ag.idafiliado_grupo = m.afiliado_grupo_idafiliado_grupo")
				->where("ag.idafiliado_grupo",$idafiliacion)
				->get();	
	}

	public function getBy($idpersona, $idafilgrupo)
	{
		return $this->db->from("mensualidad AS m")
				->join("afiliado_grupo AS ag","ag.idafiliado_grupo = m.afiliado_grupo_idafiliado_grupo")
				->where("ag.afiliado_idafiliado",$idpersona)
				->where("ag.idafiliado_grupo",$idafilgrupo)
				->get();
	}

	public function add($idafiliacion, $valor, $mes, $year, $observacion, $idr)
	{
		$this->db->insert("mensualidad",array(
				"afiliado_grupo_idafiliado_grupo"=>$idafiliacion,
				"valor_mensualidad"=>$valor,
				"mes"=>$mes,
				"year"=>$year,
				"fecha_pago"=>date('Y-m-d'),
				"observacion"=>$observacion,
				'recibo_idrecibo'=>$idr
			));
	}
	public function addRecibo($idafiliado, $valor_total, $fecha,$idusuario)
	{
		$data = array(
				'idafiliado' => $idafiliado,
				'total_recibo' =>$valor_total,
				'idusuario' => $idusuario,
				'fecha_creacion'=> $fecha
			);
		$this->db->insert('recibo', $data);
		return  $this->db->insert_id();
	}

}

/* End of file mensualidad_db.php */
/* Location: ./application/models/mensualidad_db.php */