<?php

class Admin_post extends CI_Controller{
	
	var $module = 'posts';	
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$article_status = $this->input->get('article_status');
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['content'] = $this->Content->get();
		$data['languages'] = $this->Language->get_active();
		$data['property'] = $this->Property->get();
		$data['category_id'] = $this->input->get('category_id');
		$data['q'] = $this->input->get('q');
		$data['article_status'] = $article_status;
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'DESC';
		}else{
			$sort = 'ASC';
		}
		
		switch($this->input->get('field'))
		{
			case"article_id";
				$field = $this->input->get('field');
			break;
			case"category_id";
				$field = $this->input->get('field');
			break;
			case"parent_id";
				$field = $this->input->get('field');
			break;
			case"article_slug";
				$field = $this->input->get('field');
			break;
			case"article_title";
				$field = $this->input->get('field');
			break;
			case"article_meta";
				$field = $this->input->get('field');
			break;
			case"article_description";
				$field = $this->input->get('field');
			break;
			case"article_detail";
				$field = $this->input->get('field');
			break;
			case"article_date";
				$field = $this->input->get('field');
			break;
			case"article_view";
				$field = $this->input->get('field');
			break;
			case"article_comment";
				$field = $this->input->get('field');
			break;
			case"article_share";
				$field = $this->input->get('field');
			break;
			case"article_type";
				$field = $this->input->get('field');
			break;
			case"article_status";
				$field = $this->input->get('field');
			break;
			case"article_date";
				$field = $this->input->get('field');
			break;
			case"article_updated";
				$field = $this->input->get('field');
			break;
			default: 
				$field = '';
		}
		
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['field'] = $field;
		$data['lang'] = json_decode($sess[0]->languages);

		$this->load->view('admin/page.post.php',$data);	
	}	
	
	function addnew()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		
		if($this->input->post('save')){

			$category_id = $this->input->post('category_id');
			$category = $this->Category->get_id($category_id);			
			
			$article_id = $this->input->post('article_id');
			$arr['category_id'] = $category_id;
			
			$arr['guid'] = $this->Slug->guid($category[0]->category_id);
			
			$arr['article_title'] = $this->input->post('article_title');
			$arr['article_slug'] = addslashes($this->Slug->url($arr['article_title']));
			$arr['article_description'] = addslashes($this->input->post('article_description'));
			$arr['article_detail'] = addslashes($this->input->post('article_detail'));
			$arr['parent_id'] = $this->input->post('parent_id');
			$thedate = $this->input->post('thedate');
			$thedate = strtotime($thedate);
			$arr['article_date'] = date('Y-m-d H:i:s', $thedate);
			$arr['user_id'] = $sess[0]->user_id;
			if($this->input->post('article_allow_subcontent')){
				$arr['article_allow_subcontent'] = 1;
			}else{
				$arr['article_allow_subcontent'] = 0;
			}
			$arr['article_entered'] = date('Y-m-d H:i:s');
			$article_id = $this->Content->insert($arr);
			
			$this->Activity->msg($sess[0]->user_id, 'Add new article <a href="'.base_url().'admin/post/edit?article_id='.$article_id.'">'.$arr['article_title'].'</a>');
			
			if(is_file($_FILES['image']['tmp_name'])){
			
				$year_path = 'uploads/images/'.date('Y');
				$month_path = $year_path.'/'.date('m');
				$day_path = $month_path.'/'.date('d');
				
				if(is_dir($year_path) == false){mkdir($year_path,0777);}
				if(is_dir($month_path) == false){mkdir($month_path,0777);}
				if(is_dir($day_path) == false){mkdir($day_path,0777);}

				list($str, $ext) = explode('/',$_FILES['image']['type']);
				$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;
				
				unset($arr);
				
				$arr['type'] = 'image';
				$arr['filetype'] = $_FILES['image']['type'];
				$arr['filepath'] = $filepath;
				$arr['filedisplayorder'] = 0;
				$arr['fileentered'] = date('Y-m-d H:i:s');
				
				move_uploaded_file($_FILES['image']['tmp_name'], $filepath);				
				
				$upload_id = $this->Upload->insert($arr);
				$this->Content->update($article_id, array('thumbnail'=>$upload_id));
				
			}
			
					
			header("location: ".base_url().'admin/post/edit?article_id=' . $article_id. '&save=1');
			exit;
		}
		
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['allow_sub_content'] = $this->Content->get_allow_sub_content();
		
		$this->load->view('admin/page.post.new.php', $data);	
	
	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['article_id'] = $this->input->get('article_id');
		$data['property'] = $this->Property->get();
		
		if($this->input->post('save')){

			$category_id = $this->input->post('category_id');
			$category = $this->Category->get_id($category_id);			
			
			$article_id = $this->input->post('article_id');
			$arr['category_id'] = $category_id;
			
			$arr['guid'] = $this->Slug->guid($category[0]->category_id);
			
			$arr['article_title'] = $this->input->post('article_title');
			$arr['article_slug'] = addslashes($this->Slug->url($arr['article_title']));
			$arr['article_description'] = addslashes($this->input->post('article_description'));
			$arr['article_detail'] = addslashes($this->input->post('article_detail'));
			$arr['article_status'] = $this->input->post('article_status');
			$arr['parent_id'] = $this->input->post('parent_id');
			$thedate = $this->input->post('thedate');
			
			if($arr['article_status'] == 1){
				
				$thedate = strtotime($thedate);
				$arr['article_date'] = date('Y-m-d H:i:s', $thedate);

			}
			
			if($this->input->post('parent_id')){
				$arr['parent_id'] = $this->input->post('parent_id');
			}

			if($this->input->post('article_allow_subcontent')){
				$arr['article_allow_subcontent'] = 1;
			}else{
				$arr['article_allow_subcontent'] = 0;
			}
			
			if($this->input->post('featured')){
				$this->Featured->insert($article_id);
				$arr['featured'] = 1;
			}else{
				$this->Featured->delete($article_id);
				$arr['featured'] = 0;	
			}
			
			if($this->input->post('article_display_gallery')){
				$arr['article_display_gallery'] = 1;
			}else{
				$arr['article_display_gallery'] = 0;
			}
						
			if($article_id == false){
				$arr['shortcode'] = $this->Slug->shortcode();
				$arr['article_entered']	= date('Y-m-d H:i:s');
				$arr['user_id'] = $sess[0]->user_id;
				$article_id = $this->Content->insert($arr);
				$this->Activity->msg($sess[0]->user_id, 'Add new article <a href="'.base_url().'admin/post/edit?article_id='.$article_id.'">'.$arr['article_title'].'</a>');

			}else{
				$this->Content->update($article_id, $arr);
				$this->Activity->msg($sess[0]->user_id, 'Update article <a href="'.base_url().'admin/post/edit?article_id='.$article_id.'">'.$arr['article_title'].'</a>');
			}
			
			$query = $this->db->get_where('cms_upload',array('session_id'=>$session_id));
			$rs = $query->result();
			
			foreach($rs as $index=>$value){
				$arr_insert['upload_id'] = $value->upload_id;
				$arr_insert['type'] = $value->type;
				$arr_insert['article_id'] = $article_id;
				$arr_insert['slug'] = $arr['article_slug'].'-'.$value->upload_id;
				$this->db->insert('cms_article_upload', $arr_insert);
				
				$this->Media->remove_session($value->upload_id);				
			}
						
			header("location: ".base_url().'admin/post/edit?article_id=' . $article_id. '&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$article_id = $this->input->post('article_id');
			$this->Content->delete($article_id);
			$this->Activity->msg($sess[0]->user_id, 'Delete article '.$arr['article_title']);

			header("location: ".base_url().'admin/post/edit?delete=1');
			exit;
		}

		
		if($this->input->post('upload')){
			
			if(is_file($_FILES['image']['tmp_name'])){
				
				$upload_id = $this->input->post('upload_id');
				$article_id = $this->input->post('article_id');
				
				$this->Upload->delete($upload_id);
				
				$year_path = 'uploads/images/'.date('Y');
				$month_path = $year_path.'/'.date('m');
				$day_path = $month_path.'/'.date('d');
				
				if(is_dir($year_path) == false){mkdir($year_path,0777);}
				if(is_dir($month_path) == false){mkdir($month_path,0777);}
				if(is_dir($day_path) == false){mkdir($day_path,0777);}

				list($str, $ext) = explode('/',$_FILES['image']['type']);
				$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;
								
				$arr['type'] = 'image';
				$arr['filetype'] = $_FILES['image']['type'];
				$arr['filepath'] = $filepath;
				$arr['filedisplayorder'] = 0;
				$arr['fileentered'] = date('Y-m-d H:i:s');
				
				move_uploaded_file($_FILES['image']['tmp_name'], $filepath);				
				
				$upload_id = $this->Upload->insert($arr);
				$this->Content->update($article_id, array('thumbnail'=>$upload_id));
				
			}

			header("location: ".base_url().'admin/post/edit?article_id=' . $article_id. '&savethumbnail=1');
			exit;
		}
		

		$article_id = $this->input->get('article_id');
		$content = $this->Content->get_id($article_id);
		
		$data['allow_sub_content'] = $this->Content->get_allow_sub_content();
		$data['content'] = $content;
		$data['video'] = $this->Media->get_type('video', $article_id);
		$data['images'] = $this->Media->get_type('image', $article_id);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['savethumbnail'] = $this->input->get('savethumbnail');
		$data['search_action'] = base_url().'admin/post';
		
		if($article_id && count($content) == false){
			$data['delete'] = 1;
		}
		
		$this->load->view('admin/page.post.edit.php',$data);
		
	}
	
	function edit_lang($lang)
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$article_id = $this->input->get('article_id');
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
	
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['article_id'] = $this->input->post('article_id');
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			$arr['detail'] = $this->input->post('detail');
			$arr['lang'] = $lang;
			$arr['status'] = $this->input->post('status');
			$arr['slug'] = $this->Slug->url($arr['title']);
			
			$thedate = $this->input->post('thedate');			
			$thedate = strtotime($thedate);
			$arr['datepublish'] = date('Y-m-d H:i:s', $thedate);
			
			if($id == false){
				$arr['entered'] = date('Y-m-d H:i:s');
				$this->Content->insert_lang($lang, $arr);
				$this->Activity->msg($sess[0]->user_id, 'Add new translation article <a href="'.base_url().'admin/post/'.$lang.'/edit?article_id='.$article_id.'">'.$arr['title'].'</a>');

			}else{
				$this->Content->update_lang($lang, $id, $arr);
				$this->Activity->msg($sess[0]->user_id, 'Update translation article <a href="'.base_url().'admin/post/'.$lang.'/edit?article_id='.$article_id.'">'.$arr['title'].'</a>');
			}
						
			header('location: '.base_url().'admin/post/'.$lang.'/edit?article_id='.$article_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$id = $this->input->post('id');
			$this->Content->delete_lang($lang, $id);
			header('location: '.base_url().'admin/post/'.$lang.'/edit?article_id='.$article_id.'&delete=1');
			exit;
		}
	
		$data['article_id'] = $article_id;
		$data['property'] = $this->Property->get();
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['content'] = $this->Content->get_id($article_id);
		$data['images'] = $this->Media->get_type('image', $article_id);
		$data['video'] = $this->Media->get_type('video', $article_id);
		$data['language'] = $this->Language->get_code($lang);
		$data['item'] = $this->Content->get_lang_id($lang, $article_id);
		$data['lang'] = $lang;
	
		$this->load->view('admin/page.post.edit.lang.php',$data);
		
	
	}
	
}