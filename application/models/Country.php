<?php
class Country extends CI_Model{

	function get()
	{
		$query = $this->db->get('cms_country');
		return $query->result();
	}
	
	function get_code($code)
	{
	
		$this->db->where('code', $code);
		$query = $this->db->get('cms_country');
		return $query->result();
	}
}