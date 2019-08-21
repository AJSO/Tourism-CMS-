<?php

class Admin_login extends CI_Controller{

	function index(){
		
		$data = array();
		$data['login'] = $this->input->get('login');
	
		if($this->input->post('save')){
		
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$rs = $this->Session->admin_check($username, $password);
		
			if($rs){
				
				$arr['session_id'] = $this->Session->getcode();
				
				if($this->input->post('remember')){
					setcookie('session_id', $arr['session_id'],time()+1400000);
				}
				
				$arr['user_id'] = $rs[0]->user_id;
				$arr['ipaddress'] = $_SERVER['REMOTE_ADDR'];
				$arr['entered'] = date('Y-m-d H:i:s');
				
 				$this->Session->admin_insert($arr);
				
				$this->Activity->msg($rs[0]->user_id, 'Login to system');

				header('location: '.base_url().'admin');
				exit;
			}else{
				
				$this->Activity->msg(0, '$username Login false');
				
				header('location: '.base_url().'admin/login?login=false');
				exit;
			}
		
		}

		$this->load->view('admin/login.php', $data);
		
	}
		
	function forgot()
	{
		$data = array();
		$property = $this->Property->get();

		if($this->input->post('save')){
			
			$username = $this->input->post('username');
			$rs = $this->User->request_password($username);
			
			if($rs){
				
				$recovery_url = base_url().'admin/recovery/'.md5($rs[0]->email);
				
				$subject = 'Recovery your password';
				
				$message = '<p>Click on url below to recovery your password</p>';
				$message .= '<p><a href="'.$recovery_url.'">'.$recovery_url.'</a></p>';
				
				$this->Sendmail->send($rs[0]->email, 'admin', $subject, $message);
				
				header('location: '.base_url().'admin/forgot?save=true');
				exit;
				
			}else{
				header('location: '.base_url().'admin/forgot?error=true');
				exit;
			}
		}
		
		$data['error'] = $this->input->get('error');
		$data['save'] = $this->input->get('save');
		
		$this->load->view('admin/login.forgot.php', $data);
	
	}
	
	function recovery($email)
	{
				
		$data = array();
		$data['user'] = $this->User->get_md5_email($email);
		
		if($this->input->post('save')){			
			$this->User->update_password($password);
			header('location:'.base_url().'admin/recovery/'.$email.'?save=1');
			exit;
		}
		
		if($data['user']){
			$data['save'] = $this->input->get('save');
			$this->load->view('admin/login.recovery.php', $data);			
		}else{
			$this->load->view('admin/error.404.php', $data);			
		}
	}

	function logout()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		
		$this->Session->admin_logout($session_id);
		$this->Activity->msg($sess[0]->user_id, 'Logout');
		
		setcookie('session_id', '',0);		
		
		header('location: '.base_url().'admin/login');
		exit;
	}
}
