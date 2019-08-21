<?php

class Newsletter extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_newsletter', $arr);
	}
	
	function update($newsletter_id, $arr)
	{
		$this->db->where('newsletter_id', $newsletter_id);
		$this->db->update('cms_newsletter', $arr);
	}

	function export()
	{
		$query = $this->db->get('cms_newsletter');
		return $query->result();
	}

	function get()
	{
		
		$q = $this->input->get('q');
		$limit = 100;
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'newsletter_id';
				$field = $this->input->get('field');
			break;
			case'email';
				$field = $this->input->get('field');
			break;
			case'unsubscribe';
				$field = $this->input->get('field');
			break;
			case'newsletter_updated';
				$field = $this->input->get('field');
			break;
			case'newsletter_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'newsletter_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_newsletter ";	
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND email LIKE '%$q%' ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_newsletter ";	
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND email LIKE '%$q%' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
	function check_email($email)
	{
		$email = trim($email);
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_newsletter ";
		$sql .= "WHERE email = '$email' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		if($rs[0]->num == 0){
			return true;
		}else{
			return false;
		}
	}
	
	function get_count_newsletter()
	{
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_newsletter ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num; 
	}
	
}