<?php

class Admin_widget extends CI_Controller{

	var $module = 'widget';
	
	function widget_title($type)
	{
		switch($type){
			case'slide';
				$widget_title = 'Slides';
			break;
			case'populartours';
				$widget_title = 'Popular Tours';
			break;
			case'brands';
				$widget_title = 'Brands';
			break;
			case'services';
				$widget_title = 'Services';
			break;
			case'videos';
				$widget_title = 'Videos';
			break;
			case'mission';
				$widget_title = 'Mission';
			break;
			case'ourteam';
				$widget_title = 'Our Team';
			break;
			case'gallery';
				$widget_title = 'Galleries';
			break;
			case'about';
				$widget_title = 'About';
			break;
			case'contact';
				$widget_title = 'Contact';
			break;
			case'counter';
				$widget_title = 'Counter';
			break;
			default:
				$widget_title = '';
		}
		return $widget_title;
	}
	
	function index($type)
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$q = $this->input->get('q');
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		
		switch($this->input->get('field')){
			case'widget_id';
				$field = $this->input->get('field');
			break;
			case'widget_title';
				$field = $this->input->get('field');
			break;
			case'meta';
				$field = $this->input->get('field');
			break;
			case'widget_description';
				$field = $this->input->get('field');
			break;
			case'link';
				$field = $this->input->get('field');
			break;
			case'icon';
				$field = $this->input->get('field');
			break;
			case'thumbnail';
				$field = $this->input->get('field');
			break;			
			case'button';
				$field = $this->input->get('field');
			break;
			case'displayorder';
				$field = $this->input->get('field');
			break;
			case'widget_updated';
				$field = $this->input->get('field');
			break;
			case'widget_entered';
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
		$data['widget'] = $this->Widget->get_type($type);
		$data['q'] = $q;
		$data['languages'] = $this->Language->get_active();		
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['type'] = $type;
		$data['widget_title'] = $this->widget_title($type);
		
		$this->load->view('admin/page.widget.php', $data);	
	}
	
	function edit($type)
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$widget_id = $this->input->get('widget_id');
		
		if($this->input->post('save')){
			
			$widget_id = $this->input->post('widget_id');
			$arr['type'] = $type;
			if($this->input->post('icon')){
				$arr['icon'] = $this->input->post('icon');
			}
			if($this->input->post('link')){
				$arr['link'] = $this->input->post('link');
			}

			$arr['widget_title'] = $this->input->post('widget_title');
			$arr['widget_description'] = $this->input->post('widget_description'); 
			$arr['displayorder'] = $this->input->post('displayorder'); 
			
			if($widget_id == false){
				$arr['widget_entered'] = date('Y-m-d H:i:s');
				$widget_id = $this->Widget->insert($arr);
			}else{
				$this->Widget->update($widget_id, $arr);
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
				
				$this->Widget->update($widget_id, array('thumbnail'=>$upload_id));
				
			}			
			
			header('location: '.base_url().'admin/widget/'.$type.'/edit?widget_id='.$widget_id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete')){
			
			$widget_id = $this->input->post('widget_id');
			$this->Widget->delete($widget_id);
			
			header('location: '.base_url().'admin/widget/'.$type.'/edit?delete=1');
			exit;
		}
		
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['widget'] = $this->Widget->get_id($widget_id);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['search_action'] = base_url().'admin/widget';
		$data['type'] = $type;
		$data['widget_title'] = $this->widget_title($type);
		
		$this->load->view('admin/page.widget.edit.php', $data);	
	}
	
	function edit_lang($type,$lang)
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$widget_id = $this->input->get('widget_id');
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			$arr['widget_id'] = $this->input->post('widget_id');
			$arr['lang'] = $this->input->post('lang');
			
			if($id == false){
				$widget_id = $this->Widget->insert_lang($arr);
			}else{
				$this->Widget->update_lang($id, $arr);
			}
			
			header('location:'.base_url().'admin/widget/'.$type.'/'.$lang.'/edit?widget_id='.$widget_id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete')){
			$id = $this->input->post('id');
			$this->Widget->delete_lang($id);
			
			header('location:'.base_url().'admin/widget/'.$type.'/'.$lang.'/edit?widget_id='.$widget_id.'&delete=1');
			exit;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['lang'] = $lang;
		$data['widget'] = $this->Widget->get_id($widget_id);		
		$data['item'] = $this->Widget->get_lang_id($widget_id, $lang);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['search_action'] = base_url().'admin/widget';
		$data['widget_title'] = $this->widget_title($type);
		$data['type'] = $type;
				
		$this->load->view('admin/page.widget.edit.lang.php', $data);	
	}
	
}