<?php

class Admin_xxx extends CI_Controller{
	
	var $module = 'periods';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		
		$this->load->view('admin/page.banner.php', $data);	
		
	}
	
}