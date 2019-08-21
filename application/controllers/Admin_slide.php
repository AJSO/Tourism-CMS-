<?php

class Admin_slide extends CI_Controller{

	var $module = 'slide';
	
	function index()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = $this->input->get('q');
		
		switch($this->input->get('field')){
			case'slide_id';
				$field = $this->input->get('field');
			break;
			case'upload_id';
				$field = $this->input->get('field');
			break;
			case'slide_title';
				$field = $this->input->get('field');
			break;
			case'slide_description';
				$field = $this->input->get('field');
			break;
			case'slide_message';
				$field = $this->input->get('field');
			break;
			case'slide_label';
				$field = $this->input->get('field');
			break;
			case'url';
				$field = $this->input->get('field');
			break;
			case'slide_updated';
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
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['slide'] = $this->Slide->get();
		$data['page'] = $page;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['q'] = $q;
		$data['languages'] = $this->Language->get_active();
		
		$this->load->view('admin/page.slide.php', $data);	
	
	}
	
	function edit()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$slide_id = $this->input->post('slide_id');
			
			$arr['slide_title'] = $this->input->post('slide_title');
			$arr['slide_description'] = $this->input->post('slide_description');
			$arr['slide_message'] = $this->input->post('slide_message');
			$arr['slide_label'] = $this->input->post('slide_label');
			$arr['url'] = $this->input->post('url');
			
			if($slide_id == false){
				$arr['slide_entered'] = date('Y-m-d H:i:s');
				$slide_id = $this->Slide->insert($arr);
			}else{
				$this->Slide->update($slide_id, $arr);
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
				
				$this->Slide->insert_file(array('slide_id'=>$slide_id,'upload_id'=>$upload_id));
				
			}
			
			header('location:'.base_url().'admin/slide/edit?save=1&slide_id='. $slide_id);
			exit;
		}
		
		if($this->input->post('delete')){

			$slide_id = $this->input->post('slide_id');
			$this->Slide->delete($slide_id);
			
			header('location:'.base_url().'admin/slide/edit?delete=1');
			exit;
		}
		
		$slide_id = $this->input->get('slide_id');
		$slide = $this->Slide->get_id($slide_id);
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['slide'] = $slide;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['search_action'] = base_url().'admin/slide';		
		
		$this->load->view('admin/page.slide.edit.php', $data);	
	
	}
	
	function edit_lang($lang)
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$slide_id = $this->input->get('slide_id');
		
		if($this->input->post('save')){

			$id = $this->input->post('id');
			$arr['slide_id'] = $this->input->post('slide_id');
			$arr['lang'] = $this->input->post('lang');
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			$arr['message'] = $this->input->post('message');
			$arr['label'] = $this->input->post('label');

			if($id == false){
				$id = $this->Slide->insert_lang($arr);
			}else{
				$this->Slide->update_lang($id, $arr);			
			}
			
			header('location: '.base_url().'admin/slide/'.$lang.'/edit?save=1&slide_id='.$slide_id);
			exit;
		}
		
		if($this->input->post('delete')){
			
			$id = $this->input->post('id');
			$this->Slide->delete_lang($id);
			
			header('location: '.base_url().'admin/slide/'.$lang.'/edit?delete=1&slide_id='.$slide_id);
			exit;			
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['slide'] = $this->Slide->get_id($slide_id);
		$data['language'] = $this->Language->get_code($lang);
		$data['item'] = $this->Slide->get_lang_id($lang, $slide_id);
		$data['lang'] = $lang;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['search_action'] = base_url().'admin/slide';
		
		$this->load->view('admin/page.slide.edit.lang.php', $data);	
	
	}

}