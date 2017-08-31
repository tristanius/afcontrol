<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database('afc');	
	}

	// Datos basicos
	public function add($obj)
	{
		$data = array(
				'tipo_identificacion' => $obj->tipo_identificacion, 
				'identificacion' => $obj->identificacion, 
				'nombres' => $obj->nombres, 
				'apellidos' => $obj->apellidos, 
				'fecha_nacimiento' => $obj->fecha_nacimiento, 
				'telefono' => $obj->telefono, 
				'direccion' => $obj->direccion, 
				'correo' => $obj->correo
				'tipo_sangre' => $obj->tipo_sangre
				'talla' => $obj->talla
			);
		$this->db->insert('afiliado', $data);
		return $this->db->insert_id();
	}
	public function update($obj)
	{
		# code...
	}

	// Datos de contacto
	public function addContacto($obj)
	{
		$data = array('' => , );
		$this->db->insert('afiliado_contacto', $data);
	}
	public function deleteContacto($obj)
	{
		$this->db->delete('table', $array, '');
	}

	// consultas
	public function get($id)
	{
		# code...
	}

	public function getBy($field, $val)
	{
		# code...
	}

}

/* End of file Afiliado_db.php */
/* Location: ./application/models/Afiliado_db.php */