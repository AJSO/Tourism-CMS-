<?php

class Page extends CI_Model{
	
	function insert($arr)
	{
		$this->db->insert('cms_page', $arr);
		return $this->db->insert_id();
	}
	
	function update($page_id, $arr)
	{
		$this->db->where('page_id', $page_id);
		$this->db->update('cms_page', $arr);
	}
	
	function delete($page_id)
	{
		$this->db->where('page_id', $page_id);
		$this->db->delete('cms_page');
	}
	
	function get_id($page_id)
	{
		
		$this->db->where('page_id', $page_id);
		$query = $this->db->get('cms_page');
		
		return $query->result();
		
	}
	
	function get_slug($lang, $property, $slug)
	{

		if($lang == $property[0]->lang){
			
			$this->db->where('page_slug', $slug);
			$query = $this->db->get('cms_page');
			
		}else{
			
			$table = "cms_page_lang_".strtolower($lang);
			
			$sql = "SELECT ";
			$sql .= "title AS page_title, detail AS page_detail ";
			$sql .= "FROM cms_page, $table ";
			$sql .= "WHERE cms_page.page_id = $table.page_id ";
			$sql .= "AND cms_page.page_slug = '$slug' ";
			
			$query = $this->db->query($sql);
			
		}
		return $query->result();
		
	}
	
	function get()
	{
		
		$limit = 10;
		$page = $this->input->get('page');
		if($page == false){
			$page = 1;
		}
		$start = $page * $limit - $limit;
		$q = $this->input->get('q');
		$q = addslashes($q);
		$page_status = $this->input->get('page_status');
		
		switch($this->input->get('field'))
		{
			case'page_id';
				$field = $this->input->get('field');
			break;
			case'page_title';
				$field = $this->input->get('field');
			break;
			case'page_detail';
				$field = $this->input->get('field');
			break;
			case'page_status';
				$field = $this->input->get('field');
			break;
			case'page_date';
				$field = $this->input->get('field');
			break;
			case'page_updated';
				$field = $this->input->get('field');
			break;
			case'page_entered';
				$field = $this->input->get('field');
			break;
			case'page_display_order';
				$field = $this->input->get('field');
			break;			
			default:
				$field = 'page_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_page ";
		$sql .= "WHERE 1 ";
		$sql .= "AND ( page_title LIKE '%$q%' OR page_detail LIKE '%$q%' ) ";
		if($page_status == '0'){
			$sql .= "AND page_status = '0' ";
		}else if($page_status = '1'){
			$sql .= "AND page_status = '1' ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_page ";
		$sql .= "WHERE 1 ";
		$sql .= "AND ( page_title LIKE '%$q%' OR page_detail LIKE '%$q%' ) ";
		if($page_status){
			$sql .= "AND page_status = '$page_status' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
	function get_max_order()
	{
		
		$sql = "SELECT MAX(page_display_order) AS num ";
		$sql .= "FROM cms_page ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		return $rs[0]->num;
	}
	
	
	function insert_lang($lang, $arr)
	{
		
		$table = 'cms_page_lang_'.strtolower($lang);
		$this->db->insert($table, $arr);
		return $this->db->insert_id();
		
	}
	
	function update_lang($lang, $id, $arr)
	{
		
		$table = 'cms_page_lang_'.strtolower($lang);
		$this->db->where('id', $id);
		$this->db->update($table, $arr);
		
	}
	
	function delete_lang($lang, $id)
	{
		
		$table = 'cms_page_lang_'.strtolower($lang);
		$this->db->where('id', $id);
		$this->db->delete($table);
		
	}
	
	function get_lang($lang, $page_id)
	{
		$table = 'cms_page_lang_'.strtolower($lang);
		$this->db->where('page_id', $page_id);		
		$query = $this->db->get($table);
		return  $query->result();
	}
	
}