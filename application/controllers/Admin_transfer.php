<?php 
class Admin_transfer extends CI_Controller{

	var $module = 'transfer';

	function car()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$brands = $this->Transfer->get_brand();
		$brand = $this->input->get('brand');
		if($brand == false){
			if(isset($brands[0]->car_brand)){
				$brand = $brands[0]->car_brand;
			}else{
				$brand = '';
			}
		}
		
		switch($this->input->get('field')){
			case'car_id';
				$field = $this->input->get('field');
			break;
			case'car_model';
				$field = $this->input->get('field');
			break;
			case'car_year';
				$field = $this->input->get('field');
			break;
			case'car_passenger_capacity';
				$field = $this->input->get('field');
			break;
			case'car_luggage_large_capacity';
				$field = $this->input->get('field');
			break;
			case'car_luggage_small_capacity';
				$field = $this->input->get('field');
			break;
			case'car_transmission';
				$field = $this->input->get('field');
			break;
			case'car_front_entertainment';
				$field = $this->input->get('field');
			break;
			case'car_back_entertainment';
				$field = $this->input->get('field');
			break;
			case'car_brand';
				$field = $this->input->get('field');
			break;
			case'car_updated';
				$field = $this->input->get('field');
			break;
			case'car_entered';
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
		$data['cars'] = $this->Transfer->get_car($brand);
		$data['brands'] = $brands;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = 1;
		$data['q'] = $this->input->get('q');
		
		$this->load->view('admin/page.transfer.car.php', $data);	
	
	}
	
	function car_edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
			
		if($this->input->post('save')){
		
			$car_id = $this->input->post('car_id');
			
			$arr['car_model'] = $this->input->post('car_model');
			$arr['car_brand'] = $this->input->post('car_brand');
			$arr['car_year'] = $this->input->post('car_year');
			$arr['car_passenger_capacity'] = $this->input->post('car_passenger_capacity');
			$arr['car_luggage_large_capacity'] = $this->input->post('car_luggage_large_capacity');
			$arr['car_luggage_small_capacity'] = $this->input->post('car_luggage_small_capacity');
			$arr['car_transmission'] = $this->input->post('car_transmission');
			$arr['car_entertainment'] = $this->input->post('car_entertainment');
			$arr['car_brand'] = $this->input->post('car_brand');
			
			if($car_id == false){
				$arr['car_entered'] = date('Y-m-d H:i:s');
				$car_id = $this->Transfer->insert_car($arr);
			}else{
				$this->Transfer->update_car($car_id, $arr);
			}
			
			if(is_file($_FILES['image']['tmp_name'])){
				$filepath = 'uploads/car/'.sprintf('%05d',$car_id).'.jpg';
				move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
				$this->Transfer->update_car($car_id, array('car_photo'=>$filepath));	
			}
			
			header('location:'.base_url().'admin/transfer/car/edit?car_id='.$car_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$car_id = $this->input->post('car_id');
			$this->Transfer->delete_car($car_id);
			
			header('location:'.base_url().'admin/transfer/car');
			exit;
		}
		
		$car_id = $this->input->get('car_id');
		$car = $this->Transfer->get_car_id($car_id);
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['brands'] = $this->Transfer->car_brand();
		$data['car'] = $car;
		
		$this->load->view('admin/page.transfer.car.edit.php', $data);	
	
	}
	
	function price()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination_id = $this->input->get('destination_id');
		$brand = $this->input->get('brand');
		$area_id = $this->input->get('area_id');

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination = $this->Destination->get_list();
		$brands = $this->Transfer->get_brand();


		if($destination_id == false){
			if(isset($destination[0]->destination_id)){
				$destination_id = $destination[0]->destination_id;
			}
		}
		
		if($brand == false){
			$brand = $brands[0]->car_brand;
		}
		
		$car = $this->Transfer->get_car($brand);
		$area = $this->Area->get($destination_id);
		if($area_id == false){
			if(isset($area[0]->area_id)){
				$area_id = $area[0]->area_id;
			}
		}
		
		if($this->input->post('save')){
			
			$area_id_1 = $this->input->post('area_id');
			$price = $this->input->post('price');
			
			foreach($price as $car_id=>$value){		
					
				foreach($value as $area_id_2=>$price){
					$arr['area_id_1'] = $area_id_1;
					$arr['area_id_2'] = $area_id_2;
					$arr['car_id'] = $car_id;
					$arr['price'] = $price;
					$arr['destination_id'] = $destination_id;
					$arr['currency'] = $property[0]->currency;
					$arr['entered'] = date('Y-m-d H:i:s');
					if($arr['area_id_1'] != $arr['area_id_2']){
						$this->Transfer->save_rate($arr);
					}
				}
			}
									
			header('location: '.base_url().'admin/transfer/price?destination_id='.$destination_id.'&area_id='.$area_id_1.'&save=1');
			exit;
		}
		 
		$rate = $this->Transfer->get_rate($destination_id);
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['destination'] = $destination;
		$data['brands'] = $brands;
		$data['area'] = $area;
		$data['destination_id'] = $destination_id; 
		$data['car'] = $car;
		$data['area_id'] = $area_id;
		$data['rate'] = $rate;
				
		$this->load->view('admin/page.transfer.price.php', $data);	
	
	}
	
	function service()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			$arr['term_id'] = $this->input->post('term_id');
			
			if($id == false){
				$this->Transfer->insert_service($arr);
			}else{
				$this->Transfer->update_service($id, $arr);
			}
			
			header('location:'.base_url().'admin/transfer/service?save=1');
			exit;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['save'] = $this->input->get('save');
		$data['term'] = $this->Term->get_all();
		$data['service'] = $this->Transfer->get_service();

		$this->load->view('admin/page.transfer.service.php', $data);	
	
	}
	
}