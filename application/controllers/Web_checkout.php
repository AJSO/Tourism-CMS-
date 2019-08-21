<?php

class Web_checkout extends CI_Controller{
	
	function index($type){
		
		switch($type){
			default:
				$this->paypal();
		}
		
	}
	
	function paypal()
	{
		$id = $this->input->get('id');

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$paypal = $this->Payment->get_setting_type('PayPal');
		$invoice = $this->Payment->get_id($id);

		$data['paypal'] =$paypal;
		$data['invoice'] = $invoice; 
		$data['sess'] = $sess;
		$data['arr'] = json_decode($paypal[0]->detail,true);
		$data['customer'] = json_decode($invoice[0]->customer, true);
		
		$this->load->view('website/payment.paypal.php', $data);
	
	}
	
	
}