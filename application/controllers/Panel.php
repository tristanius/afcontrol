<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Valida si la sesion ha sido iniciada si no, redirecciona al login
		redirSesion( !$this->isSesion() );
	}

	public function index()
	{
		$titulo = 'Panel principal de control de afiliado App.';
		$v = $this->load->view('init/panel', array(), TRUE);
		$this->load->view('init/principal', array( 'titulo'=>$titulo,'html'=>$v ));
	}

	private function isSesion()
	{
		$sesion = $this->session->userdata('activeSesion');
		if ( isset( $sesion ) && $sesion ) 
			return TRUE;
		return FALSE;
	}

}

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */