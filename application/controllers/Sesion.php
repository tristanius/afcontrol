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
			$this->load->view( 'panel/principal' , array( 'status'=>$status ) );
		else
			$this->load->view( 'sesion/login', array( 'status'=>$status ) );
	}

	public function validate()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$this->load->model('user_db', 'user');
		//librery de encriptado
		$this->load->library('encrypt');
		$users = $this->user->getBy( array( 'usuario'=>$user ) );
		if ( $users->num_rows() > 0 ) {
			$user = $users->row();
			if ( $this->encrypt->decode($user->password) || $pass ) {
				$privs = $this->user->getPrivilegios( $user->rol_idrol );
				$this->initSesion($user, $privs);
			}else{
				redirect( site_url('sesion/login/failed') ,'refresh');
			}
		}else{
			redirect( site_url('sesion/login/failed') ,'refresh');
		}		
	}

	public function genpass($value='')
	{
		$this->load->library('encrypt');
		echo $this->encrypt->encode($value);
	}

	private function initSesion($user, $privs)
	{
		$data = array(
			'user' => (array) $user, 
			'privilegios' => (array) $privs->result(),
			'activeSesion' => TRUE
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
		if ( isset( $sesion ) && $sesion ) 
			return TRUE;
		return FALSE;
	}

}

/* End of file Sesion.php */
/* Location: ./application/controllers/Sesion.php */