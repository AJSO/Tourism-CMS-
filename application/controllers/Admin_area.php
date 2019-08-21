<?php

class Admin_area extends CI_Controller{
	
	var $module = 'areas';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination_id = $this->input->get('destination_id');
		$destination = $this->Destination->get_list();
		if($destination_id == false){
			$destination_id = $destination[0]->destination_id;
		}
		
		switch($this->input->get('field')){
			case'area_id';
				$field = $this->input->get('field');
			break;
			case'area_name';
				$field = $this->input->get('field');
			break;
			case'area_updated';
				$field = $this->input->get('field');
			break;
			default:
				$field = '';
		}
		
		if($this->input->get('sort') == 'DESC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$q = $this->input->get('q');
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['destination'] = $destination;
		$data['destination_id'] = $destination_id;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['area'] = $this->Area->get($destination_id);
		$data['page'] = 1;
		$data['q'] = $q;
		
		$this->load->view('admin/page.area.php', $data);	
		
	}
	
	function edit()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();

		
		if($this->input->post('save')){
			
			$area_id = $this->input->post('area_id');
			$destination_id = $this->input->post('destination_id');
			$area_name = $this->input->post('area_name');
			
			$arr['destination_id'] = $destination_id;
			$arr['area_name'] = $area_name;
			
			if($area_id == false){
				$arr['area_entered'] = date('Y-m-d H:i:s');
				$area_id =$this->Area->insert($arr);
			}else{
				$this->Area->update($area_id, $arr);			
			}
			
			header('location:'.base_url().'admin/area/edit?area_id='.$area_id.'&save=1');			
			exit;			
		}
		
		if($this->input->post('delete')){
			$area_id = $this->input->post('area_id');
			$destination_id = $this->input->post('destination_id');
			
			$this->Area->delete($area_id);
			header('location:'.base_url().'admin/area?destination_id='.$destination_id);			
			exit;
		}
		
		
		$area_id = $this->input->get('area_id');
		$area = $this->Area->get_id($area_id);
		$destination = $this->Destination->get_list();

		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['search_action'] = base_url().'admin/area';
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['area'] = $area;
		$data['destination'] = $destination;

		$this->load->view('admin/page.area.edit.php', $data);	
	
	}
	
}