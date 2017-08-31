<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($id=NULL, $nombre=NULL)
	{
		$this->db->from("grupo AS g");
		$this->db->join("categoria AS c", "c.idcategoria = g.categoria_idcategoria");
		if (isset($id)) {
			$this->db->where("g.idgrupo",$id);
		}
		if (isset($nombre)) {
			$this->db->like("g.nombre_grupo",$nombre);
		}
		return $this->db->get();
	}

	public function getCategoria($id=NULL, $nombre=NULL)
	{
		$this->db->from("categoria");
		if (isset($nombre)) {
			$this->db->where("nombre",$nombre);
		}
		if (isset($id)) {
			$this->db->where("idcategoria",$id);
		}
		return $this->db->get();
	}

	public function getBy($idafiliado)
	{
		$this->db->from("grupo AS g");
		$this->db->join("afiliado_grupo AS af", "af.grupo_idgrupo = g.idgrupo");
		$this->db->join("categoria AS c", "c.idcategoria = g.categoria_idcategoria");
		if (isset($idafiliado)) {
			$this->db->where("af.afiliado_idafiliado",$idafiliado);
		}
		return $this->db->get();
	}

	public function getActivos($idafiliado=NULL, $idgrupo=NULL, $idafgr = NULL)
	{
		$this->db->from("grupo AS g");
		$this->db->join("afiliado_grupo AS af", "af.grupo_idgrupo = g.idgrupo");
		$this->db->join("categoria AS c", "c.idcategoria = g.categoria_idcategoria");
		if (isset($idafiliado)) {
			$this->db->where("af.afiliado_idafiliado",$idafiliado);
		}
		if (isset($idgrupo)) {
			$this->db->where("g.idgrupo",$idgrupo);
		}
		if(isset($idafgr)){
			$this->db->where("af.idafiliado_grupo",$idafgr);
		}
		$this->db->where("af.estado",TRUE);
		return $this->db->get();
	}

}

/* End of file Grupo_db.php */
/* Location: ./application/models/Grupo_db.php */