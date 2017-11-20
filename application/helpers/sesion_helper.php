<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function redirSesion ( $status_sesion, $url=''){
	if( $status_sesion ){
		redirect( site_url( $url ) ,'refresh');
	}
}