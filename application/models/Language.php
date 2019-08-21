<?php

class Language extends CI_Model{
	
	function get(){
		
		$q = $this->input->get('q');
		
		switch($this->input->get('field')){
			case"code";
				$field = $this->input->get('field');
			break;
			case"name";
				$field = $this->input->get('field');
			break;
			case"active";
				$field = $this->input->get('field');
			break;
			default:
				$field = 'code';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		if($q){
			$this->db->like('name',$q);
		}
		if($this->input->get('field')){
			$this->db->order_by($field, $sort);
		}
		$query = $this->db->get('cms_language');
		return $query->result();
		
	}
	
	function update($code, $status)
	{
		$this->db->where('code', $code);
		$this->db->update('cms_language', array('active'=>$status));

		$sql = "UPDATE cms_language ";
		$sql .= "SET active = 0 ";
		$sql .= "WHERE code != '$code' ";
		$this->db->query($sql);
		
	}
	
	function get_active()
	{
		
		$this->db->where('active', '1');
		$query = $this->db->get('cms_language');
		return $query->result();
		
	}
	
	function get_code($code)
	{
		$this->db->where('code', $code);
		$query = $this->db->get('cms_language');
		$rs = $query->result();
		return $rs;		
	}
	
	function get_all()
	{
		$this->db->order_by('name','asc');
		$query = $this->db->get('cms_language');
		return $query->result();	
	}
	
			
}