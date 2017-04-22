<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use SimpleExcel\SimpleExcel;
class Verify extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
		//check in the development environment
		if (ENVIRONMENT !== 'development'){
			$this->load->helper('url');
			redirect('/');
		}
	}
	public function index()
	{
		//check enviroment
		$data['environment'] = ENVIRONMENT;
		//we need to see what classes are loaded by default
		$data['loaded_classes'] = $this->load->get_loaded_classes();
		//same as before , a method from MY_Loader that retrieves helpers
		$data['loaded_helpers'] = $this->load->get_loaded_helpers();
		//same as before , a method from MY_Loader that retrieves models
		$data['loaded_models'] = $this->load->get_loaded_models();
		//also retrieve from the config data
		$data['config'] = $this->config->config;
		//now we will see if a connection into database is established
		$data['loaded_database'] = 'Database is not loaded';
		//if we found that a aconnection is established
		if (isset($this->db) && $this->db->conn_id !== FALSE){
			//we will midify a message
			$data['loaded_database'] = 'Database is connected now';
			//and retrieve the database setting
			$data['db_settings'] = array(
				'dsn'		=>	$this->db->dsn,
				'hostname'	=>	$this->db->hostname,
				'port'		=>	$this->db->port,
				'username'	=>	'*****',
				'password'	=>	'*****',
				'database'	=>	'*****',
				//if just it for you to view about database you can change with
				//'username'	=>	$this->db->username,
				//'password'	=>	$this->db->password,
				//'database' 	=>	$this->db->database
				//'driver'	=>	$this->db->driver,
				'dbprefix'	=>	$this->db->dbprefix,
				'pconnect'	=>	$this->db->pconnect,
				'db_debug'	=>	$this->db->db_debug,
				'cache_on'	=>	$this->db->cache_on,
				'cachedir'	=>	$this->db->cachedir,
				'char_set'	=>	$this->db->char_set,
				'dbcollat'	=>	$this->db->dbcollat,
				'swap_pre'	=>	$this->db->swap_pre,
				//'autoinit'	=>	$this->db->autoinit,
				'encrypt'	=>	$this->db->encrypt,
				'compress'	=>	$this->db->compress,
				'stricton'	=>	$this->db->stricton,
				'failover'	=>	$this->db->failover,
				'save_queries'	=>	$this->db->save_queries);
		}
		$cache_path = ($this->config->item('cache_path') === '') ? APPPATH.'cache/' : $this->config->item('cache_path');
		//end verify that it is writable
		if (is_really_writable($cache_path)){
			$data['writable_cache'] = TRUE;
		} else {
			$data['writable_cache'] = FALSE;

		}
		// also look for the logs path
		$log_path = ($this->config->item('log_path') === '' ) ? APPPATH.'logs/' : $this->config->item('log_path');
		if (is_really_writable($log_path)){
			$data['writable_logs'] = TRUE;
		} else {
			$data['writable_logs'] = FALSE;			
		}
		$this->load->helper('url');
		$uploads_path = base_url().'uploads';
		if (is_really_writable($uploads_path)){
			$data['writable_uploads'] = TRUE;
		} else {
			$data['writable_uploads'] = '<span class="red"><strong>'.$uploads_path.'</strong> is not writable</span>';
		}
		$this->load->view('verify_view',$data);
	}
	function test_composer(){
		$excel = new SimpleExcel('xml'); //instantiate new object object
		$excel->writer->setData(
			array(
				array('ID','NAME','KODE'),
				array('1','Kab. Bogor','1'),
				array('2','Kab. Cianjur','2'),
				array('3','Kab. Sukabumi','3'),
				array('4','Kab. Tasikmalaya','4'),
				array('5','Kota Pekalongan','5')));
		$excel->writer->saveFile('contoh');
	}
	function testing_breadcrumb(){
        $this->load->library('make_bread');
        $this->make_bread->add('first crumb', 'testing', 1);
        //$this->make_bread->add('second crumb', 'the_test', 0);
        //$this->make_bread->add('test','http://google.com');
        $breadcrumb = $this->make_bread->output();
        echo $breadcrumb;	}
}
