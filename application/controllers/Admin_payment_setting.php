<?php

class Admin_payment_setting extends CI_Controller{

	var $module = 'payment-setting';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$q = $this->input->get('q');	
		$payment = $this->Payment->get_setting();
		
		switch($this->input->get('field')){
			case'id';
				$field = $this->input->get('field');
			break;
			case'type';
				$field = $this->input->get('field');
			break;
			case'updated';
				$field = $this->input->get('field');
			break;
			default:
				$field = $this->input->get('field');
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'DESC';
		}else{
			$sort = 'ASC';
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['payment'] = $payment;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['q'] = $q;
		
		$this->load->view('admin/page.property.payment.php', $data);	

	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$id = $this->input->get('id');
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['detail'] = json_encode($this->input->post('detail'));
			
			if($id == false){
				$arr['entered'] = date('Y-m-d H:i:s');
				$this->Payment->setting_insert($arr);
			}else{
				$this->Payment->setting_update($id, $arr);
			}
			
			header('location:'.base_url().'admin/payment-setting/edit?id='.$id.'&save=1');
			exit;
			
		}
		
		$payment = $this->Payment->get_setting_id($id);
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['payment'] = $payment;
		$data['save'] = $this->input->get('save');
		
		if(isset($payment[0]->detail)){
			$data['detail'] = json_decode($payment[0]->detail, true);
		}
		
		$data['card_arr'] = $this->Creditcard->get();

		
		$this->load->view('admin/page.property.payment.edit.php', $data);	
	
	}
}