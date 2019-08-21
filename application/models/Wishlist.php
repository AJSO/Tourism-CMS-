<?php
class Wishlist extends CI_Model{
	
	function insert($arr)
	{
		$this->db->insert('cms_wishlist', $arr);
		return $this->db->insert_id();	
	}
	
	function get($lang, $property, $session_id)
	{
		
		$sql = "SELECT *, product_description AS description ";
		$sql .= "FROM cms_product, cms_wishlist ";
		$sql .= "WHERE cms_product.product_id = cms_wishlist.product_id ";
		$sql .= "ORDER BY id DESC ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_wishlist');
	}

}
?>