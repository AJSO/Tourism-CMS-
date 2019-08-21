<?php

class Web_thankyou extends CI_Controller{
	
	var $module = 'thankyou';
	
	function index()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		
		$id = $this->input->get('id');

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$language = $this->Language->get_code($sess[0]->lang);

		$session_id = $this->Session->getcode();
		$property = $this->Property->get();
		$sumcart = $this->Cart->get_sum($sess[0]->session_id);
		$cart = $this->Cart->get($sess[0]->session_id);

		$data['property'] = $property;
		$data['sess'] = $sess;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['currency'] = $this->Currency->get_array();
		$data['invoice'] = $this->Payment->get_id($id);
		$data['module'] = $this->module;
		
		$this->load->view('website/page.thankyou.php', $data);
	}
	
}