<?php

class Web_contact extends CI_Controller{
	
	var $module = 'contactus';

	function index()
	{		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$error = 0;
		
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));

		$language = $this->Language->get_code($sess[0]->lang);
		$session_id = $this->Session->getcode();
		$property = $this->Property->get();
		$currency = $this->Currency->get_array();		

		if($this->input->post('save')){			
			if($this->input->post('g-recaptcha-response') == false){
				$error_reason[$error] = 'g-recaptcha-response';
				$error++;
			}
			
			if($this->input->post('contact') == false){
				$error++;			
			}
		
			if($error == false){
				
				$contact = $this->input->post('contact');				
				
				$subject = '['.$property[0]->property_name.'] - Message sent via your Contact form ';
				$message = '';
				foreach($contact as $index=>$value){			
					$message .= "$index: $value \n";
				}
				$message = nl2br($message);
				$this->Sendmail->send($property[0]->property_email, $contact['email'], $subject, $message);
				
				$arr['contactname'] = $contact['firstname'] .' '.$contact['lastname'];
				$arr['email'] = $contact['email'];
				$arr['title'] = $subject;
				$arr['comments'] = $contact['message'];				
				
				$this->Contact->insert($arr);
				
				header('location:'.base_url().'contactus?save=1');
				exit;
			}
		}
		
		$data['property'] = $property;
		$data['language'] = $language;
		$data['sess'] = $sess;
		$data['recaptcha'] = $this->Api->get_api('reCAPTCHA');
		$data['content'] = $this->Page->get_slug($language[0]->code, $property, 'contact-us');
		$data['save'] = $this->input->get('save');
		$data['currency'] = $currency;
		$data['languages'] = $this->Language->get_all();

		if(isset($error_reason)){
			$data['error_reason'] = $error_reason;
		}
		$data['error'] = $error;
		$data['module'] = $this->module;
		$data['currencies'] = $this->Currency->get_active();
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
					
		$this->load->view('website/page.contact.php', $data);
	
	}

}