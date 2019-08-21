<?php

class Slug extends CI_Model{
	
	function url($str){
		
		$text = $str;
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
		$text = @iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);
	
		if (empty($text)) {
			return urlencode($str);
		}
	
		return $text;	
	}
	
	
	function guid($category_id)
	{
		$sql = "SELECT category_slug, parent_id FROM cms_category WHERE category_id = '$category_id' ";
    $query = $this->db->query($sql);
    $row = $query->result();
		
    if($row[0]->parent_id == 0) {
        return $row[0]->category_slug;
    } else {
        return $this->guid($row[0]->parent_id).'/'.$row[0]->category_slug;
    }
	}
	
	function breadcrumb($arr) {
				
		$_arr = array();
		
		$code = '';
		$base = '';
		
		foreach($arr as $val){
			$_arr[] = "'$val'";
		}		
		
		if(count($_arr)){
			$sql = "SELECT * FROM cms_category WHERE category_slug IN (".implode(',', $_arr).") ";
			$query = $this->db->query($sql);
			$rs = $query->result();
			
			foreach($rs as $index=>$value){
				$code .= '<li><a href="'.base_url().'category/'.$value->category_slug.'">'. $value->category_title .'</a></li>';
			}
		}
		return $code;
	}
	
		
	function shortcode()
	{
		$str = '0123456789';
		$str .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$str .= 'abcdefghijklmnopqrstuvwxyz';
		
		$val = '';
		for($i=1; $i<=5; $i++){
			$val .= substr($str,rand(0, strlen($str)),1);
		}
		return  $val;
	}
	
}