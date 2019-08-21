<?php

class Currency extends CI_Model{

	function get(){
		
		switch($this->input->get('field'))
		{
			case'id';
				$field = $this->input->get('field');
			break;
			case'code';
				$field = $this->input->get('field');
			break;
			case'name';
				$field = $this->input->get('field');
			break;
			case'value_usd';
				$field = $this->input->get('field');
			break;
			case'active';
				$field = $this->input->get('field');
			break;
			case'updated';
				$field = $this->input->get('field');
			break;
			default:
			$field = 'id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
				
		$this->db->order_by($field,$sort);
		$query = $this->db->get('cms_currency');
		return $query->result();
	}

	function get_all()
	{
		$query = $this->db->get('cms_currency');
		return $query->result();
	}
	
	function get_active()
	{
		$this->db->where('active','1');
		$query = $this->db->get('cms_currency');
		return $query->result();
	}
	
	function insert($arr)
	{
		$this->db->insert('cms_currency', $arr);
		return $this->db->insert_id;
	}
	
	function update($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_currency', $arr);
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_currecy');
	}
	
	function get_array()
	{
		$currency = $this->get();
		foreach($currency as $index=>$value){
			$arr[$value->code] = $value->value_usd;
		}
		
		return $arr;
	}
	
	function convert($price, $from, $to, $currency)
	{
		if($from != $to){
			$value = ($price/$currency[$from]) * $currency[$to];
			return number_format($value,0,'.',',');
		}else{
			return number_format($price,0,'.',',');		
		}
	}
	
	function get_code($code)
	{
		$this->db->where('code', $code);
		$query = $this->db->get('cms_currency');
		return $query->result();
	}

}