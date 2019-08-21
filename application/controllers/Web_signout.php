<?php

class Web_signout extends CI_Controller{

	function index(){
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		
		$data['sess']		 = $sess;
		$data['property'] = $property;

		$arr['logout'] = 1;
		$arr['login'] = 0;
		$arr['member_id'] = 0;

		if($this->input->get('logout') == false){
			$this->Session->web_track_update($session_id, $arr);
			header('location:'.base_url().'signin');
			exit;
		}
	}
}