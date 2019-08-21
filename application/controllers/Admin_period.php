<?php

class Admin_period extends CI_Controller{
	
	var $module = 'periods';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination = $this->Destination->get_list();
		$destination_id = $this->input->get('destination_id');
		if($destination_id == false){ $destination_id = $destination[0]->destination_id; }
		$periods = $this->Period->get($destination_id);
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['destination'] = $destination;
		$data['destination_id'] = $destination_id;
		$data['periods'] = $periods;
		
		$this->load->view('admin/page.period.php', $data);	
		
	}
	
	function edit()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination = $this->Destination->get_list();
		$destination_id = $this->input->get('destination_id');
		$period_id = $this->input->get('period_id');
		$period = $this->Period->get_id($period_id);

		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['destination'] = $destination;
		$data['destination_id'] = $destination_id;
		$data['period'] = $period;
		
		$this->load->view('admin/page.period.edit.php', $data);	
	
	}
	
}