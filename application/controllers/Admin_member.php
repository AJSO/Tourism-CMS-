<?php

class Admin_member extends CI_Controller{

	var $module = 'members';

	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$member_id = $this->input->get('member_id');
		$member = $this->Member->get();
		$page = $this->input->get('page');
		
		if($page == false){ $page = 1;}
		$q = $this->input->get('q');
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'DESC';
		}else{
			$sort = 'ASC';
		}
		
		switch($this->input->get('field')){
			case'member_id';
				$field = $this->input->get('field');
			break;
			case'firstname';
				$field = $this->input->get('field');
			break;
			case'middlename';
				$field = $this->input->get('field');
			break;
			case'lastname';
				$field = $this->input->get('field');
			break;
			case'nickname';
				$field = $this->input->get('field');
			break;
			case'email';
				$field = $this->input->get('field');
			break;
			case'password';
				$field = $this->input->get('field');
			break;
			case'avatar';
				$field = $this->input->get('field');
			break;
			case'address';
				$field = $this->input->get('field');
			break;
			case'city';
				$field = $this->input->get('field');
			break;
			case'state';
				$field = $this->input->get('field');
			break;
			case'zipcode';
				$field = $this->input->get('field');
			break;
			case'country';
				$field = $this->input->get('field');
			break;
			case'member_status';
				$field = $this->input->get('field');
			break;
			case'member_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = '';
		}
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $this->Property->get();
		$data['member_id'] = $member_id;
		$data['member'] = $member;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['field'] = $field;
		$data['q'] = $q;

		$this->load->view('admin/page.member.php', $data);
	
	}
	
	function edit()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$member_id = $this->input->get('member_id');
		$country = $this->Country->get();
		$socials = $this->Social->socials();
		
		if($this->input->post('save')){
			
			$member_id = $this->input->post('member_id');

			$arr['title'] = $this->input->post('title');
			$arr['firstname'] = $this->input->post('firstname');
			$arr['middlename'] = $this->input->post('middlename');
			$arr['lastname'] = $this->input->post('lastname');
			$arr['nickname'] = $this->input->post('nickname');
			$arr['email'] = $this->input->post('email');
			$arr['password'] = $this->input->post('password');
			$arr['address'] = $this->input->post('address');
			$arr['city'] = $this->input->post('city');
			$arr['state'] = $this->input->post('state');
			$arr['zipcode'] = $this->input->post('zipcode');
			$arr['state'] = $this->input->post('state');
			$arr['country'] = $this->input->post('country');
			$arr['member_status'] = $this->input->post('member_status');
			$arr['social'] = json_encode($this->input->post('social'));
			
			if(is_file($_FILES['avatar']['tmp_name'])){
				
				list($str, $ext) = explode('/', $_FILES['avatar']['type']);
				
				$path = 'uploads/avatar/members/'.sprintf('%05d', $member_id);
				$pathfile = $path.'/avatar.'.$ext;
				
				if(is_dir($path) == false){
					@mkdir($path);
				}
				
				move_uploaded_file($_FILES['avatar']['tmp_name'], $pathfile);
				
				$arr['avatar'] = $pathfile;
			}
			
			if($member_id == false){
				$this->Member->insert($arr);
			}else{
				$this->Member->update($member_id, $arr);
			}
			
			header('location: '.base_url().'admin/member/edit?done=1&member_id='. $member_id );
			exit;
		}
		
		$member = $this->Member->get_id($member_id);		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $this->Property->get();
		$data['member_id'] = $member_id;
		$data['member'] = $member;
		$data['country'] = $country;
		$data['done'] = $this->input->get('done');
		$data['socials'] = $socials;
		$data['search_action'] = base_url().'admin/member';

		$this->load->view('admin/page.member.edit.php', $data);
	
	}
	

}