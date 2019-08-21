<?php

class Web_forgot extends CI_Controller{
	
	var $module = 'forgot';
	
	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
	
		if($this->input->post('save')){
			
			$email = $this->input->post('email');
			$rs = $this->Member->check_email($email);
			
			if(isset($rs[0]->member_id)){
				
				$to = $rs[0]->email;
				$from = $property[0]->property_email;
				
				$subject = $property[0]->property_name.' - Forgot Password';
				$message = 'Hello '.$rs[0]->email.' '."\n";
				$message .= 'Your username/password '."\n";
				$message .= '--------------------------------------------------'."\n";
				$message .= 'username: '.$rs[0]->email."\n";
				$message .= 'password: '.$rs[0]->password."\n";
				$message .= '--------------------------------------------------'."\n";
				$message .= '-Support';
				
				$this->Sendmail->send($to, $from, $subject, nl2br($message));
				header('location:'.base_url().'forgotpassword?complete=1');
				exit;
			}else{
				header('location:'.base_url().'forgotpassword?error=1');
				exit;				
			}
		}
		
		$data['sess']		 = $sess;
		$data['property'] = $property;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['complete'] = $this->input->get('complete');
		$data['error'] = $this->input->get('error');
		$data['module'] = $this->module;
		
		$this->load->view('website/page.forgot.php', $data);
	}
}