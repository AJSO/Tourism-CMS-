<?php

class Web_tour extends CI_Controller{
	
	var $module = 'tours';
	
	function index($category)
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$languages = $this->Language->get_all();
		$rate = $this->Tour->get_min_max($category);
		$page = $this->input->get('page');
		if($page == false){
			$page = 1;
		}
		
		if($this->input->get('rating')){
			$rating = $this->input->get('rating');
		}else{
			$rating = array();		
		}
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));

		$data['property'] = $property;
		$data['language'] = $language;
		$data['sess'] = $sess;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['currency'] = $this->Currency->get_array();
		$data['currencies'] = $this->Currency->get_all();
		$data['languages'] = $languages;
		$data['module'] = $category;
		$data['category'] = $category;
		$data['tour'] = $this->Tour->get_category($category);
		$data['types'] = $this->Tour->get_available_type($category);
		$data['rate'] =  $rate;
		$data['rating'] =  $rating;
		$data['type'] = $this->input->get('type');
		$data['destination'] = $this->Tour->get_destination($category);
		$data['destination_id'] = $this->input->get('destination_id');
		$data['sym'] = $this->Currency->get_code($sess[0]->currency);

		if($this->input->get('min_rate_select')){
			$min_rate_select = $this->input->get('min_rate_select');
			$max_rate_select = $this->input->get('max_rate_select');
		}else{
			$min_rate_select = $rate[0]->min_rate;
			$max_rate_select = $rate[0]->max_rate;
		}
		
		$data['min_rate_select'] = $min_rate_select;
		$data['max_rate_select'] = $max_rate_select;
		
		if($sess[0]->member_id){
			$data['member'] = $this->Member->get_id($sess[0]->member_id);
		}
		$data['page'] = $page;
					
		$this->load->view('website/page.tour.php', $data);
	}
	
	function info($category, $slug)
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$languages = $this->Language->get_all();
		$tour = $this->Tour->get_slug($slug);
		$destination = $this->Destination->get_id($tour[0]->destination_id);

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));

		$data['property'] = $property;
		$data['language'] = $language;
		$data['sess'] = $sess;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['currency'] = $this->Currency->get_array();
		$data['currencies'] = $this->Currency->get_all();
		$data['languages'] = $languages;
		$data['module'] = 'tourinfo';
		$data['category'] = $category;
		$data['tour'] = $tour;
		$data['term'] = $this->Term->get_id($tour[0]->term_id);
		$data['destination'] = $destination;
		$data['country'] = $this->Country->get_code($destination[0]->destination_country);
		$data['related'] = $this->Tour->get_related($tour[0]->tour_id, $tour[0]->destination_id, $tour[0]->type);
		$data['sym'] = $this->Currency->get_code($sess[0]->currency);
	
		if($sess[0]->member_id){
			$data['member'] = $this->Member->get_id($sess[0]->member_id);
		}

		$this->load->view('website/page.tour.info.php', $data);
	
	}
	
	function checkrate()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		
		$tour_id = $this->input->get('tour_id');
		$adults = $this->input->get('adults');		
		$child = $this->input->get('child');	
		$checkin = $this->input->get('checkin');	
		
		$tour = $this->Tour->get_id($tour_id);
		
		if($tour[0]->tour_period == 0){
			
			$price = ($tour[0]->tour_price * $adults) + ($tour[0]->tour_price_child * $child);
			
		}else{
			
			$rate = $this->Tour->rate_period($tour[0]->tour_id, $tour[0]->destination_id, date('Y-m-d',strtotime($checkin)));
			$price = ($rate[0]->adult * $adults) + ($rate[0]->child * $child); 			
		
		}
		
		$data['sess'] = $sess;
		$data['currency'] = $this->Currency->get_array();
		$data['tour'] = $tour;
		$data['price'] = $price;
		$data['checkin'] = date('Y-m-d', strtotime($checkin));
		$data['adults'] = $adults;
		$data['child'] = $child;
		
		$this->load->view('website/page.tour.price.php', $data);
	
	}
	
	function addcart()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
				
		$arr['session_id'] = $session_id; 
		$arr['item'] = $this->input->post('item'); 
		$arr['checkin'] = $this->input->post('checkin');
		$arr['adults'] = $this->input->post('adults'); 
		$arr['child'] = $this->input->post('child'); 
		$arr['cost'] = $this->input->post('cost'); 
		$arr['tax'] = $arr['cost'] * ($property[0]->property_tax/100);
		$arr['total'] = $arr['cost'] + $arr['tax'];
		$arr['currency'] = $this->input->post('currency'); 
		$arr['entered'] = date('Y-m-d H:i:s');
		
		$this->Cart->insert($arr);
	
		header('location:'.base_url().'cart');
		exit;
	
	}
	
	
}