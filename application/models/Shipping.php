<?php

class Shipping extends CI_Model
{
	function get()
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$limit = 50;
		$start = $page * $limit - $limit; 
		$country = $this->input->get('country');
		
		switch($this->input->get('field')){
			case'shipping_id';
				$field = $this->input->get('field');
			break;			
			case'country';
				$field = $this->input->get('field');
			break;
			case'weight1';
				$field = $this->input->get('field');
			break;
			case'weight2';
				$field = $this->input->get('field');
			break;
			case'rate';
				$field = $this->input->get('field');
			break;
			case'entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'shipping_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$start = $page * $limit - $limit;
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_shipping, cms_country ";
		$sql .= "WHERE 1 ";
		$sql .= "AND cms_shipping.country = cms_country.code ";
		if($country){
			$sql .= "AND country = '$country' ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_shipping, cms_country ";
		$sql .= "WHERE 1 ";
		$sql .= "AND cms_shipping.country = cms_country.code ";
		if($country){
			$sql .= "AND country = '$country' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
	function get_id($shipping_id)
	{
		$this->db->where('shipping_id', $shipping_id);
		$query = $this->db->get('cms_shipping');
		return $query->result();
	}
	
	function insert($arr)
	{
		$this->db->query('cms_shipping', $arr);
		return $this->db->insert_id();
	}
	
	function update($shipping_id, $arr)
	{
		$this->db->where('shipping_id', $shipping_id);
		$this->db->update('cms_shipping', $arr);
	}
	
	function delete($shipping_id)
	{
		$this->db->where('shipping_id', $shipping_id);
		$this->db->delete('cms_shipping');
	}
	
	function get_available_country()
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_shipping, cms_country ";
		$sql .= "WHERE cms_shipping.country = cms_country.code ";
		$sql .= "GROUP BY cms_shipping.country ";
		$query = $this->db->query($sql);
		return $query->result();
	}
		
	function get_cost($country, $weight)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_shipping ";
		$sql .= "WHERE  country = '$country' ";
		$sql .= "AND ( '$weight' BETWEEN weight1 AND weight2 ) ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		if(isset($rs[0]->rate)){
			return $rs;
		}else{
			
			$sql = "SELECT * ";
			$sql .= "FROM cms_shipping ";
			$sql .= "WHERE  country = '$country' ";
			$sql .= "ORDER BY rate DESC ";
			$sql .= "LIMIT 0, 1";
			$query = $this->db->query($sql);
			$rs = $query->result();
			return $rs;				
		}
	}
	
	function get_cart_shipping($session_id)
	{
		$this->db->where('session_id', $session_id);
		$query = $this->db->get('cms_cart_shipping');
		return $query->result();
	}
}