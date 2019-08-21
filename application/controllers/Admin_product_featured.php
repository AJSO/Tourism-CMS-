<?php

class Admin_product_featured extends CI_Controller{
	
	var $module = 'product featured';
	
	function type_title($type){
		
		switch($type){
			case'specialoffer';
				$type_title = 'Special Offers';
			break;
			case'newarrivals';
				$type_title = 'New Arrivals';
			break;
			case'toprated';
				$type_title = 'Top Rated';
			break;
			case'onsale';
				$type_title = 'On Sale';
			break;
			case'promotion';
				$type_title = 'Promotions';
			break;
			case'ourtopdeals';
				$type_title = 'Our Top Deals';
			break;
		}
		return $type_title;	
	}
	
	function index($type){
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$q = $this->input->get('q');
		
		switch($this->input->get('field')){
			case'id';
				$field = $this->input->get('field');
			break;
			case'product_id';
				$field = $this->input->get('field');
			break;
			case'meta';
				$field = $this->input->get('field');
			break;
			case'entered';
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
		$data['featured'] = $this->Product->get_featured($type);
		$data['type'] = $type;
		$data['q'] = $q;
		$data['type_title'] = $this->type_title($type);
		$data['field'] = $field;
		$data['sort'] = $sort;
		
		$this->load->view('admin/page.product.featured.php', $data);		
	}
	
	function edit($type)
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$id = $this->input->get('id');
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			if($this->input->post('meta')){
				$arr['meta'] = json_encode($this->input->post('meta'));
			}
			
			if($id == false){
				$arr['product_id'] = $this->input->post('product_id');
				$arr['type'] = $type;
				$id = $this->Product->insert_featured($arr);
			}else{
				$arr['product_id'] = $this->input->post('product_id');
				$arr['type'] = $type;
				$this->Product->update_featured($id, $arr);
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
				
			}
			
			
			header('location:'.base_url().'admin/product/featured/'.$type.'/edit?id=' . $id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete')){
			
			$id = $this->input->post('id');
			$this->Product->delete_featured($id);
			
			header('location:'.base_url().'admin/product/featured/'.$type.'/edit?delete=1');
			exit;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['featured'] = $this->Product->get_featured_id($id);
		$data['type'] = $type;
		$data['type_title'] = $this->type_title($type);		
		$data['product'] = $this->Product->get_active_list();
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		
		$this->load->view('admin/page.product.featured.edit.php', $data);		
	
	}

}