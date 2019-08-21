<?php 
class Web_travelguide extends CI_Controller{

	var $module = 'travelguide';
	
	function index(){
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$languages = $this->Language->get_all();
		$destination = $this->Destination->get_active_list();
		$page = $this->input->get('page');
		if($page == false){
			$page = 1;
		}
		
		if($this->input->get('country')){
			$data['country'] = $this->Country->get_code($this->input->get('country'));
		}
		
		$data['sess'] = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['languages'] = $languages;
		$data['destination'] = $destination;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['countries'] = $this->Destination->get_country();
		$data['page'] = $page;
		$data['currencies'] = $this->Currency->get_all();
		
		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$this->load->view('website/page.travelguide.php',$data);	
	
	}
	
	function info($slug)
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($sess[0]->lang);
		$languages = $this->Language->get_all();
		$destination = $this->Destination->get_slug($slug);
	
		$data['sess'] = $sess;
		$data['property'] = $property;
		$data['language'] = $language;
		$data['languages'] = $languages;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['destination'] = $destination;
		$data['country'] = $this->Country->get_code($destination[0]->destination_country);
		$data['currencies'] = $this->Currency->get_all();
		$data['tours'] = $this->Tour->get_tour_destination($destination[0]->destination_id);

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));
		$this->load->view('website/page.travelguide.info.php',$data);	
	
	}

}