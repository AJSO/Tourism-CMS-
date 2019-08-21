<?php

class Featured extends CI_Model{
	
	function insert($arr)
	{
		$this->db->insert('cms_featured', $arr);
	}
	
	function delete($destination_id)
	{
		$this->db->where('destination_id', $destination_id);
		$this->db->delete('cms_featured');
	}
	
	function get($destination_id)
	{
		
		$arr = array();
		
		$this->db->where('destination_id', $destination_id);
		$query = $this->db->get('cms_featured');	
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			$arr[] = $value->tour_id;
		}
		
		return $arr;
	}
	
	function get_all()
	{
		$sql = "SELECT *, ";
		$sql .= "cms_tour.thumbnail AS thumbnail ";
		$sql .= "FROM cms_featured, cms_tour, cms_destination ";
		$sql .= "WHERE cms_featured.tour_id = cms_tour.tour_id ";
		$sql .= "AND cms_featured.destination_id = cms_destination.destination_id ";
		$query = $this->db->query($sql);	
		$rs = $query->result();
	
		foreach($rs as $index=>$value){
			$arr['destination'][$value->destination_id] = $value;
			$arr['tours'][$value->destination_id][] = $value;
		}
		
		return $arr;	
	}

}