<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("America/Bogota");
	}

	public function login($fail='')
	{
		if (isset($fail) && $fail == 'fail') {
			$fail = true;
		}
		$vista = $this->load->view('login/login', array('fail'=>$fail), TRUE);
		$this->vw('Inicio de sesión', $vista);
	}

	public function index()
	{
		//$this->load->view('test/form', array() );
		$v = $this->load->view('init/entrada', array(), TRUE);
		$html = $this->plantilla1('Panel entrada App Control de afiliados', $v);
		$this->vw('Panel Principal', $html);
	}

	public function entrada()
	{
		$titulo = 'Panel principal de control de afiliado App.';
		$v = $this->load->view('init/entrada', array(), TRUE);
		$this->load->view('util/plantilla', array( 'titulo'=>$titulo,'content'=>$v ));
	}

	public function plantilla1($titulo='', $content='')
	{
		$test = $this->load->view(
			'util/plantilla', 
			array(
				'titulo'=>$titulo,
				'content'=>$content
			), 
			TRUE
			);
		return $this->load->view('init/panel', array('view'=>$test), TRUE);
	}

	public function vw($titulo='', $html='')
	{
		$this->load->view('init/principal', array('titulo'=>$titulo, 'html'=>$html));
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */