<?php
class Rate extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_product_item_rate', $arr);
		return $this->db->insert_id();
	}
	
	function delete($rate_id)
	{
		$this->db->where('rate_id', $rate_id);
		$this->db->delete('cms_product_item_rate');
	}
	
	function update($rate_id, $arr)
	{
		$this->db->where('rate_id', $rate_id);
		$this->db->update('cms_product_item_rate', $arr);
	}
	
	function delete_by_product($product_id)
	{
		$this->db->where('product_id', $product_id);
		$this->db->delete('cms_product_item_rate');
	}
	
	function get_rate($product_id)
	{
		
		$rate = array();
		
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('cms_product_item_rate');
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			
			$rate['adult'][$value->item_id][$value->period_id] = $value->adult; 
			$rate['child'][$value->item_id][$value->period_id] = $value->child; 
			
		}
		
		return $rate;
		
	}
	
	function get_minrate($product_id)
	{
	
		$sql = "SELECT MIN(adult) AS minrate ";
		$sql .= "FROM cms_product_item_rate ";
		$sql .= "WHERE product_id = '$product_id' ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}

}