<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("America/Bogota");
	}

	public function index()
	{
		
	}

	public function login($status='')
	{
		if ( $this->isSesion() )
			$this->load->view( 'panel/principal' , array() );
		else
			$this->load->view( 'sesion/login', array( 'status'=>$status ) );

	}

	public function validate()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$this->load->model('user_db', 'user');
		$users = $this->user->getBy();
		if ( $users->num_rows() > 0 ) {
			
		}else{
			$this->login('failed');
		}		
	}

	private function initSesion($user, $privs)
	{
		$data = array(
			'user' => (array) $user->row(), 
			'privilegios' => (array) $privs->row()
		);
		$this->session->set_userdata( $data );
	}

	public function end_sesion($value='')
	{
		$this->session->sess_destroy();
		redirect( base_url('sesion/login') ,'refresh');
	}

	private function isSesion()
	{
		$sesion = $this->session->userdata('activeSesion');
		if ( isset( $sesion ) ) 
			return TRUE;
		return FALSE;
	}

}

/* End of file Sesion.php */
/* Location: ./application/controllers/Sesion.php */