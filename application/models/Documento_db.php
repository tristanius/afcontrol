<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documento_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add($nombre, $ruta, $tipo, $estado = TRUE)
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
		$this->db->delete('documento', array('iddocumento'=>$iddoc) );
	}

	// documentos de afiliado
	public function getDocsByAfiliado($idafiliado)
	{
		return $this->db->select('fields')
				->from()
				->join()
				->where()
				->get();
	}

	public function addDocAfiliado($iddoc, $idaf, $clasificacion, $estado=TRUE)
	{
		$data = array(
			'documento_iddocumento' => $iddoc, 
			'afiliado_idafiliado' => $idaf,
			'clasificacion' => $clasificacion,
			'estado'=>$estado
		);
		$this->db->insert('afiliado_documento', $data);
		return $this->db->insert_id();
	}

	public function delDocAfiliado($idDocAf=NULL, $iddoc=NULL, $idaf=NULL)
	{
		$data = array();
		if (isset($idDocAf)) {
			$data['idafiliado_documento'] = $idDocAf;
		}
		if (isset($iddoc)) {
			$data['documento_iddocumento'] = $iddoc;
		}
		if (isset($idaf)) {
			$data['afiliado_idafiliado'] = $idaf;
		}
		$this->db->delete('afiliado_documento', $data);
	}
}

/* End of file Documento_db.php */
/* Location: ./application/models/Documento_db.php */