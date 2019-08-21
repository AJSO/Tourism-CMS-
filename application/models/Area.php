<?php

class Area extends CI_Model{

	function get($destination_id)
	{
		$this->db->order_by('area_id','asc');
		$this->db->where('destination_id',$destination_id);
		$query = $this->db->get('cms_destination_area');
		return $query->result();
	}
	
	function get_id($area_id)
	{
		$this->db->where('area_id',$area_id);
		$query = $this->db->get('cms_destination_area');
		return $query->result();
	}
	
	function insert($arr)
	{
		$this->db->insert('cms_destination_area', $arr);
		return $this->db->insert_id();
	}
	
	function update($area_id, $arr)
	{
		$this->db->where('area_id', $area_id);
		$this->db->update('cms_destination_area',$arr);
	}
	
	function delete($area_id)
	{
		$this->db->where('area_id', $area_id);
		$this->db->delete('cms_destination_area');	
	}

}