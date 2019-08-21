<?php

class Admin_destination extends CI_Controller{
	
	var $module = 'destinations';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination = $this->Destination->get();
		
		switch($this->input->get('field'))
		{
			case'destination_id';
				$field = $this->input->get('field');
			break;
			case'destination_code';
				$field = $this->input->get('field');
			break;
			case'destination_name';
				$field = $this->input->get('field');
			break;
			case'destination_country';
				$field = $this->input->get('field');
			break;
			case'destination_geolocation';
				$field = $this->input->get('field');
			break;
			case'destination_geolocation_zoom';
				$field = $this->input->get('field');
			break;
			case'destination_overview';
				$field = $this->input->get('field');
			break;
			case'destination_guide';
				$field = $this->input->get('field');
			break;
			case'destination_status';
				$field = $this->input->get('field');
			break;
			case'destination_updated';
				$field = $this->input->get('field');
			break;			
			case'destination_updated';
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
		if($page == false){ $page = 1;}
				
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['destination'] = $destination;
		$data['sort'] = $sort;
		$data['field'] = $field;
		$data['languages'] = $this->Language->get_active();
		$data['destination_status'] = $this->input->get('destination_status');
		$data['q'] = $this->input->get('q');
		$data['page'] = $page;
		
		$this->load->view('admin/page.destination.php', $data);		
	}
	
	function addnew()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$arr['destination_slug'] = $this->input->post('destination_slug');
			$arr['destination_code'] = $this->input->post('destination_code');
			$arr['destination_name'] = $this->input->post('destination_name');
			$arr['destination_description'] = $this->input->post('destination_description');
			$arr['destination_country'] = $this->input->post('destination_country');
			
			$destination_id = $this->Destination->insert($arr);
			
			if($_FILES['image']['tmp_name']){
				
				unset($arr);
				
				$year_path = 'uploads/images/'.date('Y');
				$month_path = $year_path.'/'.date('m');
				$day_path = $month_path.'/'.date('d');
				
				if(is_dir($year_path) == false){mkdir($year_path,0777);}
				if(is_dir($month_path) == false){mkdir($month_path,0777);}
				if(is_dir($day_path) == false){mkdir($day_path,0777);}

				list($str, $ext) = explode('/',$_FILES['image']['type']);
				$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;			
				
				move_uploaded_file($_FILES['image']['tmp_name'], $filepath);	
				
				$arr['fileentered'] = date('Y-m-d H:i:s');
				$arr['filetype'] = $_FILES['image']['type'];
				$arr['filepath'] = $filepath;
				$arr['type'] = 'image';
				$upload_id = $this->Upload->insert($arr);
				
				unset($arr);
				
				$this->Destination->update($destination_id, array('thumbnail'=>$upload_id));
			}
		
			header('location:'.base_url().'admin/destination/edit?destination_id='.$destination_id);
			exit;	
			
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['country'] = $this->Country->get();
		
		$this->load->view('admin/page.destination.addnew.php', $data);			
	
	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$destination_id = $this->input->get('destination_id');
		
		if($this->input->post('save')){
			
			$destination_id = $this->input->post('destination_id');

			$arr['destination_slug'] = $this->input->post('destination_slug');
			$arr['destination_code'] = $this->input->post('destination_code');
			$arr['destination_name'] = $this->input->post('destination_name');
			$arr['destination_country'] = $this->input->post('destination_country');
			$arr['destination_geolocation'] = $this->input->post('destination_geolocation');
			$arr['destination_geolocation_zoom'] = $this->input->post('destination_geolocation_zoom');
			$arr['destination_description'] = $this->input->post('destination_description');
			$arr['destination_overview'] = $this->input->post('destination_overview');
			$arr['destination_guide'] = $this->input->post('destination_guide');
			$arr['destination_status'] = $this->input->post('destination_status');
			
			if($destination_id == false){				
				$arr['destination_entered'] = date('Y-m-d H:i:s');				
				$destination_id = $this->Destination->insert($arr);
			}else{
				$this->Destination->update($destination_id, $arr);			
			}
			header('location:'.base_url().'admin/destination/edit?destination_id='.$destination_id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete')){
			$destination_id = $this->input->post('destination_id');
			$this->Destination->delete($destination_id);
			
			header('location:'.base_url().'admin/destination');
			exit;
		}

		if($this->input->post('upload')){
			
			$destination_id = $this->input->post('destination_id');

			if($_FILES['image']['tmp_name']){
				
				unset($arr);
				
				$year_path = 'uploads/images/'.date('Y');
				$month_path = $year_path.'/'.date('m');
				$day_path = $month_path.'/'.date('d');
				
				if(is_dir($year_path) == false){mkdir($year_path,0777);}
				if(is_dir($month_path) == false){mkdir($month_path,0777);}
				if(is_dir($day_path) == false){mkdir($day_path,0777);}

				list($str, $ext) = explode('/',$_FILES['image']['type']);
				$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;			
				
				move_uploaded_file($_FILES['image']['tmp_name'], $filepath);	
				
				$arr['fileentered'] = date('Y-m-d H:i:s');
				$arr['filetype'] = $_FILES['image']['type'];
				$arr['filepath'] = $filepath;
				$arr['type'] = 'image';
				$upload_id = $this->Upload->insert($arr);
				
				unset($arr);
				
				$this->Destination->update($destination_id, array('thumbnail'=>$upload_id));
			}
		}
		
		if($this->input->post('save_period')){			
			
			$destination_id = $this->input->post('destination_id');
			$period_id = $this->input->post('period_id');
			
			$arr['destination_id'] = $destination_id;
			$arr['period_name'] = $this->input->post('period_name');
 			$arr['dd1'] = $this->input->post('dd1');
			$arr['mm1'] = $this->input->post('mm1');
			$arr['dd2'] = $this->input->post('dd2');
			$arr['mm2'] = $this->input->post('mm2');
			
			if($period_id == false){
				$this->Period->insert($arr);
			}else{
				$this->Period->update($period_id,$arr);			
			}
			
			header('location:'.base_url().'admin/destination/edit?destination_id='.$destination_id.'&save=1');
			exit;
		}
		
		if($this->input->post('delete_period')){
		
			$period_id = $this->input->post('period_id');
			$destination_id = $this->input->post('destination_id');
			$this->Period->delete($period_id);
			
			header('location:'.base_url().'admin/destination/edit?destination_id='.$destination_id.'&save=1');			
			exit;
		}
		
		$period_id = $this->input->get('period_id');
		$area_id = $this->input->get('area_id');
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['country'] = $this->Country->get();
		$data['destination'] = $this->Destination->get_id($destination_id);
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['save_period'] = $this->input->get('save_period');
		$data['periods'] = $this->Period->get($destination_id);
		$data['period'] = $this->Period->get_id($period_id);
		$data['area'] = $this->Area->get_id($area_id);
		$data['areas'] = $this->Area->get($destination_id);
 			
		$this->load->view('admin/page.destination.edit.php', $data);			
	}
	
}