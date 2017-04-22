<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	function __construct()
	{
		parent::__construct();
	}
	function get_loaded_classes(){
		return $this->_ci_classes;
	}
	function get_loaded_helpers(){
		$loaded_helpers = array();
		if (sizeof($this->_ci_helpers) !== 0){
			foreach ($this->_ci_helpers as $key => $value) {
				$loaded_helpers[] = $key;
			}
		}
		return $loaded_helpers;
	}
	function get_loaded_models(){
		return $this->_ci_models;
	}

}

/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */ ?>