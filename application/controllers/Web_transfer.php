<?php

class Web_transfer extends CI_Controller{

	var $module = 'transfer';
	
	function index()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$languages = $this->Language->get_all();
		$destination = $this->Transfer->get_destination();
		$area = $this->Area->get($destination[0]->destination_id);
		$cars = $this->Transfer->get_car_list();
		$service = $this->Transfer->get_service();
		
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		
		$data['module'] = $this->module;
		$data['sess'] = $sess;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['property'] = $property;
		$data['language'] = $language;
		$data['languages'] = $languages;
		$data['currency'] = $this->Currency->get_array();
		$data['currencies'] = $this->Currency->get_all();
		$data['destination'] = $destination;
		$data['term'] = $this->Term->get_id($service[0]->term_id);
		$data['area'] = $area;
		$data['cars'] = $cars;
		$data['service'] = $service;
		$data['rate'] = $this->Transfer->get_rate($destination[0]->destination_id);
		if($this->input->get('area_id')){
			$data['area_id'] = $this->input->get('area_id');
		}else{
			if(isset($area[0]->area_id)){
				$data['area_id'] = $area[0]->area_id;
			}
		}
		$this->load->view('website/page.transfer.php', $data);
	}
	
	function destination()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		
		$destination = $this->Destination->get_active();
		echo '<option value="0"> - '.$this->lang->line('Select').' - </option>';
		foreach($destination as $index=>$value){
			echo '<option value="'.$value->destination_id.'">'.$value->destination_name.'</option>';
		}
		
	}
	
	function area_1(){
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$destination_id = $this->input->get('destination_id');
		
		$area = $this->Area->get($destination_id);
		
		echo '<option value="0"> - '.$this->lang->line('Select').' - </option>';
		if(count($area)){
			foreach($area as $index=>$value){
				echo '<option value="'.$value->area_id.'">'.$value->area_name.'</option>';
			}
		}else{
			echo '<option value="0">N/A</option>';		
		}
	}
	
	function area_2()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$destination_id = $this->input->get('destination_id');
		$pickup = $this->input->get('pickup');
		$area = $this->Area->get($destination_id);

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		echo '<option value="0"> - '.$this->lang->line('Select').' - </option>';

		if($pickup > 0){
			
			$n = 0;
			foreach($area as $index=>$value){
				if($pickup != $value->area_id){
					echo '<option value="'.$value->area_id.'">'.$value->area_name.'</option>';
					$n++;
				}
			}
			
			if($n == 0){
				echo '<option value="0">N/A</option>';
			}
			
		}else{
			unset($area[0]);
			
			if(count($area)){
				foreach($area as $index=>$value){
					echo '<option value="'.$value->area_id.'">'.$value->area_name.'</option>';
				}
			}else{
				echo '<option value="0">N/A</option>';
			}
		}
	}
	
	function rate()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);

		$destination_id = $this->input->get('destination_id');
		$pickup = $this->input->get('pickup');
		$dropoff = $this->input->get('dropoff');
		$car_id = $this->input->get('car_id');	
		$rate = $this->Transfer->get_rate($destination_id);
			
		if(isset($rate[$car_id][$pickup][$dropoff])){
			echo $rate[$car_id][$pickup][$dropoff];
		}else{
			echo 'N/A';
		}
	}
	
	function addcart()
	{
	
		if($this->input->post('save')){
			
			
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			
			$session_id = $this->Session->getcode();
			$sess = $this->Session->web_track($session_id);
			$property = $this->Property->get();		
			
			$car_id = $this->input->post('car_id');
			$pickup = $this->input->post('pickup');
			$dropoff = $this->input->post('dropoff');
			
			$car = $this->Transfer->get_car_id($car_id);
			$pickup_area = $this->Area->get_id($pickup);
			$dropoff_area = $this->Area->get_id($dropoff);
			
			$arr['session_id'] = $session_id; 
			$arr['item'] = $this->lang->line('Transfer'). ' '.$this->input->post('trip') . ' '.$car[0]->car_model.' '.$pickup_area[0]->area_name. ' - '.$dropoff_area[0]->area_name ; 
			$arr['checkin'] = date('Y-m-d',strtotime($this->input->post('checkin')));
			$arr['checkin_time'] = date("H:i", strtotime($this->input->post('checkin_time')));
			$arr['adults'] = $car[0]->car_passenger_capacity; 
			$arr['cost'] = $this->input->post('price'); 
			$arr['tax'] = $arr['cost'] * ($property[0]->property_tax/100);
			$arr['total'] = $arr['cost'] + $arr['tax'];
			$arr['currency'] = $property[0]->currency; 
			$arr['entered'] = date('Y-m-d H:i:s');
		
			$this->Cart->insert($arr);
			
			header('location:'.base_url().'cart');
			exit;
		
		}
	
	}
		
}