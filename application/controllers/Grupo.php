<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	# Agregar / insertar
	public function add($value='')
	{
		$vw = $this->load->view('agrupaciones/grupo/grupos.php', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Manejo de grupos', 'content'=>$vw) );
	}

	public function insert($value='')
	{
		# code...
	}

	# Actualizar / Modificar

	public function edit($value='')
	{
		# code...
	}

	public function update($value='')
	{
		# code...
	}
	
	public function lista($value='')
	{
		# code...
	}
	
	public function del($value='')
	{
		# code...
	}

	# afiliaciones

	public function relacionar($idgrupo, $idafiliado)
	{
		# code...
	}


}

/* End of file  */
/* Location: ./application/controllers/ */