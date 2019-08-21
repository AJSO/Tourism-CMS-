<?php

class Comment extends CI_Model{

	var $table = 'cms_article_comment';
	var $member = 'cms_member';

	function insert($arr)
	{
		$this->db->insert($this->table, $arr);
		return $this->db->insert_id();
	}
	
	function update($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $arr);
	}
	
	function get()
	{
		$q = $this->input->get('q');
		$q = addslashes($q);
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		
		$limit = 100;		
		$start = $page * $limit - $limit;
	
		$sql = "SELECT ";
		$sql .= "cms_article_comment.id, cms_article_comment.message, cms_article_comment.entered, ";
		$sql .= "cms_member.email ";
		$sql .= "FROM cms_article_comment, cms_member ";
		$sql .= "WHERE cms_article_comment.member_id = cms_member.member_id ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "cms_article_comment.id = '$q' OR ";
			$sql .= "cms_member.email = '$q' OR ";
			$sql .= "cms_article_comment.message LIKE '%$q%' ";
			$sql .= ")";
		}
		$sql .= "ORDER BY cms_article_comment.id DESC ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(cms_article_comment.id) AS num ";
		$sql .= "FROM cms_article_comment, cms_member ";
		$sql .= "WHERE cms_article_comment.member_id = cms_member.member_id ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "cms_article_comment.id = '$q' OR ";
			$sql .= "cms_member.email = '$q' OR ";
			$sql .= "cms_article_comment.message LIKE '%$q%' ";
			$sql .= ")";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/ $limit);
		
		return $data;
	}
	
	function get_id($id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_article_comment, cms_member ";
		$sql .= "WHERE cms_article_comment.member_id = cms_member.member_id ";
		$sql .= "AND cms_article_comment.id = '$id' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	
	function get_article_comment($article_id)
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		
		$limit = 10;
		$start = $page * $limit - $limit;
	
		$sql = "SELECT * ";
		$sql .= "FROM ".$this->table.", ".$this->member."  ";
		$sql .= "WHERE ".$this->table.".article_id = '$article_id' ";
		$sql .= "AND ".$this->table.".member_id = ".$this->member.".member_id ";
		$sql .= "ORDER BY  ".$this->table.".id DESC ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM ".$this->table." ";
		$sql .= "WHERE article_id = '$article_id' ";		
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
}