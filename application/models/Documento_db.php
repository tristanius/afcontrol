<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documento_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add($nombre, $ruta, $tipo, $clase, $estado = TRUE)
	{
		$data = array(
			'documento' => $nombre,
			'ruta' => $ruta,
			'tipo' => $tipo,
			'estado' => $estado
		);
		$this->db->insert('afiliado_documento', $data);
		return $this->db->insert_id();
	}

	public function del($iddoc)
	{
		$this->db->delete('documento', array('iddocumento'=>$iddoc));
	}

	public function addToAfiliado($iddoc, $idaf, $clasificacion, $estado=TRUE)
	{
		$data = array(
			'documento_iddocumento' => $iddoc, 
			'afiliado_idafiliado' => $idaf,
			'estado'=>$estado,
			'clasificacion' => $clasificacion
		);
		$this->db->insert('afiliado_documento', $data);
		return $this->db->insert_id();
	}

	public function delToAfiliado($idDocAf=NULL, $iddoc=NULL, $idaf=NULL)
	{
		# code...
	}
}

/* End of file Documento_db.php */
/* Location: ./application/models/Documento_db.php */