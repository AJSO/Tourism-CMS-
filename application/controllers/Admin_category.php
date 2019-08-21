<?php

class Admin_category extends CI_Controller{
	
	var $module = 'categories';

	function index()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$page = $this->input->get('page');
		$category_active = $this->input->get('category_active');
		
		if($page == 0){ $page = 1;}
		$q = $this->input->get('q');
		
		switch($this->input->get('field')){
			case'category_id';
				$field = $this->input->get('field');
			break;
			case'parent_id';
				$field = $this->input->get('field');
			break;
			case'category_title';
				$field = $this->input->get('field');
			break;
			case'category_description';
				$field = $this->input->get('field');
			break;
			case'thumbnail';
				$field = $this->input->get('field');
			break;
			case'category_active';
				$field = $this->input->get('field');
			break;
			case'category_published_article';
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
		$data['category'] = $this->Category->get();
		$data['page'] = $page;
		$data['sort'] = $sort;
		$data['field'] = $field;
		$data['q'] = $q;
		$data['property'] = $this->Property->get();
		$data['languages'] = $this->Language->get_active();
		$data['category_active'] = $category_active;
		$this->load->view('admin/page.category.php',$data);		
		
	}
	
	function edit()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $property;
		
		if($this->input->post('save')){
			
			$category_id = $this->input->post('category_id');
			
			$arr['category_title'] = $this->input->post('category_title');
			$arr['parent_id'] = $this->input->post('parent_id');
			$arr['category_slug'] = $this->Slug->url($arr['category_title']);
			$arr['category_description'] = $this->input->post('category_description');
			$arr['category_active'] = $this->input->post('category_active');
			$arr['category_display_order'] = $this->input->post('category_display_order');
			$arr['category_entered'] = date('Y-m-d H:i:s');
			
			if($category_id == false){
				$category_id = $this->Category->insert($arr);
				$this->Activity->msg($sess[0]->user_id, 'Add new category <a href="'.base_url().'admin/category/edit?category_id='.$category_id.'">'.$arr['category_title'].'</a>');
			}else{
				$this->Category->update($category_id, $arr);
				$this->Activity->msg($sess[0]->user_id, 'Update category <a href="'.base_url().'admin/category/edit?category_id='.$category_id.'">'.$arr['category_title'].'</a>');
			}
			
			if(is_file($_FILES['image']['tmp_name'])){
				
				if($this->input->post('upload_id')){
					$upload_id = $this->input->post('upload_id');
					$this->Upload->delete($upload_id);
				}
				
				$year_path = 'uploads/images/'.date('Y');
				$month_path = $year_path.'/'.date('m');
				$day_path = $month_path.'/'.date('d');
				
				list($str, $ext) = explode('/',$_FILES['image']['type']);

				if(is_dir($year_path) == false){mkdir($year_path,0777);}
				if(is_dir($month_path) == false){mkdir($month_path,0777);}
				if(is_dir($day_path) == false){mkdir($day_path,0777);}				
				
				$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;
				
				move_uploaded_file($_FILES['image']['tmp_name'], $filepath);

				unset($arr);
				
				$arr['type'] = 'image';
				$arr['filetype'] = $_FILES['image']['type'];
				$arr['filepath'] = $filepath;
				$arr['fileentered'] = date('Y-m-d H:i:s');
				$upload_id = $this->Upload->insert($arr);
				
				$this->Category->update($category_id, array('thumbnail'=>$upload_id));
				
			}			
			
			header('location: '.base_url().'admin/category/edit?category_id=' . $category_id . '&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$category_id = $this->input->post('category_id');
			$check_num = $this->Category->check_article($category_id);
						
			if($check_num == 0){
				$this->Category->delete($category_id);
				$this->Activity->msg($sess[0]->user_id, 'Delete category '.$this->input->post('category_title'));
								
				header('location: '.base_url().'admin/category/edit?delete=1' );
				exit;
			}else{

				header('location: '.base_url().'admin/category/edit?category_id=' . $category_id . '&delete=false' );
				exit;
			}
		}
		
		$category_id = $this->input->get('category_id');
		$category = $this->Category->get_id($category_id);
		
		$data['category_id'] = $category_id;
		$data['category'] = $category;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
	
		if($category_id && count($category) == false){
			$data['delete'] = 1;
		}
		
		$data['search_action'] = base_url().'admin/category';
	
		$this->load->view('admin/page.category.edit.php',$data);	
		
	}
	
	function edit_lang($lang)
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$category_id = $this->input->get('category_id');
		$category = $this->Category->get_id($category_id);
		$property = $this->Property->get();
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		
		if($this->input->post('action') == 'save'){
			
			$id = $this->input->post('id');
			$category_id = $this->input->post('category_id');
			
			$arr['category_id'] = $category_id;
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			$arr['entered'] = date('Y-m-d H:i:s');
			$arr['lang'] = $lang;
			
			if($id == false){
				$this->Category->insert_lang($arr);
			}else{
				$this->Category->update_lang($id, $arr);			
			}
			
			header('location: '.base_url().'admin/category/'.$lang.'/edit?category_id='.$category_id.'&save=1');
			exit;
		}
		
		if($this->input->post('action') == 'delete'){
			
			$id = $this->input->post('id');
			$this->Category->delete_lang($id);			
			
			header('location: '.base_url().'admin/category/'.$lang.'/edit?category_id='.$category_id.'&delete=1');
			exit;			
		}
		
		$rs = $this->Language->get_code($property[0]->lang);
		$default_language = $rs[0]->name;
		
		$data['category_id'] = $category_id;
		$data['category'] = $category;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['language'] = $this->Language->get_code($lang);
		$data['lang'] = $lang;
		$data['item'] = $this->Category->get_lang($lang, $category_id);
		$data['property'] = $property;
		$data['defaul_language'] = $default_language;
		$data['search_action'] = base_url().'admin/category';
		
		$this->load->view('admin/page.category.edit.lang.php',$data);	

	}
	
}