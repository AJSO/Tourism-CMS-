<?php

class Admin_page extends CI_Controller{
	
	var $module = 'pages';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = $this->input->get('q');
		
		switch($this->input->get('field'))
		{
			case'page_id';
				$field = $this->input->get('field');
			break;
			case'page_menu';
				$field = $this->input->get('field');
			break;
			case'page_slug';
				$field = $this->input->get('field');
			break;
			case'page_title';
				$field = $this->input->get('field');
			break;
			case'page_detail';
				$field = $this->input->get('field');
			break;
			case'page_status';
				$field = $this->input->get('field');
			break;
			case'page_date';
				$field = $this->input->get('field');
			break;
			case'page_updated';
				$field = $this->input->get('field');
			break;
			case'page_entered';
				$field = $this->input->get('field');
			break;
			case'page_display_order';
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
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['items'] = $this->Page->get();
		$data['page'] = $page;
		$data['q'] = $q;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['languages'] = $this->Language->get_active();
		$data['property'] = $this->Property->get();
		$data['page_status'] = $this->input->get('page_status');
		
		$this->load->view('admin/page.pages.php', $data);
		
	}
	
	function edit()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$page_id = $this->input->get('page_id');
		
		if($this->input->post('save')){
			
			$page_id = $this->input->post('page_id');

			$arr['page_menu'] = $this->input->post('page_menu');
			$arr['page_slug'] = $this->Slug->url($this->input->post('page_menu'));
			$arr['page_title'] = $this->input->post('page_title');
			$arr['page_detail'] = $this->input->post('page_detail');
			$arr['page_status'] = $this->input->post('page_status');
			$arr['page_display_order'] = $this->input->post('page_display_order');
		
			$thedate = strtotime($this->input->post('thedate'));
			$arr['page_date'] = date('Y-m-d H:i:s', $thedate);
			
			if($page_id == false){	
				$arr['page_entered'] = date('Y-m-d H:i:s');
				$page_id = $this->Page->insert($arr);
			}else{
				$this->Page->update($page_id, $arr);
			}
						
			header('location: '.base_url().'admin/page/edit?page_id='.$page_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			$this->Page->delete($page_id);

			header('location: '.base_url().'admin/page/edit?page_id='.$page_id.'&delete=1');
			exit;
		}
				
		$data['sess'] = $sess;
		$data['page_id'] = $page_id;
		$data['module'] = $this->module;
		$data['item'] = $this->Page->get_id($page_id);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		
		$display_order = $this->Page->get_max_order();
		
		$data['display_order'] = $display_order;
		$data['property'] = $this->Property->get();
		$data['search_action'] = base_url().'admin/page';
		
		$this->load->view('admin/page.pages.edit.php', $data);
	
	}
	
	function edit_lang($lang)
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$page_id = $this->input->get('page_id');
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['menu'] = $this->input->post('menu');
			$arr['slug'] = $this->Slug->url($arr['menu']);
			$arr['title'] = $this->input->post('title');
			$arr['detail'] = $this->input->post('detail');
			$arr['status'] = $this->input->post('status');
			$arr['page_id'] = $this->input->post('page_id');
			
			if($this->input->post('status') == 1){

				list($mm,$dd,$yy) = explode('/', $this->input->post('thedate'));
				list($hh,$ii) = explode(':', $this->input->post('thetime'));
				$ss = '00';

				$arr['datepublish'] = date('Y-m-d H:i:s', mktime($hh,$ii,$ss,$mm,$dd,$yy));
			}
									
			if($id == false){
				$arr['entered'] = date('Y-m-d H:i:s');
				$id = $this->Page->insert_lang($lang, $arr);
			}else{
				$this->Page->update_lang($lang, $id, $arr);
			}
			
			header('location: '.base_url().'admin/page/'.$lang.'/edit?page_id='.$page_id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete')){
			
			$id = $this->input->post('id');
			$this->Page->delete_lang($lang, $id);
			
			header('location: '.base_url().'admin/page/'.$lang.'/edit?page_id='.$page_id.'&delete=1');			
			exit;
		}
		
		$rs = $this->Language->get_code($property[0]->lang);
		$default_language = $rs[0]->name;
		
		$data['sess'] = $sess;
		$data['page_id'] = $page_id;
		$data['module'] = $this->module;
		$data['content'] = $this->Page->get_id($page_id);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['language'] = $this->Language->get_code($lang);
		$data['item'] = $this->Page->get_lang($lang, $page_id);
		$data['property'] = $property;
		$data['default_language'] = $default_language;
		$data['lang'] = $lang;
		$data['search_action'] = base_url().'admin/page';
		
		$this->load->view('admin/page.pages.edit.lang.php', $data);

	
	}
	
}