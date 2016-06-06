<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class MY_Controller extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'form' );
		$this->load->helper ( 'url' );
		$this->load->helper ( 'security' );
		$this->load->helper ( 'language' );
		$this->load->library('form_validation');		
	}

	private $script_list = array();
	function add_script($src) {
		$this->script_list[] = '<script src="'.base_url('assets/js/'.$src).'.js"></script>'."\n\t";
	}
	
	function get_script_list(){
		$aux = '';
		foreach ($this->script_list as $value) {
			$aux .= $value;
		}
		return $aux;
	}
}
