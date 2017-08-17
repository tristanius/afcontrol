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
		$vw = $this->load->view('afiliado/add', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Agregar nuevo afiliado', 'content'=>$vw) );
	}
	public function insert()
	{
		# code...
	}

	// modificar un afiliado
	public function edit($id=NULL)
	{
		# code...
	}
	public function mod($id=NULL)
	{
		# code...
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