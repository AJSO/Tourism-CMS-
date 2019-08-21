<?php

class Web_register extends CI_Controller{
	
	var $module = 'register';
	
	function index()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$property = $this->Property->get();

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		
		if($this->input->post('save')){
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$result = $this->Member->check_member($email);
			if($result == true){

				$arr['email'] = $email;
				$arr['password'] = $password;
				
				$member_id = $this->Member->insert($arr);
				
				$to = $arr['email'];
				$from = $property[0]->property_email;
				$subject = $property[0]->property_name.' - Thank you for registering with us.';
				$url = base_url().'signin';
				
				$message = 'Hello '.$email.' '."\n";
				$message .= 'Thank you for registering with us ';
				$message .= '<hr>';
				$message .= 'Access: <a href="'.$url.'">'.$url."</a>\n";
				$message .= 'username: '.$email."\n";
				$message .= 'password: '.$password."\n";
				$message .= '<hr>';
				$message .= ' - Support';
				
				$this->Sendmail->send($to, $from, $subject, nl2br($message));
				header('location:'.base_url().'register?complete=1');
				exit;
			}else{
				header('location:'.base_url().'register?error=1');
				exit;
			}
		}

		$data['sess']		 = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['error'] = $this->input->get('error');
		$data['complete'] = $this->input->get('complete');
	
		$this->load->view('website/page.register.php',$data);
	}
}