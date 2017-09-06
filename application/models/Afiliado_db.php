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
				'movil'=>$obj->movil,
				'direccion' => $obj->direccion, 
				'correo' => $obj->correo
				'tipo_sanguineo' => $obj->tipo_sanguineo
				'talla' => $obj->talla,
				'tipo_sanguineo' =>$obj->tipo_sanguineo
			);
		$this->db->insert('afiliado', $data);
		return $this->db->insert_id();
	}
	public function update($obj)
	{
		$data = array(
				'tipo_identificacion' => $obj->tipo_identificacion, 
				'identificacion' => $obj->identificacion, 
				'nombres' => $obj->nombres, 
				'apellidos' => $obj->apellidos, 
				'fecha_nacimiento' => $obj->fecha_nacimiento, 
				'telefono' => $obj->telefono, 
				'movil'=>$obj->movil,
				'direccion' => $obj->direccion, 
				'correo' => $obj->correo
				'tipo_sanguineo' => $obj->tipo_sanguineo
				'talla' => $obj->talla,
				'tipo_sanguineo' =>$obj->tipo_sanguineo
			);
		return $this->db->update('afiliado', $data, 'idafiliado = '.$obj->idafiliado);
	}

	// Datos de contacto
	public function addContacto($obj)
	{
		$data = array(
				'nombre_ref' => $obj->nombre_ref, 
				'telefono_ref' => $obj->telefono_ref,
				'parentesco_ref' => $obj->parentesco_ref,
				'afiliado_idafiliado' =>$obj->afiliado_idafiliado
			);
		$this->db->insert('afiliado_contacto', $data);
		return $this->db->insert_id();
	}
	public function deleteContacto($obj)
	{
		$this->db->delete('afiliado', $data, 'idafiliado_contacto = '.$obj->idafiliado_contacto);
	}

	// Datos de examen medico
	public function addExamenMedico($value='')
	{
		# code...
	}
	public function updateExamenMedico($value='')
	{
		# code...
	}
	public function delExamenMedico($value='')
	{
		# code...
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