<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$html = $this->plantilla1('Panel principal de control de afiliado App.', 'x');
		$this->vw('Panel Principal', $html);
	}

	public function test()
	{
		$vista = $this->load->view('test/form', array(), TRUE);
		$html = $this->load->view('init/panel', array('view'=>$vista), TRUE);
		$this->vw('Panel Principal', $html);
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