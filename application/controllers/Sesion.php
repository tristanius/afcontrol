<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		#initCORS();
	}

	public function index()
	{
		
	}

	public function account($err=NULL)
	{
		$this->load->helper("config");
		checkEstados();
		if(!$this->isSesion()){
			redirect(site_url(),'refresh');
		}
		$this->mview("login/account",array("err"=>$err));
	}


	#inciar sesion
	public function form_ini($failed = "")
	{
		if($this->isSesion()){
			redirect(site_url("sesion/account"),'refresh');
		}
		$gestion = $this->load->view("login/login",array("failed"=>$failed),TRUE);
		$body = $this->load->view("utils/plantilla_login",array("gestion"=>$gestion, "ubicacion"=>NULL ),TRUE);
		$this->load->view("principal/indice",array("body"=>$body));
	}


	public function validar($value='')
	{
		$this->load->helper("config");
		checkEstados();
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		$this->load->library("encrypt");
		$this->load->database();
		$rows = $this->db->get_where("usuario",array("usuario"=>$user));
		if($rows->num_rows() == 0){
			redirect(site_url('sesion/form_ini/failed'),'refresh');
		}else{
			$row = $rows->row();
			$password = $this->encrypt->decode($row->password);
			if($pass == $password){
				$this->iniciar($row);
			}else{
				redirect(site_url('sesion/form_ini/fail'),'refresh');
			}
		}
	}

	public function iniciar($row)
	{
		$this->load->library("session");
		$this->session->set_userdata(array("idusuario"=>$row->idusuario, "usuario"=>$row->usuario, "tipo"=>$row->tipo, "sess"=>TRUE));
		redirect(site_url('sesion/account'),'refresh'); 
	}
	#=============================================================================
	#cambiar pass

	public function change_pass($value='')
	{
		$this->load->view("login/cambia_pass");
	}

	public function chpassword($value='')
	{
		$actual = $this->input->post("actual");
		$nueva = $this->input->post("nueva");
		$nueva2 = $this->input->post("nueva2");

		$this->load->database();
		$this->load->library("session");
		$this->load->library("encrypt");
		$row = $this->db->get_where("usuario",array("idusuario"=>$this->session->userdata('idusuario') ) )->row();
		if($this->encrypt->decode($row->password) == $actual && $nueva == $nueva2){
			$this->db->update("usuario",
								array(
									"password"=>$this->encrypt->encode($nueva)
								),
								"idusuario = ".$this->session->userdata('idusuario')
						);
			redirect(site_url('sesion/account/success'),'refresh');
		}else{
			redirect(site_url('sesion/account/error'),'refresh');
		}
	}

	#=============================================================================
	#validar sesion
	private function drasticValidator()
	{
		if(!$this->isSesion()){
			redirect(site_url(),'refresh');
		}
	}

	private function isSesion($value='')
	{
		$this->load->library("session");
		if($this->session->userdata('sess')){
			return TRUE;
		}
		return FALSE;
	}

	public function logout($value='')
	{
		$this->load->library("session");
		$this->session->sess_destroy();
		redirect(site_url(),'refresh');
	}

	public function genAdmin($value='')
	{
		$this->load->database();
		$this->load->library("encrypt");
		$pass = $this->encrypt->encode("user.ad");
		$this->db->insert("usuario", array("usuario"=>"00000","password"=>$pass, "mail"=>"yeiman_4@hotmail.com", "tipo"=>"AdminSys") );

	}

	#==========================================================================================================
	#Vista
	#==========================================================================================================
	public function mview($ruta, $data=NULL, $ubicacion = NULL)
	{
		$gestion = $this->load->view($ruta, $data , TRUE);
		#$direccion = $this->load->view("utils/direccion", array("ubicacion"=>$ubicacion), TRUE);
		$body = $this->load->view("utils/plantilla1",array("gestion"=>$gestion, "ubicacion"=>$ubicacion ),TRUE);
		$this->load->view("principal/indice",array("body"=>$body));
	}
}

/* End of file Sesion.php */
/* Location: ./application/controllers/Sesion.php */