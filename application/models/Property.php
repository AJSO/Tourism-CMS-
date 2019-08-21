<?php

class Property extends CI_Model{

	function get()
	{
		$query = $this->db->get('cms_property');
		return $query->result();
	}
	
	function update($property_id, $arr)
	{
		$this->db->where('property_id', $property_id);
		$this->db->update('cms_property', $arr);
	}
}