<?php

class Admin_seo extends CI_Controller{
	
	var $module = 'seo';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get();
		
		$this->load->view('admin/page.seo.php', $data);	
	
	}
	
	function edit()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		if($this->input->post('save')){
			
			$id = $this->input->post('id');
			
			$arr['title'] = $this->input->post('title');
			$arr['description'] = $this->input->post('description');
			$arr['keywords'] = $this->input->post('keywords');
			$arr['lang'] = $this->input->post('lang');
			
			if($id == false){
				$arr['entered'] = date('Y-m-d H:i:s');
				$id = $this->Seo->insert($arr);
				header('location:'.base_url().'admin/seo/edit?save=1&id='.$id);
				exit;
			}else{
				$this->Seo->update($id, $arr);
				header('location:'.base_url().'admin/seo/edit?save=1&id='.$id);
				exit;
			}
		}
		
		$id = $this->input->get('id');
		
		$data['languages'] = $this->Language->get_all();
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['seo'] = $this->Seo->get_id($id);
		$data['save'] = $this->input->get('save');
		
		$this->load->view('admin/page.seo.edit.php', $data);	
		
	}
	
}