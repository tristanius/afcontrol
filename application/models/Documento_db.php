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
		$this->db->insert('documento', $data);
		return $this->db->insert_id();
	}

	public function del($iddoc)
	{
		$this->db->delete('documento', array('iddocumento'=>$iddoc) );
	}

	// documentos de afiliado
	public function getDocsByAf($idaf)
	{
		return $this->db->select('d.iddocumento, 
			d.documento, d.ruta, d.tipo, daf.idafiliado_documento, 
			daf.clasificacion, daf.estado, d.fecha_registro')
				->from('documento AS d')
				->join('afiliado_documento AS daf','daf.documento_iddocumento = d.iddocumento')
				->where('daf.afiliado_idafiliado',$idaf)
				->get();
	}

	public function addDocAfiliado($iddoc, $idaf, $clasificacion, $foto = FALSE, $estado=TRUE)
	{
		$data = array(
			'documento_iddocumento' => $iddoc, 
			'afiliado_idafiliado' => $idaf,
			'clasificacion' => $clasificacion,
			'is_foto_perfil'=>$foto,
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


	// foto de perfil de afiliado
	public function inactivateFotosPerfil($idaf)
	{
		$this->db->update('afiliado_documento', array('is_foto_perfil'=>FALSE), 'afiliado_idafiliado = '.$idaf );
	}
	public function getFotoPerfil( $idaf )
	{
		return $this->db->select('daf.idafiliado_documento, d.iddocumento, d.ruta, d.documento, d.estado, daf.is_foto_perfil')
	 					->from("afiliado_documento AS daf")
						->join('documento AS d', 'd.iddocumento = daf.documento_iddocumento')
						->where('daf.afiliado_idafiliado', $idaf)
						->where('daf.is_foto_perfil',TRUE)
						->get();
	}
}

/* End of file Documento_db.php */
/* Location: ./application/models/Documento_db.php */