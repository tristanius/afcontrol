<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Bogota');
	}

	public function index()
	{
		
	}

	// ------------------------------------------------------------------------------------------
	// Agregar un nuevo afiliado
	public function add()
	{
		$vw = $this->load->view('afiliado/form', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Agregar nuevo afiliado', 'content'=>$vw) );
	}

	// ------------------------------------------------------------------------------------------
	// Modificar un afiliado
	public function edit($id=NULL)
	{
		$vw = $this->load->view('afiliado/form', array('idafiliado'=>$id), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Detalles de afiliado', 'content'=>$vw) );
	}

	// ------------------------------------------------------------------------------------------
	private function existeBy($field, $val)
	{
		$this->load->model('afiliado_db', 'myaf');
		$result = $this->myaf->getBy($field, $val);
		return $result->num_rows()>0?TRUE:FALSE;
	}

	// ------------------------------------------------------------------------------------------
	// Desactivar un afiliado
	public function inactivate($id)
	{
		$this->load->model('afiliado_db', 'af');
		$this->af->inactivate($id);
		$ret =  new stdClass();
		$ret->return = $post;
		$ret->success = TRUE;
		$ret->msj = 'Datos registrados exitosamente.'.date('Y-m-d H:i:s');
		echo json_encode( $ret );
	}

	// ------------------------------------------------------------------------------------------
	// Guardar afiliado
	public function save()
	{
		$post = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'myaf');
		$ret =  new stdClass();
		if ( isset($post->idafiliado) ) {
			$this->myaf->update($post);
			$ret->success = TRUE;
			$ret->msj = 'Datos actualizado exitosamente.  '.date('Y-m-d H:i:s');
		}else{
			if ( $this->existeAfiliado($post) ) {
				$ret->success = FALSE;
				$ret->msj = 'Ya existe un registro con los datos de identificacion ingresados.  '.date('Y-m-d H:i:s');
			}else{
				$post->idafiliado = $this->myaf->add($post);
				$ret->success = TRUE;
				$ret->msj = 'Datos registrados exitosamente.  '.date('Y-m-d H:i:s');
			}
		}
		$ret->return = $post;
		echo json_encode( $ret );
	}

	// Validar si un afiliado ya existe (TRUE si existe, FALSE si no.)
	public function existeAfiliado($post)
	{
		$this->load->model('afiliado_db', 'myaf');
		$param = array( 'identificacion'=>$post->identificacion, 'tipo_identificacion'=>$post->tipo_identificacion );
		$rows = $this->myaf->getByArray( $param );
		if ( $rows->num_rows() > 0 ) {
			return TRUE;
		}
		return FALSE;
	}

	// ------------------------------------------------------------------------------------------
	// listado de afiliado
	public function lista()
	{
		$vw = $this->load->view('afiliado/list', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Lista de afiliados', 'content'=>$vw) );
	}
	public function getList($start=NULL, $end=NULL)
	{
		$obj = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'myaf');
		$rows = $this->myaf->getByFields( $obj->filters , $start, $end, 'af.idafiliado, af.identificacion, af.tipo_identificacion, af.nombres, af.apellidos, af.estado_activo');
		echo json_encode( $rows->result() );
	}

	// ------------------------------------------------------------------------------------------
	// Obtener un afiliado por su ID
	public function get($id=NULL)
	{
		$this->load->model("afiliado_db", 'af');
		$result = $this->af->get($id);
		$ret =  new stdClass();
		$ret->return = $result->row();
		$ret->return->foto = $this->getFotoPerfil($id);
		$ret->success = TRUE;
		$ret->msj = 'Consulta realizada exitosamente. '.date('Y-m-d H:i:s');
		echo json_encode( $ret );
	}

	// ------------------------------------------------------------------------------------------
	// ver un afiliado
	public function ver($id=NULL)
	{
		# code...
	}

	// ------------------------------------------------------------------------------------------
	// Contactos de afiliado
	public function get_contacts( $idafiliado )
	{
		$this->load->model('afiliado_db', 'af');	
		$rows = $this->af->getContactsBy( $idafiliado );
		$ret =  new stdClass();
		$ret->return = $rows->result();
		$ret->success = TRUE;
		$ret->msj = 'Contacto agregado exitosamente.';
		echo json_encode( $ret );
	}

	public function add_contact($idaf)
	{
		$contact = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'af');
		$contact->idafiliado = $idaf;
		$contact->idafiliado_contacto = $this->af->addContacto($contact);
		$ret =  new stdClass();
		$ret->return = $contact;
		$ret->success = TRUE;
		$ret->msj = 'Contacto agregado exitosamente.';
		echo json_encode( $ret );
	}

	public function del_contact($idContac='', $idafiliado)
	{
		$contact = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'af');
		$this->af->delContacto($contact);
		$this->contactos($idafiliado);
	}

	// ------------------------------------------------------------------------------------------
	// Documentos de afiliado
	public function upload_doc($idaf=NULL, $foto=FALSE)
	{
		$path = '/uploads/afiliados/'.$idaf.'/';
		$idaf = $this->input->post('idafiliado');
		$identificacion = $this->input->post('identificacion');
		$clasificacion = $this->input->post('clasificacion');
		$ret =  new stdClass();
		$ret = $this->upload($idaf.$identificacion.date('Ymd'), $path, 'file');
		if($ret->success){
			$ret->return = $this->addDoc($ret->data, $idaf, $foto, $clasificacion, $path);
		}
		echo json_encode($ret);
	}
	// subido
	private function upload($name, $path, $post_name)
	{
		$this->crear_directorio('.'.$path);
		$config['upload_path'] = '.'.$path;
		$config['file_name'] = $name;
        $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx|xls|doc|docx|';
        $this->load->library('upload', $config);
		$ret =  new stdClass();
        if ( $this->upload->do_upload($post_name) ) {
			$ret->data = $this->upload->data();
			$ret->msj = "Documento cargado";
			$ret->success = TRUE;
		}else{
			$ret->msj = $this->upload->display_errors();
			$ret->success = FALSE;
		}
		return $ret;
	}
	// privado para add documento despues de subido
	private function addDoc($data, $idaf, $foto, $clasificacion, $path)
	{
		$this->load->model(array('documento_db'=> 'doc' ));
		$iddoc = $this->doc->add( $data['file_name'], $path, $data['file_type'] );
		if ($foto) {
			$this->doc->inactivateFotosPerfil($idaf);
		}
		$idDocAf = $this->doc->addDocAfiliado($iddoc, $idaf, $clasificacion, $foto);
		return base_url().$path.'/'.$data['file_name'];
	}

	public function get_documentos( $idaf )
	{
		$this->load->model('documento_db', 'doc');
		$ret =  new stdClass();
		$ret->return = $this->doc->getDocsByAf( $idaf )->result();
		$ret->msj = 'consulta realziada';
		$ret->success = TRUE;
		echo json_encode($ret);
	}

	public function del_documento(  )
	{
		# code...
	}

	// ------------------------------------------------------------------------------------------
	// Foto de perfil
	private function getFotoPerfil($idaf)
	{
		$this->load->model('documento_db', 'doc');
		$rows = $this->doc->getFotoPerfil($idaf);
		if( $rows->num_rows() > 0 ){
			$r = $rows->row();
			return base_url().$r->ruta.'/'.$r->documento;
		}else{
			return '';
		}
	}
	public function crear_directorio($carpeta)
	{
	    if (!file_exists($carpeta)) {
	      mkdir($carpeta, 0777, true);
	    }
	}

	// ------------------------------------------------------------------------------------------
	// Examenes medicos
	public function add_examen_medico($idaf=NULL)
	{
		$examen = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'af');
		$examen->idexamen_medico = $this->af->addExamenMedico($idaf, $examen);
		$ret =  new stdClass();
		$ret->return = $examen;
		$ret->msj = "Examen medico agregado exitosamente";
		$ret->success = TRUE;
		echo json_encode($ret);
	}

	public function get_examenes_medicos($idaf=NULL)
	{
		$this->load->model('afiliado_db', 'af');
		$ret =  new stdClass();
		$ret->return = $this->af->getExamenesMedicos( $idaf )->result();
		$ret->msj = "Listado de examenes medicos de un afiliado";
		$ret->success = TRUE;
		echo json_encode($ret);
	}
	public function del_examen_medico($value='')
	{
		
	}

	public function mod_examen_medico($idaf='', $idex=NULL)
	{
		
	}

	// ---------------------------
	// Utilidades generales

	public function rellenado_de_tabla($value)
	{
		$this->load->model('afiliado_db', 'af');
		for($i=0; $i<=$value; $i++){
			$obj = new stdClass();
			$obj->identificacion = rand(100000, 10000000000);
			$obj->tipo_identificacion = 'C.C.';
			$obj->nombres = 'Pepe '.$obj->identificacion;
			$obj->apellidos = 'nene '.$obj->identificacion;
			$obj->fecha_nacimiento = '2017-09-13';
			$obj->telefono = ''.$obj->identificacion;
			$obj->movil = ''.$obj->identificacion;
			$obj->direccion = ''.$obj->identificacion;
			$obj->correo = '';
			$obj->tipo_sanguineo = '';
			$obj->talla = '';
			$obj->entidad_salud = '';
			$obj->tipo_registro = 'prueba';
			$this->af->add($obj);
		}
	}

}

/* End of file Afiliado.php */
/* Location: ./application/controllers/Afiliado.php */