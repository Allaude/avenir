<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Make_bread 
{
	private $_include_home;
	private $_breadcrumb = array();
	private $_divider;
	private $_container_open;
	private $_container_close;
	private $_crumb_open;
	private $_crumb_close;

	function __construct()
	{
		$CI =& get_instance();
		$CI->load->helper('url');
		if (isset($this->_include_home) && (sizeof($this->_include_home) > 0)){
			//we will trim the last '/' just to make sure we are consistent with all server
			$this->_breadcrumb[] = array('title' => $this->_include_home,'href'=>rtrim(base_url(),'/'));
		}
	}
	public function add($title = NULL,$href = '',$segment = FALSE){
		//if the method won't receive the $title parameter, it won't do anything
		if(is_null($title)) return;
		//first let find out if we have  $href
		if(isset($href) && strlen($href)>0){
			//if $segment is not false we will build the url from the previous crumb
			if($segment === TRUE){
				$previous = $this->_breadcrumb[sizeof($this->_breadcrumb) - 1]['href'];
				$href = $previous.'/'.$href;
			} elseif (!filter_var($href, FILTER_VALIDATE_URL)){
				$href = site_url($href);
			} 
		}
		//add crumb to the end of breadcrumb
		$this->_breadcrumb[] = array('title'=>$title,'href'=>$href);
	}
	public function output(){
		//we open the container tag
		$output = $this->_container_open;
		if (sizeof($this->_breadcrumb) > 0){
			foreach ($this->_breadcrumb as $key => $crumb) {
				$output .= $this->_crumb_open;
				if (strlen($crumb['href']) > 0){
					$output .= anchor($crumb['href'],$crumb['title']);
				} else {
					$output .= $crumb['title'];
				}
				$output .= $this->_crumb_close;
				if ($key < (sizeof($this->_breadcrumb) - 1)){
					$output .= $this->_divider;
				}
			}
		}
		$output .= $this->_container_close;
		return $output;
	}
}

/* End of file Make_bread.php */
/* Location: ./application/libraries/Make_bread.php */ ?>