<?php

class User extends CI_Model{

	function get_md5_email($email)
	{
	
		$sql = "SELECT * FROM cms_user WHERE MD5(email) = '$email' ";
		$query = $this->db->query($sql);
		return $query->result();
	
	}
	
	function get()
	{
		$limit = 10;
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		$start = $page * $limit - $limit;
		$q = $this->input->get('q');
		
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
		
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_user ";
		$sql .= "WHERE 1 ";
		$sql .= "AND email LIKE '%$q%' ";
		if($field){
			$sql .= "ORDER BY $field $sort ";
		}else{
			$sql .= "ORDER BY email ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_user ";
		$sql .= "WHERE 1 ";
		$sql .= "AND email LIKE '%$q%' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		
		return $data;
	}
	
	function get_id($user_id)
	{
		
		$sql = "SELECT * FROM cms_user WHERE user_id = '$user_id' ";
		$query = $this->db->query($sql);
		return $query->result();
	
	}
	
	function insert($arr)
	{
		$this->db->insert('cms_user', $arr);
		return $this->db->insert_id();
	}
	
	function update($user_id, $arr)
	{
	
		$this->db->where('user_id', $user_id);
		$this->db->update('cms_user', $arr);
		
	}
	
	function request_password($email){
		
		$query = $this->db->get_where('cms_user', array('email'=>$email));
		return $query->result();
	}


}