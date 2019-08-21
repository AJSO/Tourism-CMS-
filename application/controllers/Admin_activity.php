<?php

class Admin_activity extends CI_Controller{

	var $module = 'activity';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$year = $this->input->get('year');
		if($year == false){ $year = date('Y');}
		
		$activity = $this->Activity->get($year);
		$page = $this->input->get('page');
		if($page == 0){ $page = 1;}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'DESC';
		}else{
			$sort = 'ASC';
		}
		
		$field = $this->input->get('field');
		$q = $this->input->get('q');
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $property;
		$data['year'] = $year;
		$data['field'] = $field;
		$data['sort']	= $sort;
		$data['activity'] = $activity;
		$data['page'] = $page;
		$data['q'] = $q;
			
		$this->load->view('admin/page.activity.php', $data);
	}

}