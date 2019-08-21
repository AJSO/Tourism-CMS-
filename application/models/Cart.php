<?php

class Cart extends CI_Model{

	function get($session_id)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_cart ";
		$sql .= "WHERE cms_cart.session_id = '$session_id' ";
		$sql .= "ORDER BY cart_id DESC ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function get_sum($session_id)
	{
		$sql = "SELECT ";
		$sql .= "SUM(total) AS cart_total, ";
		$sql .= "SUM(tax) AS cart_tax, ";
		$sql .= "SUM(cost) AS cart_cost, ";
		$sql .= "currency ";
		$sql .= "FROM cms_cart ";
		$sql .= "WHERE session_id = '$session_id' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function insert($arr){
		$this->db->insert('cms_cart', $arr);
		return $this->db->insert_id();
	}
	
	function update($session_id, $cart_id, $arr)
	{
		$this->db->where('cart_id', $cart_id);
		$this->db->where('session_id', $session_id);
		$this->db->update('cms_cart', $arr);
	}
	
	function delete($session_id, $cart_id)
	{		
		$this->db->where('cart_id', $cart_id);
		$this->db->delete('cms_cart');
	}
	
	function remove($session_id){
		$this->db->where('session_id', $session_id);
		$this->db->delete('cms_cart');
	}
	
	function insert_shipping_cart($arr)
	{
		$this->db->insert('cms_cart_shipping', $arr);
		return $this->db->insert_id();
	}
	
	function delete_shipping_cart($session_id)
	{
		$this->db->where('session_id', $session_id);
		$this->db->delete('cms_cart_shipping');
	}
	
	function get_shipping_cost($session_id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_cart_shipping ";
		$sql .= "WHERE session_id = '$session_id' ";
		$query = $this->db->query($sql);
		return $query->result();
	}

}