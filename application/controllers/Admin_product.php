<?php

class Admin_product extends CI_Controller
{
	
	var $module = 'product';	

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$page = $this->input->get('page');
		if($page){ $page = 1;}
		
		switch($this->input->get('field')){
			case'product_id';
				$field = $this->input->get('field');
			break;
			case'product_code';
				$field = $this->input->get('field');
			break;
			case'product_name';
				$field = $this->input->get('field');
			break;
			case'product_description';
				$field = $this->input->get('field');
			break;
			case'product_overview';
				$field = $this->input->get('field');
			break;
			case'product_specifications';
				$field = $this->input->get('field');
			break;
			case'product_weight';
				$field = $this->input->get('field');
			break;
			case'product_minorder';
				$field = $this->input->get('field');
			break;
			case'product_price';
				$field = $this->input->get('field');
			break;
			case'product_price_cross';
				$field = $this->input->get('field');
			break;
			case'product_currency';
				$field = $this->input->get('field');
			break;
			case'product_status';
				$field = $this->input->get('field');
			break;
			case'product_updated';
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
		
		$product_status = $this->input->get('product_status');
		$q = $this->input->get('q');
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['product'] = $this->Product->get();
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['product_status'] = $product_status;
		$data['q'] = $q;
		$data['page'] = $page;
		$data['languages'] = $this->Language->get_active();		
		$data['category_id'] = $this->input->get('category_id');
		$data['page'] = $page;
		
		$this->load->view('admin/page.product.php', $data);	
	
	}
	
	function addnew()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$arr['product_name'] = $this->input->post('product_name');
			$arr['category_id'] = $this->input->post('category_id');
			$arr['destination_id'] = $this->input->post('destination_id');
			$arr['product_description'] = $this->input->post('product_description');
			$arr['product_cutof'] = $this->input->post('product_cutof');
			$arr['product_currency'] = $this->input->post('product_currency');	
			$arr['product_entered'] = date('Y-m-d H:i:s');
			$arr['term_id'] = $this->input->post('term_id');
			$arr['product_period'] = $this->input->post('product_period');

			$product_id = $this->Product->insert($arr);

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
				$product_code = $rs[0]->destination_code.date('y').sprintf('%05d',$product_id);
				
