<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Auth_Controller {

	public function index()
	{
		$this->render('dashboard/index_view');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/core/Dashboard.php */ 