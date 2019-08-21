<?php

class Admin_tour extends CI_Controller{
	
	var $module = 'tour';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$page = $this->input->get('page');
		if($page){ $page = 1;}
		
		switch($this->input->get('field')){
			case'tour_id';
				$field = $this->input->get('field');
			break;
			case'tour_code';
				$field = $this->input->get('field');
			break;
			case'tour_name';
				$field = $this->input->get('field');
			break;
			case'tour_description';
				$field = $this->input->get('field');
			break;
			case'tour_overview';
				$field = $this->input->get('field');
			break;
			case'tour_specifications';
				$field = $this->input->get('field');
			break;
			case'tour_weight';
				$field = $this->input->get('field');
			break;
			case'tour_minorder';
				$field = $this->input->get('field');
			break;
			case'tour_price';
				$field = $this->input->get('field');
			break;
			case'tour_price_cross';
				$field = $this->input->get('field');
			break;
			case'tour_currency';
				$field = $this->input->get('field');
			break;
			case'tour_status';
				$field = $this->input->get('field');
			break;
			case'tour_updated';
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
		
		$tour_status = $this->input->get('tour_status');
		$q = $this->input->get('q');
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['tour'] = $this->Tour->get();
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['tour_status'] = $tour_status;
		$data['q'] = $q;
		$data['page'] = $page;
		$data['languages'] = $this->Language->get_active();		
		$data['page'] = $page;
		$data['category'] = $this->input->get('category');
		
		$this->load->view('admin/page.tour.php', $data);	
		
	}
	
	function add()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$arr['tour_name'] = $this->input->post('tour_name');
			$arr['type'] = $this->input->post('type');
			$arr['destination_id'] = $this->input->post('destination_id');
			$arr['tour_rating'] = $this->input->post('tour_rating');
			$arr['tour_description'] = $this->input->post('tour_description');
			$arr['tour_cutof'] = $this->input->post('tour_cutof');
			$arr['tour_currency'] = $this->input->post('tour_currency');	
			$arr['tour_entered'] = date('Y-m-d H:i:s');
			$arr['term_id'] = $this->input->post('term_id');
			$arr['tour_period'] = $this->input->post('tour_period');

			$tour_id = $this->Tour->insert($arr);

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
				
				$rs = $this->Destination->get_id($this->input->post('destination_id'));
				$tour_code = $rs[0]->destination_code.date('y').sprintf('%05d',$tour_id);
				$arr_2['tour_code'] = $tour_code;
				$arr_2['thumbnail'] = $upload_id;
				$arr_2['tour_slug'] = $this->Slug->url($this->input->post('tour_name').'-'.$rs[0]->destination_name.'-'.sprintf('%05d',$tour_id));
				$this->Tour->update($tour_id, $arr_2);
			}
			
			header('location: '.base_url().'admin/tour/edit?save=1&tour_id='.$tour_id);
			exit;
		}
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $property;
		$data['term'] = $this->Term->get_all();
		$data['type'] = $this->Tour->get_type();
		$data['destination'] = $this->Destination->get_list();
		$data['currency'] = $this->Currency->get_active();
		
		$this->load->view('admin/page.tour.new.php',$data);
	
	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$tour_id = $this->input->get('tour_id');

		if($this->input->post('save')){
			
			$tour_id = $this->input->post('tour_id');
			
			$arr['type'] = $this->input->post('type');
			$arr['category'] = $this->input->post('category');
			$arr['tour_code'] = $this->input->post('tour_code');
			$arr['destination_id'] = $this->input->post('destination_id');
			$arr['tour_rating'] = $this->input->post('tour_rating');
			$arr['tour_name'] = $this->input->post('tour_name');
			$arr['tour_description'] = $this->input->post('tour_description');
			$arr['tour_overview'] = $this->input->post('tour_overview');
			$arr['tour_specifications'] = $this->input->post('tour_specifications');
			$arr['tour_currency'] = $this->input->post('tour_currency');
			$arr['tour_status'] = $this->input->post('tour_status');
			$arr['tour_inclusion'] = $this->input->post('tour_inclusion');
			$arr['tour_cutof'] = $this->input->post('tour_cutof');
			$arr['term_id'] = $this->input->post('term_id');
			$arr['tour_period'] = $this->input->post('tour_period');
			$arr['tour_price'] = $this->input->post('tour_price');
			$arr['tour_price_cross'] = $this->input->post('tour_price_cross');
			$arr['tour_price_child'] = $this->input->post('tour_price_child');
			
			$this->Tour->update($tour_id, $arr);
			
			header('location:'.base_url().'admin/tour/edit?tour_id='. $tour_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$tour_id = $this->input->post('tour_id');
			$rs = $this->tour->get_id($tour_id);
			
			if(isset($rs[0]->thumbnail)){
				$this->Upload->delete($rs[0]->thumbnail);
			}
			$this->Tour->delete($tour_id);
			
			header('location: '.base_url().'admin/tour/new');
			exit;
		}
		
		if($this->input->post('updatethumb')){
			
			$tour_id = $this->input->post('tour_id');
			$upload_id =$this->input->post('thumbnail');
			$this->Upload->delete($upload_id);
			
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
			
			$this->Tour->update($tour_id, array('thumbnail'=>$upload_id));
			
			header('location:'.base_url().'admin/tour/edit?tour_id='.$tour_id);						
			exit;
		}

		if($this->input->post('save_rate')){
			
			$adult = $this->input->post('adult');
			$child = $this->input->post('child');
			$tour_id = $this->input->post('tour_id');
			$currency = $this->input->post('currency');
			$rate_id_arr = $this->input->post('rate_id_arr');
			$period_id = $this->input->post('period_id');

			foreach($rate_id_arr as $index=>$value){
				
				$rate_id = $value;
				
				$arr['tour_id'] = $tour_id;
				$arr['period_id'] = $period_id[$index];
				$arr['adult'] = $adult[$index];
				$arr['child'] = $child[$index];
				
				if($rate_id == false){
					$this->Tour->insert_rate($arr);
				}else{
					$this->Tour->update_rate($rate_id, $arr);
				}				
			}
						
			header('location:'.base_url().'admin/tour/edit?tour_id='.$tour_id.'&save=1');
			exit;			
		}
		
		$tour = $this->Tour->get_id($tour_id);

		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $property;
		$data['term'] = $this->Term->get_all();
		$data['type'] = $this->Tour->get_type();
		$data['destination'] = $this->Destination->get_list();
		$data['currency'] = $this->Currency->get_active();
		$data['tour'] = $tour;
		$data['type'] = $this->Tour->get_type();
		$data['period'] = $this->Period->get($tour[0]->destination_id);
		$data['rate'] = $this->Tour->get_rate($tour_id);
		$data['save'] = $this->input->get('save');

		$this->load->view('admin/page.tour.edit.php',$data);
	}	
}