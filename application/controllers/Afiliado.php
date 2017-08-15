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
		echo "Prueba <input type='text'> <p>".rand()."</p>";
	}
	public function insert($value='')
	{
		# code...
	}

	// modificar un afiliado
	public function edit($id=NULL)
	{
		# code...
	}
	public function mod()
	{
		# code...
	}

	// listado de afiliado
	public function lista($value='')
	{
		# code...
	}

	// ver un afiliado
	public function ver($id=NULL)
	{
		# code...
	}

	// subir archivos

}

/* End of file Afiliado.php */
/* Location: ./application/controllers/Afiliado.php */