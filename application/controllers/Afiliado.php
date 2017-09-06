<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		# code...
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
		$this->load->model('afiliad_db', 'myaf');
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
		return json_encode( $ret );
	}

	// Contactos de afiliado

	public function addContact()
	{
		$contact = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'myaf');
		$contact->idafiliado_contacto = $this->myaf->addContacto($contact);
		$ret =  new stdClass();
		$ret->return = $contact;
		$ret->success = TRUE;
		$ret->msj = 'Contacto agregado exitosamente.';
		return json_encode( $ret );
	}

	public function delContact($idContac='')
	{
		$contact = json_decode(file_get_contents('php://input'));
		$this->load->model('afiliado_db', 'myaf');
		$this->myaf->delContacto($contact);
	}

	// listado de afiliado
	public function lista()
	{
		# code...
	}

	// ver un afiliado
	public function ver($id=NULL)
	{
		# code...
	}

	// subir archivos
	public function upload()
	{
		# code...
	}

	// ---------------------------
	// Utilidades generales

}

/* End of file Afiliado.php */
/* Location: ./application/controllers/Afiliado.php */