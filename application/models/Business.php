<?php

class Business extends CI_Model{


	function tree($category_id, $current_id, $level){
		
		$sql = "SELECT ";
		$sql .= "category_id, category_name, parent_id ";		
		$sql .= "FROM cms_category_business ";
		$sql .= "WHERE parent_id = '$category_id' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			
			$marker = '';
			for($i=1; $i<=$level-1; $i++){
				$marker .= '-';
			}
			
			if($current_id == $value->category_id){
				$select = ' selected';
			}else{
				$select = '';
			}
			
			echo '<option value="'.$value->category_id.'" '.$select.'>'. $marker . ' ' .$value->category_name.'</option>'."\n";
			$this->tree($value->category_id, $current_id, $level+1);
		}		
	}	
	
	function get_array_tree()
	{

		$sql = "SELECT ";
		$sql .= "category_id, category_name, parent_id ";		
		$sql .= "FROM cms_category_business ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			$data[$value->parent_id][$value->category_id] = $value->category_name;
		}		
	
		return $data;
	
	}
	
	function get_id($category_id)
	{
		
		$this->db->where('category_id', $category_id);
		$query = $this->db->get('cms_category_business');
		return $query->result();
	}
	
	function business_category_interested($str)
	{
		$arr = array();
		$sql = "SELECT * FROM cms_category_business WHERE category_id IN ($str)";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			$arr[] = $value->category_name;
		}
		
		if(count($arr)){
			return implode(', ',$arr);
		}
	}
	
}