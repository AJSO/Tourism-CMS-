<?php

class Member extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_member', $arr);
		return $this->db->insert_id();
	}
	
	function get_id($member_id)
	{
		$this->db->where('member_id', $member_id);
		$query = $this->db->get('cms_member');
		return $query->result();
	}

	function update($member_id, $arr)
	{
		$this->db->where('member_id', $member_id);
		$this->db->update('cms_member', $arr);
	}
	
	function delete($member_id)
	{
		$this->db->where('member_id', $member_id);
		$this->db->delete('cms_member');
	}
	
	function get()
	{
		$page = $this->input->get('page');
		$q = $this->input->get('q');
		if($page == false){ $page = 1;}
		$limit = 10;
		$start = $page * $limit - $limit;
	
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
			case'member_status';
				$field = $this->input->get('field');
			break;
			case'member_updated';
				$field = $this->input->get('field');
			break;
			case'member_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'member_id';
		}
	
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
	
		$sql = "SELECT * ";
		$sql .= "FROM cms_member ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "firstname LIKE '%$q%' OR ";
			$sql .= "middlename LIKE '%$q%' OR ";
			$sql .= "lastname LIKE '%$q%' OR ";
			$sql .= "nickname LIKE '%$q%' OR ";
			$sql .= "email LIKE '%$q%' OR ";
			$sql .= "address LIKE '%$q%' OR ";
			$sql .= "city LIKE '%$q%' OR ";
			$sql .= "state LIKE '%$q%' OR ";
			$sql .= "zipcode LIKE '%$q%' OR ";
			$sql .= "country LIKE '%$q%' ";
			$sql .= ") ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_member ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "firstname LIKE '%$q%' OR ";
			$sql .= "middlename LIKE '%$q%' OR ";
			$sql .= "lastname LIKE '%$q%' OR ";
			$sql .= "nickname LIKE '%$q%' OR ";
			$sql .= "email LIKE '%$q%' OR ";
			$sql .= "address LIKE '%$q%' OR ";
			$sql .= "city LIKE '%$q%' OR ";
			$sql .= "state LIKE '%$q%' OR ";
			$sql .= "zipcode LIKE '%$q%' OR ";
			$sql .= "country LIKE '%$q%' ";
			$sql .= ") ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		return $data;
	}

	function check_member($email){
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_member ";
		$sql .= "WHERE email = '$email' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		if($rs[0]->num > 0){
			return false;
		}else{
			return true;
		}
	}
	
	function check_member_email_password($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('cms_member');
		return $query->result();
	}
	
	function check_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('cms_member');
		return $query->result();
	}
	
	function get_md5_email($code)
	{
		
		$sql = "SELECT * FROM cms_member WHERE MD5(email) = '$code' ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}

	function get_md5_email_id($email, $id)
	{
		$sql = "SELECT * FROM cms_member WHERE MD5(email) = '$email' AND MD5(member_id) = '$id' ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function get_last_login($member_id)
	{
		$table = 'session_website_'.date('Y');
		$sql = "SELECT * ";
		$sql .= "FROM $table ";
		$sql .= "WHERE member_id = '$member_id' ";
		$sql .= "ORDER BY id DESC LIMIT 0, 10 ";
		$query = $this->db->query($sql);
		return  $query->result();
	}
	
	function get_by_contact($name)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_member ";
		$sql .= "WHERE concat(firstname,lastname) = '$name' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function addview($member_id)
	{
		$sql = "UPDATE cms_member ";		
		$sql .= "SET ";
		$sql .= "profile_view = profile_view + 1 ";
		$sql .= "WHERE member_id = '$member_id' ";
		$this->db->query($sql);
	}
	
	function get_count_member()
	{
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_member ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num;
	}

}