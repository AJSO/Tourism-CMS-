<?php

class Period extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_destination_period', $arr);
		return $this->db->insert_id();
	}
	
	function delete($period_id)
	{
		$this->db->where('period_id', $period_id);
		$this->db->delete('cms_destination_period');
	}
	
	function get_id($period_id){
		$this->db->where('period_id', $period_id);
		$query = $this->db->get('cms_destination_period');
		return $query->result();
	}
	
	function get($destination_id)
	{
		$this->db->where('destination_id', $destination_id);
		$query = $this->db->get('cms_destination_period');
		return $query->result();
	}
}