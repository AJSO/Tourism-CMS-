<?php

class Contact extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_contact', $arr);
		return $this->db->insert_id();
	}
	
	function update($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_contact', $arr);
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_contact');
	}
	
	function get()
	{
		$q = $this->input->get('q');
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		$limit = 20;
		$start = $page * $limit - $limit;
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_contact ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "contactname LIKE '%$q%' OR ";
			$sql .= "email LIKE '%$q%' OR ";
			$sql .= "title LIKE '%$q%' OR ";
			$sql .= "comments LIKE '%$q%' ";
			$sql .= ")";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_contact ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
		
	}

	function get_count()
	{
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_contact ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num;	
	}
}