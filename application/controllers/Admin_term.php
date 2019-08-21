<?php

class Admin_term extends CI_Controller{

	var $module = 'terms';
	
	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();

		switch($this->input->get('field')){
			case'term_id';
				$field = $this->input->get('field');
			break;
			case'term_title';
				$field = $this->input->get('field');
			break;
			case'term_default';
				$field = $this->input->get('field');
			break;
			case'term_updateds';
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
		
		$page = $this->input->get('page');
		if($page == false){
			$page = 1;
		}

		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['term'] = $this->Term->get();
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['q'] = $this->input->get('q');
		$data['languages'] = $this->Language->get_active();
		$data['page'] = $page;
		
		$this->load->view('admin/page.term.php', $data);	
	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$term_id = $this->input->get('term_id');
		
		if($this->input->post('save')){
			
			$term_id = $this->input->post('term_id');

			$arr['term_title'] = $this->input->post('term_title');
			$arr['term_description'] = $this->input->post('term_description');
			$arr['term_default'] = $this->input->post('term_default');
			
			if($term_id == false){
				$term_id = $this->Term->insert($arr);
			}else{
				$this->Term->update($term_id, $arr);			
			}
			
			if($arr['term_default'] == 1){
				$this->Term->update_default($term_id);							
			}
			
			header('location: '.base_url().'admin/term/edit?term_id='.$term_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$term_id = $this->input->post('term_id');
			$this->Term->delete($term_id);
			
			header('location:'.base_url().'admin/term');
			exit;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['term'] = $this->Term->get_id($term_id);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		
		$this->load->view('admin/page.term.edit.php', $data);	

	}
	
	function edit_lang($lang)
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$term_id = $this->input->get('term_id');

		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['lang'] = $lang;
			$arr['term_id'] = $term_id;
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			
			if($id == false){
				$this->Term->insert_lang($arr);
			}else{
				$this->Term->update_lang($id, $arr);
			}
			
			header('location:'.base_url().'admin/term/'.$lang.'/edit?term_id='.$term_id.'&save=1');
			exit;
		}	
		
		if($this->input->post('delete')){
			
			$id = $this->input->post('id');
			$this->Term->delete_lang($id);

			header('location:'.base_url().'admin/term/'.$lang.'/edit?term_id='.$term_id.'&delete=1');
			exit;
		}	

		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['item'] = $this->Term->get_lang_id($term_id, $lang);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['original'] = $this->Language->get_code($property[0]->lang);
		$data['language'] = $this->Language->get_code($lang);
		$data['term'] = $this->Term->get_id($term_id);
		
		$this->load->view('admin/page.term.edit.lang.php', $data);	
	
	}
}