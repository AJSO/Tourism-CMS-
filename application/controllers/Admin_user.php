<?php

class Admin_user extends CI_Controller{

	var $module = 'user';

	function index(){
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$page = $this->input->get('page');
		if($page == 0){ $page = 1;}
		
		$data['property'] = $this->Property->get();
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		
		switch($this->input->get('field')){
			case"user_id";
				$field = $this->input->get('field');
			break;
			case"email";
				$field = $this->input->get('field');
			break;
			case"password";
				$field = $this->input->get('field');
			break;
			case"user_firstname";
				$field = $this->input->get('field');
			break;
			case"user_lastname";
				$field = $this->input->get('field');
			break;
			case"user_nickname";
				$field = $this->input->get('field');
			break;
			case"user_location";
				$field = $this->input->get('field');
			break;
			case"user_type";
				$field = $this->input->get('field');
			break;
			case"user_active";
				$field = $this->input->get('field');
			break;
			default:
				$field = '';
		}		
		
		
		if($this->input->get('sort') == 'DESC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$data['users'] = $this->User->get();
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['q'] = $this->input->get('q');
		$data['page'] = $page;
		
		$this->load->view('admin/page.user.php', $data);
		
	}
	
	function edit()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $this->Property->get();

		if($this->input->post('save')){
			
			
			if(is_file($_FILES['avatar']['tmp_name'])){
								
				list($name, $ext) = explode('/', $_FILES['avatar']['type']);
				
				$avatar_path = 'uploads/avatar/'.$sess[0]->user_id;
				if(is_dir($avatar_path) == false){
					mkdir($avatar_path,0777);
				}
				
				$avatar = $avatar_path.'/'.md5(time().'?'.rand(0,100)).'.'.$ext;
							
				move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
				$arr['user_avatar'] = $avatar;

			}
			
			$arr['email'] = $this->input->post('email');
			$arr['password'] = $this->input->post('password');
			$arr['user_firstname'] = $this->input->post('user_firstname');
			$arr['user_lastname'] = $this->input->post('user_lastname');
			$arr['user_nickname'] = $this->input->post('user_nickname');
			$arr['user_intro'] = $this->input->post('user_intro');
			$arr['user_phone'] = $this->input->post('user_phone');
			$arr['user_location'] = $this->input->post('user_location');
			$arr['user_phone'] = $this->input->post('user_phone');
			$arr['user_social'] = json_encode($this->input->post('socials'));
			$arr['user_active'] = $this->input->post('user_active');
			$arr['user_type'] = $this->input->post('user_type');
			$arr['user_entered'] = date('Y-m-d H:i:s');

			$user_id = $this->input->post('user_id');
			
			if($user_id == false){
				$user_id = $this->User->insert($arr);
				$this->Activity->msg($sess[0]->user_id, 'Add new user <a href="'.base_url().'admin/users/edit?user_id='.$user_id.'">'.$arr['email'].'</a>');
			}else{
				$this->User->update($user_id, $arr);
				$this->Activity->msg($sess[0]->user_id, 'Update user information <a href="'.base_url().'admin/users/edit?user_id='.$user_id.'">'.$arr['email'].'</a>');
			}
			
			header('location: '.base_url().'admin/users/edit?save=1&user_id='.$user_id);
			exit;
		}
		
		$data['profile'] = $this->User->get_id($this->input->get('user_id'));
		$data['save'] = $this->input->get('save');
		$data['socials'] = $this->Social->socials();

		$this->load->view('admin/page.user.edit.php', $data);
	
	}
	
}