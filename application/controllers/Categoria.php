<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function add($value='')
	{
		$vw = $this->load->view('agrupaciones/categorias/categorias.php', array(), TRUE);
		$this->load->view('util/plantilla', array('titulo'=>'Manejo de categorias', 'content'=>$vw) );
	}

	public function edit($value='')
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

	public function insert($value='')
	{
		# code...
	}

	public function update($value='')
	{
		# code...
	}

	# afiliaciones

	public function relacionar($idcat, $idgrupo)
	{
		# code...
	}

}
/* End of file Categoria.php */
/* Location: ./application/controllers/Categoria.php */