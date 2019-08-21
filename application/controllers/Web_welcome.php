<?php

class Web_welcome extends CI_Controller{
	
	var $module = 'homepage';

	function index()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$slide = $this->Widget->get_type_all('slide');
		$featured = $this->Featured->get_all();
		$populartours = $this->Widget->get_type_all('populartours');

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));

		$data['property'] = $property;
		$data['sess'] = $sess;
		$data['seo'] = $this->Seo->get_lang($sess[0]->lang);
		$data['currency'] = $this->Currency->get_array();
		$data['module'] = $this->module;
		$data['slide'] = $slide;
		$data['featured'] = $featured;
		$data['sym'] = $this->Currency->get_code($sess[0]->currency);
		$data['populartours'] = $populartours;
	
		if($sess[0]->member_id){
			$data['member'] = $this->Member->get_id($sess[0]->member_id);
		}
			
		$this->load->view('website/page.home.php', $data);
	}

}