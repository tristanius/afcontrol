<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_db extends CI_Model {

	public function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	public function change_pass($idusuario, $passNueva)
	{
		return $this->db->update('usuario', array('password'=>$passNueva), 'idusuario = '.$idusuario);
	}

}

/* End of file Usuario_db.php */
/* Location: ./application/models/Usuario_db.php */