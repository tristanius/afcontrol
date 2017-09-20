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

	// Agregar un nuevo afiliado
	public function add()
	{
		$vw = $this->load->view('afiliado/form', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Agregar nuevo afiliado', 'content'=>$vw) );
	}

	// modificar un afiliado
	public function edit($id=NULL)
	{
		$vw = $this->load->view('afiliado/form', array('idafiliado'=>$id), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Detalles de afiliado', 'content'=>$vw) );
	}
	public function existeBy($field, $val)
	{
		$this->load->model('afiliado_db', 'myaf');
		$result = $this->myaf->getBy($field, $val);
		return $result->num_rows()>0?TRUE:FALSE;
	}
	// guardar afiliado
	public function save()
	{
		$post = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'myaf');
		if ( isset($post->idafiliado) ) {
			$this->myaf->update($post);
		}else{
			$idaf = $this->myaf->add($post);
			$post->idafiliado = $idaf;			
		}
		//$this->guardarContactos($post->contactos);
		$ret =  new stdClass();
		$ret->return = $post;
		$ret->success = TRUE;
		$ret->msj = 'Datos registrados exitosamente.'.date('Y-m-d H:i:s');
		echo json_encode( $ret );
	}
	// listado de afiliado
	public function lista()
	{
		$vw = $this->load->view('afiliado/list', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Lista de afiliados', 'content'=>$vw) );
	}
	public function getList($start=NULL, $end=NULL)
	{
		$this->load->model('afiliado_db', 'myaf');
		$rows = $this->myaf->getBy(NULL, NULL, $start, $end, 'af.idafiliado, af.identificacion, af.tipo_identificacion, af.nombres, af.apellidos');
		echo json_encode( $rows->result() );
	}
	public function get($id=NULL)
	{
		$this->load->model("afiliado_db", 'af');
		$result = $this->af->get($id);
		$ret =  new stdClass();
		$ret->return = $result->row();
		$ret->success = TRUE;
		$ret->msj = 'Consulta realizada exitosamente'.date('Y-m-d H:i:s');
		echo json_encode( $ret );
	}

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
		$path = './uploads/afiliados/'.$idaf.'/';
		$id = $this->input->post('idafiliado');
		$identificacion = $this->input->post('identificacion');
		$clasificacion = $this->input->post('clasificacion');
		$ret =  new stdClass();
		$ret = $this->upload($id.$identificacion.date('Ymd'), $path, 'file');
		if($ret->success){
			$this->addDoc($ret->data, $id, $foto, $clasificacion);
		}
		echo json_encode($ret);
	}


	public function upload($name, $path, $post_name)
	{
		$this->crear_directorio($path);
		$config['upload_path'] = $path;
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
	public function addDoc($data, $idaf, $foto, $clasificacion)
	{
		$this->load->model(array('documento_db'=> 'doc' ));
		$idDoc = $this->doc->add( $data['file_name'], $data['upload_path'], $data['file_type'] );
		$clasificacion = $foto?'foto de perfil':$clasificacion;
		$idDocAf = $this->doc->addDocAfiliado($iddoc, $idaf, $clasificacion);
	}

	public function getDocumentos($idaf)
	{
		# code...
	}

	public function delDocumento($value='')
	{
		# code...
	}



	public function crear_directorio($carpeta)
	{
	    if (!file_exists($carpeta)) {
	      mkdir($carpeta, 0777, true);
	    }
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