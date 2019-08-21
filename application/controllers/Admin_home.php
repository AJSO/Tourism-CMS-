<?php

class Admin_home extends CI_Controller{
	
	var $module = 'home';
	
	function index(){
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$q = $this->input->get('q');
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $property;
		

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
	
		$data['monthincome'] = $this->Payment->get_monthincome();	
		$data['monthorder'] = $this->Payment->get_monthorder();
		$data['inquiry'] = $this->Contact->get_count();
		
		$data['count_category'] = $this->Category->get_count_category();
		$data['count_newsletter'] = $this->Newsletter->get_count_newsletter();
		$data['count_member'] = $this->Member->get_count_member();
		$data['count_trafic'] = $this->Session->get_count_web();
		$data['count_order'] = $this->Payment->get_count();
		$data['sum_payment'] = $this->Payment->get_sum_payment();
		$data['payment'] = $this->Payment->get();
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['q'] = $q;
		
		$this->load->view('admin/page.home.php',$data);
		
	}
	
	function error_404(){
	
		$this->load->view('admin/error.404.php');
	}
	
}