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
		
	}

	private function isSesion()
	{
		if ( isset( $this->session->userdata('activeSesion') ) ) 
			return TRUE;
		return FALSE;
	}

}

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */