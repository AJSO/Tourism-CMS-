<?php

class Api extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_api', $arr);
		return $this->db->insert_id();
	}
	
	function update($api_id, $arr)
	{
		$this->db->where('api_id', $api_id);
		$this->db->update('cms_api', $arr);
	}
	
	function delete($api_id)
	{
		$this->db->where('api_id', $api_id);
		$this->db->delete('cms_api');
	}
	
	function get_id($api_id)
	{
		$this->db->where('api_id', $api_id);
		$query = $this->db->get('cms_api');
		return $query->result();
		
	}
	
	function get()
	{
	
		$q = $this->input->get('q');
		
		switch($this->input->get('field')){
			case'api_id';
				$field = $this->input->get('field');
			break;
			case'apikey';
				$field = $this->input->get('field');
			break;
			case'updated';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'api_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_api ";
		$sql .= "WHERE 1 ";
		$sql .= "AND name LIKE '%$q%' ";
		$sql .= "ORDER BY $field $sort ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_api($name)
	{
		$this->db->where('name', $name);
		$query = $this->db->get('cms_api');
		return $query->result();
	}

}