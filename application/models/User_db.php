<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_db extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Bogota');
	}

	// Obtener un usuario por una consulta array
	public function getBy($data)
	{
		return $this->db->get_where('usuario', $data );
	}

	// Obtener los datos de usuario su rol
	public function getRol($data)
	{
		return $this->db->from( 'usuario AS u' )->join( 'rol AS r', 'r.idrol = u.rol_idrol' )->where( $data )->get();
	}

	// Consultar privilegios de un rol
	public function getPrivilegios($idrol='')
	{
		return $this->db->select('r.idrol, r.nombre_rol,  pr.idpermiso, pr.nombre_permiso, pr.codigo')
				->from( 'rol AS r' )
				->join( 'rol_has_permiso AS rper', 'r.idrol = rper.rol_idrol' )
				->join('permiso AS pr', 'pr.idpermiso = rper.permiso_idpermiso' )
				->where( 'r.idrol', $idrol )
				->get();
	}

	// Cambiar contraseña de usuario
	public function change_pass($idusuario, $passNueva)
	{
		return $this->db->update('usuario', array('password'=> "".$passNueva), 'idusuario = '.$idusuario);
	}
}

/* End of file user_db.php */
/* Location: ./application/models/user_db.php */