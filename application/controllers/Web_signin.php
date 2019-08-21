<?php

class Web_signin extends CI_Controller{
	
	var $module = 'signin';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));

		if($this->input->post('save')){
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$rs = $this->Member->check_member_email_password($email, $password);
			if(isset($rs[0]->member_id)){

				$arr['member_id'] = $rs[0]->member_id;
				$arr['login']= 1;				
				$this->Session->web_track_update($session_id, $arr);
				
				header('location:'.base_url().'profile');
				exit;
				
			}else{
				header('location:'.base_url().'signin?error=login-false');
				exit;				
			}
		}

		$languages = $this->Language->get_active();
		
		$data['sess']		 = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['currency'] = $this->Currency->get_array();
		$data['languages'] = $languages;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['error'] = $this->input->get('error');
		
		$this->load->view('website/page.signin.php', $data);
	
	}

}