<?php

class Admin_profile extends CI_Controller{
	
	var $module = 'profile';

	function index()
	{
	
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $this->Property->get();
		
		if($this->input->post('save')){
			
			if(is_file($_FILES['avatar']['tmp_name'])){
								
				list($name, $ext) = explode('/', $_FILES['avatar']['type']);
				
				$avatar_path = 'uploads/avatar/users/'.sprintf('%05d',$sess[0]->user_id);
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
			$arr['user_type'] = $this->input->post('user_type');
			$arr['user_entered'] = date('Y-m-d H:i:s');		
			$this->User->update($sess[0]->user_id, $arr);
			
			$this->Activity->msg($sess[0]->user_id, 'Update profile');
			
			header('location: '.base_url().'admin/profile?save=1');
			exit;
		}
		
		$data['profile'] = $this->User->get_id($sess[0]->user_id);
		$data['socials'] = $this->Social->socials();
		$data['save'] = $this->input->get('save');

		$this->load->view('admin/page.profile.php', $data);
	}
	
	function activity()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $this->Property->get();

		$year = $this->input->get('year');
		if($year == false){
			$year = date('Y');
		}
		
		$page = $this->input->get('page');
		if($page == 0){ $page = 1;}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'DESC';
		}else{
			$sort = 'ASC';
		}
		
		$data['year'] = $year;
		$data['activity'] = $this->Activity->get_by_user($sess[0]->user_id);
		$data['page'] = $page;
		$data['sort'] = $sort;
		$data['field'] = $this->input->get('field');
		$this->load->view('admin/page.profile.activity.php', $data);
	
	}
	
}