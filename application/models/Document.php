<?php

class Document extends CI_Model
{

	function insert($arr)
	{
		$this->db->insert('cms_product_doc', $arr);
		return $this->db->insert_id();
	}
	
	function update($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_product_doc', $arr);
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_product_doc');
	}
	
	function get_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('cms_product_doc');
		return  $query->result();
	}
	
	function get($product_id)
	{
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('cms_product_doc');
		return $query->result();
	}
	
}