				$this->Product->update($product_id, array('product_code'=>$product_code,'thumbnail'=>$upload_id));
			}
			
			header('location: '.base_url().'admin/product/edit?save=1&product_id='.$product_id);
			exit;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['delete'] = $this->input->get('delete');
		$data['destination'] = $this->Destination->get_list();
		$data['currency'] = $this->Currency->get_active();
		$data['term'] = $this->Term->get_all();
		
		$this->load->view('admin/page.product.new.php', $data);	
		
	}	
	
	function edit()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$product_id = $this->input->get('product_id');
		
		if($this->input->post('save')){
			
			$product_id = $this->input->post('product_id');
			
			$arr['category_id'] = $this->input->post('category_id');
			$arr['product_code'] = $this->input->post('product_code');
			$arr['destination_id'] = $this->input->post('destination_id');
			$arr['product_rating'] = $this->input->post('product_rating');
			$arr['product_name'] = $this->input->post('product_name');
			$arr['product_description'] = $this->input->post('product_description');
			$arr['product_overview'] = $this->input->post('product_overview');
			$arr['product_specifications'] = $this->input->post('product_specifications');
			$arr['product_currency'] = $this->input->post('product_currency');
			$arr['product_status'] = $this->input->post('product_status');
			$arr['product_inclusion'] = $this->input->post('product_inclusion');
			$arr['product_cutof'] = $this->input->post('product_cutof');
			$arr['term_id'] = $this->input->post('term_id');
			$arr['product_period'] = $this->input->post('product_period');
			
			$this->Product->update($product_id, $arr);
			
			header('location:'.base_url().'admin/product/edit?product_id='. $product_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			
			$product_id = $this->input->post('product_id');
			$rs = $this->Product->get_id($product_id);
			
			if(isset($rs[0]->thumbnail)){
				$this->Upload->delete($rs[0]->thumbnail);
			}
			$this->Product->delete($product_id);
			
			header('location: '.base_url().'admin/product/new');
			exit;
		}
		
		if($this->input->post('updatethumb')){
			
			$product_id = $this->input->post('product_id');
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
			
			$this->Product->update($product_id, array('thumbnail'=>$upload_id));
			
			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);						
			exit;
		}
		
		if($this->input->post('uploadgallery')){

			$product_id = $this->input->post('product_id');
			
			$year_path = 'uploads/images/'.date('Y');
			$month_path = $year_path.'/'.date('m');
			$day_path = $month_path.'/'.date('d');
			
			if(is_dir($year_path) == false){mkdir($year_path,0777);}
			if(is_dir($month_path) == false){mkdir($month_path,0777);}
			if(is_dir($day_path) == false){mkdir($day_path,0777);}
			
			if(is_file($_FILES['images']['tmp_name'][0])){
				$i = 0;				
				foreach($_FILES['images']['tmp_name'] as $index=>$value){

					list($str, $ext) = explode('/',$_FILES['images']['type'][$index]);
					$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;
					
					$arr['session_id'] = $session_id;
					$arr['type'] = 'image';
					$arr['filetype'] = $_FILES['images']['type'][$index];
					$arr['filepath'] = $filepath;
					$arr['filedisplayorder'] = $i;
					$arr['fileentered'] = date('Y-m-d H:i:s');
					
					move_uploaded_file($_FILES['images']['tmp_name'][$index], $filepath);				
					
					$upload_id = $this->Upload->insert($arr);
					
					$arr2 = array('product_id'=>$product_id, 'upload_id'=>$upload_id);					
					$this->Product->gallery_insert($arr2);
					$i++;
				}
			}
		}
		
		if($this->input->get('deletegallery')){
			$upload_id =$this->input->get('deletegallery');
			$this->Upload->delete($upload_id);
		}
		
		if($this->input->post('uploaddocument')){

			$product_id = $this->input->post('product_id');

			$year_path = 'uploads/files/'.date('Y');
			$month_path = $year_path.'/'.date('m');
			$day_path = $month_path.'/'.date('d');
			
			if(is_dir($year_path) == false){mkdir($year_path,0777);}
			if(is_dir($month_path) == false){mkdir($month_path,0777);}
			if(is_dir($day_path) == false){mkdir($day_path,0777);}
			
			if(is_file($_FILES['document']['tmp_name'][0])){
				
				foreach($_FILES['document']['tmp_name'] as $index=>$value){
					
					list($str, $ext) = explode('/',$_FILES['document']['type'][$index]);
					$filepath = $day_path.'/'.$_FILES['document']['name'][$index];

					move_uploaded_file($_FILES['document']['tmp_name'][$index], $filepath);
					
					$arr['product_id'] = $product_id;
					$arr['filename'] = $_FILES['document']['name'][$index];
					$arr['filepath'] = $filepath;
					$arr['type'] = $_FILES['document']['type'][$index];
					$arr['size'] = $_FILES['document']['size'][$index];
					
					$this->Document->insert($arr);
					
				}
			}

			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;
			
		}
		
		if($this->input->get('deletedocument')){

			$product_id = $this->input->get('product_id');
			$deletedocument = $this->input->get('deletedocument');
			
			$this->Document->delete($deletedocument);
			
			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;
			
		}
		
		if($this->input->post('downloadfile')){
			$product_id = $this->input->post('product_id');

			$year_path = 'uploads/files/'.date('Y');
			$month_path = $year_path.'/'.date('m');
			$day_path = $month_path.'/'.date('d');
			
			if(is_dir($year_path) == false){mkdir($year_path,0777);}
			if(is_dir($month_path) == false){mkdir($month_path,0777);}
			if(is_dir($day_path) == false){mkdir($day_path,0777);}
			
			if(is_file($_FILES['download']['tmp_name'][0])){
				
				foreach($_FILES['download']['tmp_name'] as $index=>$value){
					
					list($str, $ext) = explode('/',$_FILES['download']['type'][$index]);
					$filepath = $day_path.'/'.$_FILES['download']['name'][$index];

					move_uploaded_file($_FILES['download']['tmp_name'][$index], $filepath);
					
					$arr['product_id'] = $product_id;
					$arr['filename'] = $_FILES['download']['name'][$index];
					$arr['filepath'] = $filepath;
					$arr['type'] = $_FILES['download']['type'][$index];
					$arr['size'] = $_FILES['download']['size'][$index];
					
					$this->Download->insert($arr);
					
				}
			}

			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;
			
		}
		
		if($this->input->get('deletedownload')){

			$product_id = $this->input->get('product_id');
			$deletedownload = $this->input->get('deletedownload');
			
			$this->Download->delete($deletedownload);
			
			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;
			
		}
		
		if($this->input->post('save_item')){
			
			$product_id = $this->input->post('product_id');
			
			$arr['product_id'] = $product_id;
			$arr['item_name'] = $this->input->post('item_name');
			
			$this->Product->insert_item($arr);
			
			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;
		}
		
		if($this->input->get('delete_item')){
			$item_id = $this->input->get('item_id');
			$product_id = $this->input->get('product_id');
			
			$this->Product->delete_item($item_id);
			
			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;			
		}

		if($this->input->post('save_rate')){
			
			$rate_adult = $this->input->post('rate_adult');
			$rate_child = $this->input->post('rate_child');
			$product_id = $this->input->post('product_id');
			$currency = $this->input->post('currency');
			
			$this->Rate->delete_by_product($product_id);
			
			foreach($rate_adult as $item_id=>$value){
				$arr['product_id'] = $product_id;
				$arr['item_id'] = $item_id;
				$arr['currency'] = $currency;
				
				foreach($value as $period_id=>$vv){
					
					$arr['period_id'] = $period_id;
					$arr['adult'] = $vv;
					$arr['child'] = $rate_child[$item_id][$period_id];
					$arr['entered'] = date('Y-m-d H:i:s');
										
					$this->Rate->insert($arr);					
				}
			}
			
			header('location:'.base_url().'admin/product/edit?product_id='.$product_id);
			exit;			
		}

		
		$product = $this->Product->get_id($product_id);
		
		if(empty($product[0]->product_id)){
			header('location:'.base_url().'admin/product');
			exit;
		}
		
		$gallery = $this->Product->gallery_get($product_id);
		$document = $this->Document->get($product_id);
		$download = $this->Download->get($product_id);
		$items = $this->Product->get_item($product_id);		
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['product'] = $product;
		$data['currency'] = $this->Currency->get_active();
		$data['delete'] = $this->input->get('delete');
		$data['save'] = $this->input->get('save');
		$data['gallery'] = $gallery;
		$data['document'] = $document;
		$data['download'] = $download;
		$data['search_action'] = base_url().'admin/product';
		$data['destination'] = $this->Destination->get_list();
		$data['items'] = $items;
		$data['period'] = $this->Period->get($product[0]->destination_id);
		$data['rate'] = $this->Rate->get_rate($product[0]->product_id);
		$data['term'] = $this->Term->get_all();
		
		$this->load->view('admin/page.product.edit.php', $data);	
			
	}
	
	function edit_lang($lang)
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$product_id = $this->input->get('product_id');
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			$product_id = $this->input->post('product_id');

			$arr['description'] = $this->input->post('description');
			$arr['overview'] = $this->input->post('overview');
			$arr['specifications'] = $this->input->post('specifications');
			
			if($id == false){
				$arr['product_id'] = $product_id;
				$id = $this->Product->insert_lang($lang, $arr);
			}else{
				$this->Product->update_lang($lang, $id, $arr);
			}
			
			header('location: '.base_url().'admin/product/'.$lang.'/edit?product_id='.$product_id.'&save=1');
			exit;
			
		}
		
		if($this->input->post('delete')){
			$id = $this->input->post('id');
			$this->Product->delete_lang($lang, $id);
			header('location: '.base_url().'admin/product/'.$lang.'/edit?product_id='.$product_id.'&delete=1');
			exit;		
		}
				
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['save'] = $this->input->get('save');
		$data['delete'] = $this->input->get('delete');
		$data['lang'] = $lang;
		$data['product'] = $this->Product->get_id($product_id);
		$data['item'] = $this->Product->get_lang($lang, $product_id);
		$data['search_action'] = base_url().'admin/product';
		
		$this->load->view('admin/page.product.edit.lang.php', $data);	

	}

}