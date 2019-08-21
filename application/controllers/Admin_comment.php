<?php 

class Admin_comment extends CI_Controller{

	var $module = 'comment';

	function index()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$comment = $this->Comment->get();
		$q = $this->input->get('q');
		
		switch($this->input->get('field')){
			case'id';
				$field = $this->input->get('field');
			break;
			case'member_id';
				$field = $this->input->get('field');
			break;
			case'message';
				$field = $this->input->get('field');
			break;
			case'entered';
				$field = $this->input->get('field');
			break;
			case'email';
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
		$data['comment'] = $comment;
		$data['field'] = $field;
		$data['sort'] = $sort;
		$data['page'] = $page;
		$data['q'] = $q;
		
		$this->load->view('admin/page.comment.php', $data);	

	
	}
	
	function info()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		$id = $this->input->get('id');
		$comment = $this->Comment->get_id($id);
		
		if($this->input->post('action') == 'delete'){
			
			$id = $this->input->post('id');
			$this->Comment->delete($id);
			
			header('location:' .base_url().'admin/comment?delete=1');
			exit;
		}
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['comment'] = $comment;
		
		$this->load->view('admin/page.comment.info.php', $data);	

	}

}