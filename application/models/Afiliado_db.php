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
	public function getContactsBy($id='')
	{
		return $this->db->get_where('afiliado_contacto', array('afiliado_idafiliado'=>$id) );
	}
	public function addContacto($obj)
	{
		$data = array(
				'nombre_ref' => $obj->nombre_ref, 
				'telefono_ref' => $obj->telefono_ref,
				'parentesco_ref' => $obj->parentesco_ref,
				'afiliado_idafiliado' =>$obj->idafiliado
			);
		$this->db->insert('afiliado_contacto', $data);
		return $this->db->insert_id();
	}
	public function deleteContacto($obj)
	{
		$this->db->delete('afiliado', $data, 'idafiliado_contacto = '.$obj->idafiliado_contacto);
	}

	// Datos de examen medico
	public function addExamenMedico($idaf, $examen=NULL)
	{
		$data = array( 
			'afiliado_idafiliado' => $idaf, 
			'fecha_examen' =>  isset($examen->fecha_examen)?$examen->fecha_examen:NULL,
			'peso'=>  isset($examen->peso)?$examen->peso:NULL,
			'rh' => isset($examen->rh)?$examen->rh:NULL,
			'estatura' => isset($examen->estatura)?$examen->estatura:NULL,
			'presion_arterial' =>  isset($examen->presion_arterial)?$examen->presion_arterial:NULL,
			'enfermedades'=> isset($examen->enfermedades)?$examen->enfermedades:NULL,
			'alergias'=> isset($examen->alergias)?$examen->alergias:NULL,
			'vacunas'=> isset($examen->vacunas)?$examen->vacunas:NULL,
			'medicamentos'=> isset($examen->medicamentos)?$examen->medicamentos:NULL,
			'observaciones'=> isset($examen->observaciones)?$examen->observaciones:NULL,
			'apto_actividad'=> isset($examen->apto_actividad)?$examen->apto_actividad:NULL
		);
		$this->db->insert('examen_medico', $data);
		return $this->db->insert_id();
	}
	public function updateExamenMedico($idaf='', $examen=NULL)
	{
		$data = array( 
			'fecha_examen' =>  isset( $examen->fecha_examen )? $examen->fecha_examen : NULL,
			'peso'=>  isset( $examen->peso )? $examen->peso : NULL,
			'rh' => isset( $examen->rh )? $examen->rh : NULL,
			'estatura' => isset( $examen->estatura )? $examen->estatura : NULL,
			'presion_arterial' =>  isset( $examen->presion_arterial )? $examen->presion_arterial : NULL,
			'enfermedades'=> isset( $examen->enfermedades )? $examen->enfermedades : NULL,
			'alergias'=> isset( $examen->alergias )? $examen->alergias : NULL,
			'vacunas'=> isset( $examen->vacunas )? $examen->vacunas : NULL,
			'medicamentos'=> isset( $examen->medicamentos )? $examen->medicamentos : NULL,
			'observaciones'=> isset( $examen->observaciones )? $examen->observaciones : NULL,
			'apto_actividad'=> isset( $examen->apto_actividad )? $examen->apto_actividad : NULL
		);
		return $this->db->update('examen_medico', $data, 'afiliado_idafiliado = '.$idaf);
	}
	public function delExamenMedico($idexamen='')
	{
		return $this->db->delete('examen_medico', array('idexamen_medico'=>$idexamen));
	}
	public function getExamenesMedicos($idaf='', $idexamen=NULL)
	{
		$this->db->from('examen_medico');
		$this->db->where('afiliado_idafiliado', $idaf);
		if (isset($idexamen)) {
			$this->db->where('idexamen_medico', $idexamen);
		}
		return $this->db->get();
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