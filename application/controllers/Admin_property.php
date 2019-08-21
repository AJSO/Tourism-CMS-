<?php

class Admin_property extends CI_Controller{
	
	var $module = 'property';

	function index(){
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['country'] = $this->Country->get();
		$data['property'] = $this->Property->get();

		if($this->input->post('save')){
			
			$property_id = $this->input->post('property_id');
			$arr['property_name'] = $this->input->post('property_name');
			$arr['property_address'] = $this->input->post('property_address');
			$arr['property_city'] = $this->input->post('property_city');
			$arr['property_state'] = $this->input->post('property_state');
			$arr['property_zipcode'] = $this->input->post('property_zipcode');
			$arr['property_country'] = $this->input->post('property_country');
			$arr['property_email'] = $this->input->post('property_email');
			$arr['property_website'] = $this->input->post('property_website');
			$arr['property_phone'] = $this->input->post('property_phone');
			$arr['property_fax'] = $this->input->post('property_fax');
			$arr['property_mobile'] = $this->input->post('property_mobile');
			$arr['property_location'] = $this->input->post('property_location');
			$arr['social'] = json_encode($this->input->post('social'));
			$arr['currency'] = $this->input->post('currency');
			$arr['lang'] = $this->input->post('lang');
			
			$this->Property->update($property_id, $arr);		
			$this->Activity->msg($sess[0]->user_id,'Update property information');
			
			header('location: '.base_url().'admin/property?save=1');
			exit;
		}

		$data['languages'] = $this->Language->get();
		$data['save'] = $this->input->get('save');
		$data['socials'] = $this->Social->socials();
		$data['currency'] = $this->Currency->get();
		
		$this->load->view('admin/page.property.php', $data);
	}
	
}