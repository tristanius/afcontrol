<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado_db extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Bogota');
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
				'correo' => $obj->correo,
				'tipo_sanguineo' => $obj->tipo_sanguineo,
				'talla' => $obj->talla,
				'entidad_salud' => $obj->entidad_salud,
				'tipo_registro' => $obj->tipo_registro
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
				'correo' => $obj->correo,
				'tipo_sanguineo' => $obj->tipo_sanguineo,
				'talla' => $obj->talla,
				'entidad_salud' => $obj->entidad_salud,
				'tipo_registro' => $obj->tipo_registro
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
		return $this->db->select('*')->from('afiliado')->where('idafiliado',$id)->get();
	}

	public function getBy($field=NULL, $val=NULL, $start=NULL, $limit=NULL, $select=NULL)
	{
		$this->db->select( isset($select)?$select:'*' )
			->from('afiliado AS af');
		if (isset($field) && isset($val)) {
			$this->db->where($field, $val);
		}
		if (isset($start) && isset($limit)) {
			$this->db->limit($limit, $start);
		}
		return $this->db->get();
	}

}

/* End of file Afiliado_db.php */
/* Location: ./application/models/Afiliado_db.php */