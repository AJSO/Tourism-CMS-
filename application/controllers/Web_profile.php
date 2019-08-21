<?php

class Web_profile extends CI_Controller{
	
	var $module = 'profile';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		
		if($sess[0]->login == false){
			echo 'Access Denied';
			exit;
		}
		
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		
		if($this->input->post('save')){
			
			$member_id = $sess[0]->member_id;
			
			$arr['firstname'] = $this->input->post('firstname');
			$arr['lastname'] = $this->input->post('lastname');
			$arr['address'] = $this->input->post('address');
			$arr['city'] = $this->input->post('city');
			$arr['state'] = $this->input->post('state');
			$arr['zipcode'] = $this->input->post('zipcode');
			$arr['country'] = $this->input->post('country');
			$arr['phone'] = $this->input->post('phone');
			$arr['fax'] = $this->input->post('fax');

			$this->Member->update($member_id, $arr);
			
			header('location:'.base_url().'profile?save=1');
			exit;
		}
		
		$member = $this->Member->get_id($sess[0]->member_id);
		$languages = $this->Language->get_all();

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		
		$data['sess']		 = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['currency'] = $this->Currency->get_array();
		$data['member'] = $member;
		$data['languages'] = $languages;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['currencies'] = $this->Currency->get_all();
		$data['payment'] = $this->Payment->get_payment_by_email($member[0]->email);
		$data['countries'] = $this->Country->get();
		
		$this->load->view('website/page.profile.php', $data);
	}
	
	function booking()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		
		if($sess[0]->login == false){
			echo 'Access Denied';
			exit;
		}
		
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$country = $this->input->get('country');		
		$member = $this->Member->get_id($sess[0]->member_id);
		$page = $this->input->get('page');

		if($page == false){ $page = 1;}
		
		switch($this->input->get('field'))
		{
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

		$cart = $this->Cart->get($sess[0]->session_id);
		$languages = $this->Language->get_active();

		$data['sess']		 = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['currency'] = $this->Currency->get_array();
		$data['country'] = $this->Country->get();
		$data['member'] = $member;		
		$data['payment'] = $this->Payment->get_payment_by_email($member[0]->email);
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['cart'] = $cart;
		$data['languages'] = $languages;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['module'] = 'booking';
		$data['currencies'] = $this->Currency->get_all();
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$this->load->view('website/page.profile.booking.php', $data);
	
	}
	
	function booking_info()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		
		if($sess[0]->login == false){
			echo 'Access Denied';
			exit;
		}
		
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$member = $this->Member->get_id($sess[0]->member_id);
		$id = $this->input->get('id');
		$invoice = $this->Payment->get_payment_by_member($member[0]->email, $id);
		
		if(empty($invoice)){
			echo 'Access Denied';
			exit;
		}
	
		$data['sess'] = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['save'] = $this->input->get('save');
		$data['currency'] = $this->Currency->get_array();
		$data['member'] = $member;		
		$data['invoice'] = $invoice;
		$data['languages'] = $this->Language->get_all();
		$data['module'] = 'booking-detail';
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['currencies'] = $this->Currency->get_all();

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$this->load->view('website/page.profile.booking.info.php', $data);
	
	}
	
	function setting()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		
		if($sess[0]->login == false){
			echo 'Access Denied';
			exit;
		}
		
		if($this->input->post('save')){
			
			$member_id = $sess[0]->member_id;
			$arr['email'] = $this->input->post('email');
			$arr['password'] = $this->input->post('password');
			
			$this->Member->update($member_id, $arr);
			
			header('location:'.base_url().'profile/setting?save=1');
			exit;
		}
		
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$member = $this->Member->get_id($sess[0]->member_id);

		$data['sess'] = $sess;
		$data['property'] = $property;
		$data['currencies'] = $this->Currency->get_all();
		$data['module'] = 'setting';
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['save'] = $this->input->get('save');
		$data['member'] = $member;

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$this->load->view('website/page.profile.setting.php', $data);
	
	}

}