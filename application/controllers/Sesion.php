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
		if ( !$this->isSesion() )
			redirect( site_url("sesion/login") );
		else
			redirect( site_url("panel") );
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
		$users = $this->user->getRol( array( 'usuario'=>$user ) );
		if ( $users->num_rows() > 0 ) {
			$user = $users->row();
			if ( $this->encrypt->decode( $user->password ) == $pass ) {
				$privs = $this->user->getPrivilegios( $user->rol_idrol );
				$this->start( $user, $privs );
				redirect( site_url() );
			}else{
				redirect( site_url('sesion/login/failed'), 'refresh' );
			}
		}else{
			redirect( site_url('sesion/login/failed'), 'refresh' );
		}		
	}

	public function prt($value='')
	{
		echo json_encode( $this->session->userdata() );
	}

	# ------------------------------------------------------
	# Contraseñas

	public function genpass($value='')
	{
		$this->load->library('encrypt');
		echo $this->encrypt->encode($value);
	}

	public function form_changa_pass($value='')
	{
		$this->load->view('sesion/change_password', array());
	}

	public function change_pass($value='')
	{
		$post = json_decode( file_get_contents("php://input") );
		$this->load->model('user_db','user');
		# Llamamos a la libreria de encryptacion.
		$this->load->library('encrypt');
		# Encryptamos la potencial nueva password y el id de usuario lo desencryptamos.
		$pass = $this->encrypt->encode( $post->password_nueva );
		$id = $this->encrypt->decode( $post->id );
		#  consultamos por el ID de usuario la contraseña actual
		$user = $this->user->getBy( array('idusuario'=>$id) )->row();
		# Generamos el objeto de respuesta.
		$return = new StdClass();
		# compramos la contraseña actual digitada y la de la base de datos sin encryptar.
		if ( $this->encrypt->decode( $user->password ) == $post->password_actual ) {
			# Validamos la contraseña nueva y su confirmación.
			if($post->password_nueva_confirmacion == $post->password_nueva){			
				## Cambiamos la contraseña en la base de datos.
				$this->user->change_pass( $id,  $pass);
				$return->success = true;
				$return->msj = 'Clave correctamente cambiada, por favor ingresa nuevamente a la sesión para continuar.';
			}else{
				$return->success = false;
				$return->msj = 'Las contraseñas nuevas no coinciden.';
			}
		}else{
			$return->success = false;
			$return->msj = 'La contraseña actual no coincide con la registrada.';	
		}
		echo json_encode($return);
	}

	#--------------------------------------------------------

	private function start($user, $privs)
	{
		$this->load->library('encrypt');
		$u = new StdClass();
		$u->idusuario = $this->encrypt->encode($user->idusuario);
		$u->usuario = $user->usuario;
		$u->rol_idrol = $this->encrypt->encode($user->rol_idrol);
		$data = array(
			'user' => (array) $u, 
			'privilegios' => (array) $privs->result(),
			'activeSesion' => TRUE
		);
		$this->session->set_userdata( $data );
	}

	public function end()
	{
		$this->session->sess_destroy();
		redirect( site_url('sesion/login') ,'refresh');
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