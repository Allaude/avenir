<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in() === FALSE) {
			$this->load->helper('url');
			redirect('user/login','refresh');
		}
	}
	protected function render($the_view = NULL,$template = 'auth_master'){
		parent::render($the_view,$template);
	}

}

/* End of file Auth_Controller.php */
/* Location: ./application/core/Auth_Controller.php */ 