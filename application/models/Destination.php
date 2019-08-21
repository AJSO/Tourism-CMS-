<?php

class Destination extends CI_Model{
	
	function insert($arr)
	{
		$this->db->insert('cms_destination', $arr);
		return $this->db->insert_id();
	}
	
	function update($destination_id, $arr)
	{
		$this->db->where('destination_id', $destination_id);
		$this->db->update('cms_destination', $arr);
	}
	
	function delete($destination_id)
	{
		$this->db->where('destination_id', $destination_id);
		$this->db->delete('cms_destination');
	}
	
	function get()
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$limit = 10;
		$start = $page * $limit - $limit;	
		$q = $this->input->get('q');
		$destination_status = $this->input->get('destination_status');

		switch($this->input->get('field'))
		{
			case'destination_id';
				$field = $this->input->get('field');
			break;
			case'destination_name';
				$field = $this->input->get('field');
			break;
			case'destination_country';
				$field = $this->input->get('field');
			break;
			case'destination_code';
				$field = $this->input->get('field');
			break;
			case'destination_geolocation';
				$field = $this->input->get('field');
			break;
			case'destination_geolocation_zoom';
				$field = $this->input->get('field');
			break;
			case'destination_overview';
				$field = $this->input->get('field');
			break;
			case'destination_guide';
				$field = $this->input->get('field');
			break;
			case'destination_status';
				$field = $this->input->get('field');
			break;
			case'destination_updated';
				$field = $this->input->get('field');
			break;			
			case'destination_updated';
				$field = $this->input->get('field');
			break;		
			default:
				$field = 'destination_id';	
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_destination ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND (";
			$sql .= "destination_name LIKE '%$q%' OR ";
			$sql .= "destination_overview LIKE '%$q%' OR ";
			$sql .= "destination_guide LIKE '%$q%' ";
			$sql .= ")";
		}
		if($destination_status == '1'){
			$sql .= "AND destination_status = '1' ";
		}else if($destination_status == '0'){
			$sql .= "AND destination_status = '0' ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_destination ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND (";
			$sql .= "destination_name LIKE '%$q%' OR ";
			$sql .= "destination_overview LIKE '%$q%' OR ";
			$sql .= "destination_guide LIKE '%$q%' ";
			$sql .= ")";
		}
		if($destination_status == '1'){
			$sql .= "AND destination_status = '1' ";
		}else if($destination_status == '0'){
			$sql .= "AND destination_status = '0' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		return $data;
	}
	
	function get_id($destination_id)
	{
		$this->db->where('destination_id', $destination_id);
		$query = $this->db->get('cms_destination');
		return $query->result();
	}
	
	function insert_lang($arr)
	{
		$this->db->insert('cms_destination_lang', $arr);
		return $this->db->insert_id();	
	}
	
	function update_lang($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_destination_lang', $arr);
	}
	
	function delete_lang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_destination_lang');
	}
	
	function get_lang_id($destination_id, $lang)
	{
		$this->db->where('destination_id', $destination_id);
		$this->db->where('lang', $lang);
		$query = $this->db->get('cms_destination_lang');
		return $query->result();
	}
	
	function get_list()
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_destination ";
		$sql .= "ORDER BY destination_country, destination_name ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function get_active()
	{
		$this->db->order_by('destination_name','asc');
		$this->db->where('destination_status', '1');
		$query = $this->db->get('cms_destination');
		return $query->result();	
	}

	
	function get_active_list()
	{
		
		$page = $this->input->get('page');
		
		if($page == false){
			$page = 1;
		}
		$limit = 10;
		$start = $page * $limit - $limit;
		
		$sql = "SELECT *, cms_destination.thumbnail  AS thumbnail ";
		$sql .= "FROM cms_destination, cms_country ";
		$sql .= "WHERE destination_status = 1 ";
		$sql .= "AND cms_destination.destination_country =  cms_country.code ";
		$sql .= "ORDER BY destination_name LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_destination ";
		$sql .= "WHERE destination_status = 1 ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
	function get_country()
	{
	
		$sql = "SELECT * ";
		$sql .= "FROM cms_destination, cms_country ";
		$sql .= "WHERE cms_destination.destination_status = '1' ";
		$sql .= "AND cms_destination.destination_country = cms_country.code ";
		$sql .= "GROUP BY cms_destination.destination_country ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function get_slug($slug)
	{

		$this->db->where('destination_slug', $slug);
		$query = $this->db->get('cms_destination');
		return $query->result();
	
	}
	
}