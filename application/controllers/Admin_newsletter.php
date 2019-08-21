<?php
class Admin_newsletter extends CI_Controller{

	var $module = 'newsletter';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
			
		$q = $this->input->get('q');
		$limit = 100;
		$page = $this->input->get('page');
		if($page){ $page = 1;}
		
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'newsletter_id';
				$field = $this->input->get('field');
			break;
			case'email';
				$field = $this->input->get('field');
			break;
			case'unsubscribe';
				$field = $this->input->get('field');
			break;
			case'newsletter_updated';
				$field = $this->input->get('field');
			break;
			case'newsletter_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = '';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['q'] = $q;
		$data['newsletter'] = $this->Newsletter->get();
		
		$this->load->view('admin/page.newsletter.php', $data);				
	}
	
	function export()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['newsletter'] = $this->Newsletter->export();
		
		$this->load->view('admin/page.newsletter.export.php', $data);	
		
	}

}