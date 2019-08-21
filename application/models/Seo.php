<?php
class Seo extends CI_Model{
	
	function insert($arr)
	{
		
		$this->db->insert('cms_seo', $arr);
		return $this->db->insert_id();
		
	}
	
	function update($id, $arr)
	{
	
		$this->db->where('id', $id);
		$this->db->update('cms_seo', $arr);
	
	}
	
	function get()
	{
		$query = $this->db->get('cms_seo');
		return $query->result();
	}
	
	function get_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('cms_seo');
		return $query->result();
	}
	
	function get_lang($lang)
	{
		
		$this->db->where('lang', $lang);
		$query = $this->db->get('cms_seo');
		return $query->result();
		
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_seo');
	}
	
}