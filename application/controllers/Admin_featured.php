<?php

class Admin_featured extends CI_Controller{
	
	var $module = 'featured';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination = $this->Destination->get_list();
		$destination_id = $this->input->get('destination_id');
		
		if($this->input->post('save')){
			
			$tours = $this->input->post('tours');
			$this->Featured->delete($destination_id);
			
			foreach($tours as $index=>$value){
				$arr['destination_id'] = $this->input->post('destination_id');
				$arr['tour_id'] = $value;
				$this->Featured->insert($arr);
			}
			
			header('location:'.base_url().'admin/featured?destination_id='.$destination_id.'&save=1');
		}
		
		
		if($destination_id == false){
			$destination_id = $destination[0]->destination_id;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['destination'] = $destination;
		$data['tour'] = $this->Tour->get_all($destination_id);
		$data['save'] = $this->input->get('save');
		$data['featured'] = $this->Featured->get($destination_id); 
		$data['destination_id'] = $destination_id;
		
		$this->load->view('admin/page.featured.php', $data);	
		
	}
	
}