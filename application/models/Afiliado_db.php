<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	#================================================================================================================
	# agregar datos de contacto
	#================================================================================================================
	public function add($data)
	{
		$this->load->database();
		$this->db->insert("afiliado",$data);
		return $this->db->insert_id();
	}

	public function addcontacto($contact)
	{
		$this->load->database();
		$this->db->insert("contacto",$contact);
		return $this->db->insert_id();
	}

	#================================================================================================================
	# Actualizar
	#================================================================================================================
	public function update($id, $data)
	{
		$this->load->database();
		$this->db->update("afiliado",$data, "idafiliado = ".$id);
	}

	public function updateContacto($id, $data)
	{
		$this->load->database();
		$this->db->update("contacto",$data, "afiliado_idafiliado = ".$id);
	}
	#=================================================================================================================
	# IMG de afiliado
	#=================================================================================================================
	public function setMora($idaf, $mora)
	{
		$this->load->database();
		$this->db->update("afiliado_grupo",array("mora"=>$mora), "idafiliado_grupo = ".$idaf);
	}
	public function moraGeneral($idaf, $mora)
	{
		$this->load->database();
		$this->db->update("afiliado",array("morageneral"=>$mora), "idafiliado = ".$idaf);		
	}
	#================================================================================================================
	# agregar datos de contacto
	#================================================================================================================

	public function getActives()
	{
		$this->load->database();
		return $this->db->select("af.*, (SELECT COUNT(afg.idafiliado_grupo) FROM afiliado_grupo afg WHERE afg.estado = TRUE AND afg.afiliado_idafiliado = af.idafiliado) AS cant")
						->from("afiliado AS af")
						->where("estado",TRUE)
						->get();
	}

	public function getActivesByGroup()
	{
		$this->load->database();
		return $this->db->select("af.*,g.*, afg.*, cat.*")
						->from("afiliado AS af")
						->join("afiliado_grupo AS afg","afg.afiliado_idafiliado = af.idafiliado")
						->join("grupo AS g","g.idgrupo = afg.grupo_idgrupo")
						->join('categoria AS cat', 'cat.idcategoria = g.categoria_idcategoria')
						->where("afg.estado",TRUE)
						->get();
	}
	#=================================================================================================================
	# Get
	#=================================================================================================================
	public function getById($id)
	{
		$this->load->database();
		return $this->db->from("afiliado AS af")
						->join("contacto AS c","c.afiliado_idafiliado = af.idafiliado")
						->join("img","img.afiliado_idafiliado = af.idafiliado","LEFT")
	 					->where("idafiliado",$id)
	 					->get();
	}


	public function addgrupo($idaf , $idgrupo , $mfecha = NULL)
	{
		$fecha = date("Y-m-d",strtotime($mfecha));
		$this->load->database();
		$this->db->insert('afiliado_grupo', array("afiliado_idafiliado"=>$idaf, "grupo_idgrupo"=>$idgrupo, "fecha_afiliacion"=>date("Y-m-d"), "fecha_inicio"=>$fecha, "estado"=>TRUE));
	}

	public function getGruposBy($id = NULL)
	{
		$this->load->database();
		return $this->db->from("afiliado_grupo AS afg")
					->join("grupo AS g","g.idgrupo = afg.grupo_idgrupo")
					->where("afg.afiliado_idafiliado",$id)
					->get();
	}

	public function getGruposActivosBy($id = NULL)
	{
		$this->load->database();
		return $this->db->from("afiliado_grupo AS afg")
					->join("grupo AS g","g.idgrupo = afg.grupo_idgrupo")
					->where("afg.afiliado_idafiliado",$id)
					->where("afg.estado",TRUE)
					->get();
	}

	public function getAfiliadoGrupo($id = NULL)
	{
		$this->load->database();
		return $this->db->from("afiliado_grupo AS afg")
					->join("afiliado As af", "af.idafiliado = afg.afiliado_idafiliado")
					->join("grupo AS g","g.idgrupo = afg.grupo_idgrupo")
					->join("categoria AS c","c.idcategoria = g.categoria_idcategoria")
					->where("afg.idafiliado_grupo",$id)
					->get();
	}

	#=================================================================================================================
	# Finalizar afiliación
	#=================================================================================================================
	public function desafiliar($id)
	{
		$this->load->database();
		$data = array('estado' => FALSE, "fecha_fin"=>date("Y-m-d"), "mora"=>FALSE );
		$where = "idafiliado_grupo = ".$id;
		$this->db->update("afiliado_grupo", $data, $where);
	}
	#=================================================================================================================
	# IMG de afiliado
	#=================================================================================================================

	public function addimg($idaf, $ruta, $nombre_img)
	{
		$this->load->database();
		$this->db->insert('img', array("afiliado_idafiliado"=>$idaf, "ruta"=>$ruta, "nombre_img"=>$nombre_img ) );
		return $this->db->insert_id();
	}

	public function getimg($idaf)
	{
		$this->load->database();
		return $this->db->get_where('img', array("afiliado_idafiliado"=>$idaf) );
	}

	public function delimg($id)
	{
		$this->load->database();
		$this->db->delete("img",array("idimg"=>$id));
	}
}

/* End of file Afiliado_db.php */
/* Location: ./application/models/Afiliado_db.php */