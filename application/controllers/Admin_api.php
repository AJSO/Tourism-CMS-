<?php

class Admin_api extends CI_Controller{
	
	var $module = 'api';
	
	function index()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		
		switch($this->input->get('field')){
			case'api_id';
				$field = $this->input->get('field');
			break;
			case'name';
				$field = $this->input->get('field');
			break;
			case'apikey';
				$field = $this->input->get('field');
			break;
			case'updated';
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

		$api = $this->Api->get();

		$data['sort'] = $sort;
		$data['field'] = $field;
		$data['module'] = $this->module;
		$data['api'] = $api;
		
		$this->load->view('admin/page.api.php', $data);	
	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
	
		if($this->input->post('save')){
			$arr['name'] = $this->input->post('name');
			$arr['apikey'] = $this->input->post('apikey');
			
			$api_id = $this->input->post('api_id');
			if($api_id == false){
				$api_id = $this->Api->insert($arr);			
			}else{
				$this->Api->update($api_id, $arr);			
			}
			
			header('location:'.base_url().'admin/api/edit?api_id='.$api_id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete')){ 

			$api_id = $this->input->post('api_id');
			$this->Api->delete($api_id);

			header('location:'.base_url().'admin/api/edit?delete=1');
			exit;
		}
	
		$api_id = $this->input->get('api_id');
		$api = $this->Api->get_id($api_id);

		$data['sess'] = $sess;	
		$data['property'] = $property; 		
		$data['module'] = $this->module;
		$data['api'] = $api;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		
		$this->load->view('admin/page.api.edit.php', $data);	
	}
	
}