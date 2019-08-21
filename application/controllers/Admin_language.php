<?php

class Admin_language extends CI_Controller
{
	
	var $module = 'language';
	
	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();

		$data['sess'] = $sess;
		$data['module'] = $this->module;
		
		if($this->input->get('sort') == 'DESC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}

		$data['property'] = $property;
		$data['languages'] = $this->Language->get();
		$data['field'] = $this->input->get('field');
		$data['sort'] = $sort;
		
		$this->load->view('admin/page.language.php', $data);	
	}
	
	function active()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;

		$code = $this->input->get('code');
		$this->Language->update($code, 1);

		header('location: '.$_SERVER['HTTP_REFERER']);
		exit;
	}
	
	function inactive()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;

		$code = $this->input->get('code');
		$this->Language->update($code, 0);
		
		header('location: '.$_SERVER['HTTP_REFERER']);
		exit;
		
	}
	
}