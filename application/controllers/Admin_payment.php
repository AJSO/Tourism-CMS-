<?php

class Admin_payment extends CI_Controller{

	var $module = 'payment';

	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		
		switch($this->input->get('field')){
			case'id';
				$field = $this->input->get('field');
			break;
			case'customer';
				$field = $this->input->get('field');
			break;
			case'customer_email';
				$field = $this->input->get('field');
			break;
			case'cost';
				$field = $this->input->get('field');
			break;
			case'tax';
				$field = $this->input->get('field');
			break;
			case'delivery';
				$field = $this->input->get('field');
			break;
			case'total';
				$field = $this->input->get('field');
			break;
			case'payment_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = '';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'DESC';
		}else{
			$sort = 'ASC';
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['payment'] = $this->Payment->get();
		$data['q'] = $this->input->get('q');
		$data['page'] = $page;
		$data['sort'] = $sort;
		$data['field'] = $field;
		
		$this->load->view('admin/page.payment.php', $data);	
	
	}
	
	function info()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$id = $this->input->get('id');
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;		
		$data['invoice'] = $this->Payment->get_id($id);
		$data['search_action'] = base_url().'admin/payment';
		
		$this->load->view('admin/page.payment.info.php', $data);	
	
	}
}