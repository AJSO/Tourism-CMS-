<?php 

class Admin_media extends CI_Controller{

	var $module = 'media';

	function image()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		
		$mm = $this->input->get('mm');
		if($mm == false){ $mm = date('m');}
		
		$yy = $this->input->get('yy');
		if($yy == false){ $yy = date('Y');}
		
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		
		switch($this->input->get('field')){
			case'upload_id';
				$field = $this->input->get('field');
			break;
			case'type';
				$field = $this->input->get('field');
			break;
			case'filetype';
				$field = $this->input->get('field');
			break;
			case'filepath';
				$field = $this->input->get('field');
			break;
			case'filecaption';
				$field = $this->input->get('field');
			break;
			case'fileentered';
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
		$data['module'] = 'photo';				
		$data['mm'] = $mm;
		$data['yy'] = $yy;
		$data['field'] = $field;
		$data['page'] = $page;
		$data['items'] = $this->Media->get_by_month('image', $mm, $yy);
		$data['sort'] = $sort;
		$data['languages'] = $this->Language->get_active();
		$data['property'] = $this->Property->get();
		
		$this->load->view('admin/page.media.image.php',$data);
	
	}

	function video()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$languages = $this->Language->get_active();
		$property = $this->Property->get();

		
		$mm = $this->input->get('mm');
		if($mm == false){ $mm = date('m');}
		
		$yy = $this->input->get('yy');
		if($yy == false){ $yy = date('Y');}
		
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		
		switch($this->input->get('field')){
			case'upload_id';
				$field = $this->input->get('field');
			break;
			case'type';
				$field = $this->input->get('field');
			break;
			case'filetype';
				$field = $this->input->get('field');
			break;
			case'filepath';
				$field = $this->input->get('field');
			break;
			case'filecaption';
				$field = $this->input->get('field');
			break;			
			case'fileentered';
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
		$data['module'] = 'video';		
		$data['mm'] = $mm;
		$data['yy'] = $yy;
		$data['field'] = $field;
		$data['page'] = $page;
		$data['items'] = $this->Media->get_by_month('video', $mm, $yy);
		$data['sort'] = $sort;
		$data['languages'] = $languages;
		$data['property'] = $property;
		
		$this->load->view('admin/page.media.video.php',$data);
	
	}
	
	function edit()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$upload_id = $this->input->get('upload_id');
		$media = $this->Media->get_id($upload_id);
		$property = $this->Property->get();
		
		if($this->input->post('action') == 'save'){
			
			$upload_id = $this->input->post('upload_id');
			$arr['filecaption'] = $this->input->post('filecaption');
						
			if(is_file($_FILES['media']['tmp_name'])){

				$year_path = 'uploads/videos/'.date('Y');
				$month_path = $year_path.'/'.date('m');
				$day_path = $month_path.'/'.date('d');
				
				list($str, $ext) = explode('/',$_FILES['media']['type']);
				
				if(in_array($str, array('image','video'))){
					$arr['type'] = $str;
				}
				
				$filepath = $day_path.'/'.md5(time().rand(0,100)).'.'.$ext; 
				
				if(is_dir($year_path) == false){mkdir($year_path,0777);}
				if(is_dir($month_path) == false){mkdir($month_path,0777);}
				if(is_dir($day_path) == false){mkdir($day_path,0777);}
				
				$rs = $this->Media->get_id($upload_id);
				if(is_file($rs[0]->filepath)){
					unlink($rs[0]->filepath);
				}
				
				move_uploaded_file($_FILES['media']['tmp_name'], $filepath);
				
				$arr['filepath'] = $filepath;
				
			}
			
			$this->Upload->update($upload_id, $arr);

			header('location: '.base_url().'admin/media/edit?upload_id='.$upload_id.'&save=1');
			exit;
		}
		
		if($this->input->post('action') == 'delete'){
			
			$upload_id = $this->input->post('upload_id');			
			$this->Upload->delete($upload_id);
			
			header('location: '.base_url().'admin/media/edit?upload_id='.$upload_id.'&delete=1');
			exit;
			
		}

		$data['sess'] = $sess;
		$data['module'] = $this->module;		
		$data['upload_id'] = $upload_id;
		$data['property'] = $property;		
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['media']  = $media;
		$this->load->view('admin/page.media.edit.php',$data);

	}
	
	function edit_lang($lang)
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$upload_id = $this->input->get('upload_id');
		$media = $this->Media->get_id($upload_id);
		$property = $this->Property->get();
		$language = $this->Language->get_code($lang);
		
		if($this->input->post('action') == 'save'){
			
			$id = $this->input->post('id');

			$arr['upload_id'] = $this->input->post('upload_id');
			$arr['caption'] = $this->input->post('caption');
			$arr['lang'] = $lang;
						
			if($id == false){
				$id = $this->Media->insert_lang($lang, $arr);			
			}else{
				$this->Media->update_lang($lang, $id, $arr);
			}
			
			header('location: '.base_url().'admin/media/'.$lang.'/edit?upload_id='.$upload_id.'&save=1');
			exit;
		}
		
		if($this->input->post('action') == 'delete'){
			
			$id = $this->input->post('id');
			$this->Media->delete_lang($lang, $id);
			
			header('location: '.base_url().'admin/media/'.$lang.'/edit?upload_id='.$upload_id.'&delete=1');
			exit;		
		}

		$rs = $this->Language->get_code($property[0]->lang);
		$default_language = $rs[0]->name;		
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;		
		$data['upload_id'] = $upload_id;
		$data['property'] = $property;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['media']  = $media;
		$data['language'] = $language;
		$data['item'] = $this->Media->get_lang($lang, $upload_id);
		$data['default_language'] = $default_language;
		
		if(empty($media[0]) || empty($language)){ 
			$this->load->view('admin/error.404.php', $data);	
		}else{
			$this->load->view('admin/page.media.edit.lang.php', $data);	
		}
		
	}
			
}