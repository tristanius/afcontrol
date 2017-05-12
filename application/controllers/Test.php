<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$test = $this->load->view('test/form', array(), TRUE);
		$html = $this->load->view('init/panel', array('view'=>$test), TRUE);
		$this->load->view('init/principal', array('titulo'=>'panel principal', 'html'=>$html));

	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */