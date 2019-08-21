<?php
class Admin_hotel extends CI_Controller{

	var $module = 'hotels';
	
	function index()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		
		switch($this->input->get('field'))
		{
			case'hotel_id';
				$field = $this->input->get('field');
			break;
			case'hotel_name';
				$field = $this->input->get('field');
			break;
			case'hotel_rating';
				$field = $this->input->get('field');
			break;
			case'hotel_address';
				$field = $this->input->get('field');
			break;
			case'hotel_city';
				$field = $this->input->get('field');
			break;
			case'hotel_stateprovince';
				$field = $this->input->get('field');
			break;
			case'hotel_county';
				$field = $this->input->get('field');
			break;
			case'hotel_zipcode';
				$field = $this->input->get('field');
			break;
			case'hotel_phone';
				$field = $this->input->get('field');
			break;
			case'hotel_fax';
				$field = $this->input->get('field');
			break;
			case'hotel_website';
				$field = $this->input->get('field');
			break;
			case'hotel_email';
				$field = $this->input->get('field');
			break;
			case'hotel_description';
				$field = $this->input->get('field');
			break;
			case'hotel_facility';
				$field = $this->input->get('field');
			break;
			case'hotel_geolocation';
				$field = $this->input->get('field');
			break;
			case'hotel_price';
				$field = $this->input->get('field');
			break;
			case'hotel_updated';
				$field = $this->input->get('field');
			break;
			case'hotel_entered';
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
		
		
		$hotels = $this->Hotel->get();
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['hotels'] = $hotels;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['q'] = $this->input->get('q');
		
		$this->load->view('admin/page.hotel.property.php', $data);	
	}
	
	function addnew()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();

		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;

		$this->load->view('admin/page.hotel.property.new.php', $data);	
	
	}

}