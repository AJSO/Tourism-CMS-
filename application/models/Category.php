<?php

class Category extends CI_Model{

	function get()
	{
		$page = $this->input->get('page');
		$q = $this->input->get('q');
		$category_active = $this->input->get('category_active');
		if($page == 0){ $page = 1; }
		
		$limit = $this->input->get('limit');
		if($limit == 0){
			$limit = 10;
		}
		
		$start = $page * $limit - $limit;
		$sort = $this->input->get('sort');

		switch($this->input->get('field')){
			case'category_id';
				$field = $this->input->get('field');
			break;
			case'parent_id';
				$field = $this->input->get('field');
			break;
			case'thumbnail';
				$field = $this->input->get('field');
			break;
			case'category_title';
				$field = $this->input->get('field');
			break;
			case'category_description';
				$field = $this->input->get('field');
			break;
			case'category_active';
				$field = $this->input->get('field');
			break;
			case'category_published_article';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'category_id';
		}
	
		$sql = "SELECT * ";
		$sql .= "FROM cms_category ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "category_title LIKE '%".addslashes($q)."%' OR ";
			$sql .= "category_description LIKE '%".addslashes($q)."%' ";
			$sql .= ")";
		}
		if($category_active == '0'){
			$sql .= "AND category_active = '0' ";
		}else if($category_active == '1'){
			$sql .= "AND category_active = '1' ";
		}
		if($field){
			$sql .= "ORDER BY $field $sort ";
		}else{
			$sql .= "ORDER BY category_id DESC ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_category ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "category_title LIKE '%".addslashes($q)."%' OR ";
			$sql .= "category_description LIKE '%".addslashes($q)."%' ";
			$sql .= " )";
		}		
		if($category_active == '0'){
			$sql .= "AND category_active = '0' ";
		}else if($category_active == '1'){
			$sql .= "AND category_active = '1' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
	
		return $data;
	}
	
	function get_id($category_id)
	{		
		$query = $this->db->get_where('cms_category', array('category_id'=>$category_id));
		return $query->result();
	}
	
	function insert($arr)
	{
		$this->db->insert('cms_category', $arr);
		return $this->db->insert_id();
	}
	
	function update($category_id, $arr)
	{
		$this->db->where('category_id', $category_id);
		$this->db->update('cms_category', $arr);
	}
	
	function check_article($category_id)
	{
		$sql = "SELECT COUNT(*) AS num FROM cms_article WHERE category_id = '$category_id' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num;
	}
		
	function delete($category_id){
		
		$this->db->where('category_id', $category_id);
		$this->db->delete('cms_category');
		
	}
	
	function insert_lang($arr)
	{
		$this->db->insert('cms_category_lang', $arr);
		return $this->db->insert_id();
	}
	
	function update_lang($id, $arr){
		$this->db->where('id', $id);
		$this->db->update('cms_category_lang', $arr);
	}
	
	function delete_lang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_category_lang');
	}
	
	function tree($category_id, $current_id, $level){
		
		$sql = "SELECT ";
		$sql .= "category_id, category_title, parent_id ";		
		$sql .= "FROM cms_category ";
		$sql .= "WHERE parent_id = '$category_id' ";
		$sql .= "ORDER BY category_display_order ";
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
			
			echo '<option value="'.$value->category_id.'" '.$select.'>'. $marker . ' ' .$value->category_title.'</option>'."\n";
			$this->tree($value->category_id, $current_id, $level+1);
		}		
	}	

	function tree_li($category_id, $current_id, $level){
		
		$sql = "SELECT ";
		$sql .= "category_id, category_title, parent_id ";		
		$sql .= "FROM cms_category ";
		$sql .= "WHERE parent_id = '$category_id' ";
		$sql .= "ORDER BY category_display_order ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			
			$marker = '';
			for($i=1; $i<=$level-1; $i++){
				$marker .= '-';
			}
			
			if($current_id == $value->category_id){
				$select = '<i class="zmdi zmdi-check-circle text-success"></i>';
			}else{
				$select = '';
			}
			
			$url = base_url().'admin/post?category_id='.$value->category_id.'&field='.$this->input->get('field');
			$url .= '&sort='.$this->input->get('sort');
			$url .= "&q=".$this->input->get('q');
			
			echo '<li> <a href="'.$url.'">'.$marker . ' '. $select.' ' .$value->category_title.'</a></li>'."\n";
			$this->tree_li($value->category_id, $current_id, $level+1);
		}		
	}	


	function product_tree_li($category_id, $current_id, $level){
		
		$sql = "SELECT ";
		$sql .= "category_id, category_title, parent_id ";		
		$sql .= "FROM cms_category ";
		$sql .= "WHERE parent_id = '$category_id' ";
		$sql .= "ORDER BY category_display_order ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			
			$marker = '';
			for($i=1; $i<=$level-1; $i++){
				$marker .= '-';
			}
			
			if($current_id == $value->category_id){
				$select = '<i class="zmdi zmdi-check-circle text-success"></i>';
			}else{
				$select = '';
			}
			
			$url = base_url().'admin/product?category_id='.$value->category_id.'&field='.$this->input->get('field');
			$url .= '&sort='.$this->input->get('sort');
			$url .= "&q=".$this->input->get('q');
			
			echo '<li> <a href="'.$url.'">'.$marker . ' '. $select.' ' .$value->category_title.'</a></li>'."\n";
			$this->tree_li($value->category_id, $current_id, $level+1);
		}		
	}	

	
	function get_lang($lang, $category_id)
	{
		
		$this->db->where('category_id', $category_id);
		$this->db->where('lang', $lang);
		$query = $this->db->get('cms_category_lang');
		
		return $query->result();
	}
	
	function get_active_lang($lang, $default_lang)
	{
		
		$cate = array();
		
		if($lang == $default_lang){
			$sql = "SELECT ";
			$sql .= "category_id AS id, category_title AS title, parent_id, thumbnail ";
			$sql .= "FROM cms_category ";
			$sql .= "WHERE category_active = 1 ";
			$sql .= "ORDER BY parent_id, category_display_order ";
			$query = $this->db->query($sql);
			$rs = $query->result();
		}else{
			$sql = "SELECT ";
			$sql .= "cms_category.category_id AS id, title, parent_id, thumbnail ";
			$sql .= "FROM cms_category, cms_category_lang ";
			$sql .= "WHERE cms_category.category_active = 1 ";
			$sql .= "AND cms_category_lang.category_id = cms_category.category_id ";
			$sql .= "AND cms_category_lang.lang = '$lang' ";
			$sql .= "ORDER BY parent_id, category_display_order ";
			$query = $this->db->query($sql);
			$rs = $query->result();		
		}

		foreach($rs as $index=>$value){
			$cate[$value->parent_id][$value->id] = $value->title;
		}
		
		return $cate;
	}
	
	function get_parent_active()
	{
		$this->db->where('category_active', 1);
		$this->db->where('parent_id', 0);
		$query = $this->db->get('cms_category');
		return $query->result();
	}
	
	
	
	function get_active_category_tree($lang, $property){

		$category = array();
		
		if($lang == $property[0]->lang){
			$this->db->where('category_active', 1);
			$this->db->order_by('category_display_order', 'asc');
			$query = $this->db->get('cms_category');
			
			$sql = "SELECT ";
			$sql .= "category_id, category_title AS name, parent_id, category_slug AS slug, thumbnail ";
			$sql .= "FROM cms_category ";
			$sql .= "WHERE category_active = 1 ";
			$query = $this->db->query($sql);
			$rs = $query->result();
			
			foreach($rs as $index=>$value){
				$category[$value->parent_id]['id'][] = $value->category_id;
				$category[$value->parent_id]['slug'][] = $value->slug;
				$category[$value->parent_id]['name'][] = $value->name;
				$category[$value->parent_id]['child'][] = $value;
				$category[$value->parent_id]['thumbnail'][] = $value->thumbnail;
			}		
		}else{
			$sql = "SELECT ";
			$sql .= "cms_category.thumbnail, ";
			$sql .= "cms_category.category_slug AS slug, ";
			$sql .= "cms_category.category_title AS default_category_title, ";
			$sql .= "cms_category_lang.title AS name,  ";
			$sql .= "cms_category.category_id AS category_id, ";
			$sql .= "cms_category.parent_id ";
			$sql .= "FROM cms_category, cms_category_lang ";
			$sql .= "WHERE cms_category.category_id = cms_category_lang.category_id ";
			$sql .= "AND cms_category.category_active = 1 ";
			$sql .= "AND cms_category_lang.lang = '$lang' ";
			$sql .= "ORDER BY category_display_order ";
			$query = $this->db->query($sql);
			$rs = $query->result();
	
			foreach($rs as $index=>$value){
				$category[$value->parent_id]['id'][] = $value->category_id;
				$category[$value->parent_id]['slug'][] = $value->slug;
				$category[$value->parent_id]['thumbnail'][] = $value->thumbnail;
				
				if($value->name){
					$category[$value->parent_id]['name'][] = $value->name;
				}else{
					$category[$value->parent_id]['name'][] = $value->default_category_title;
				}
				$category[$value->parent_id]['child'][] = $value;
			}		
		}
		
		return $category;
	}
	
	function get_slug($lang, $property, $slug)
	{
		if($lang == $property[0]->lang){
			$sql = "SELECT ";
			$sql .= "category_id, category_title AS title, thumbnail ";
			$sql .= "FROM cms_category ";
			$sql .= "WHERE category_slug = '$slug' ";
		}else{
			$sql = "SELECT ";
			$sql .= "cms_category.category_id, cms_category_lang.title, thumbnail ";
			$sql .= "FROM cms_category, cms_category_lang ";
			$sql .= "WHERE cms_category.category_slug = '$slug' ";
			$sql .= "AND cms_category_lang.lang = '$lang' ";
			$sql .= "AND cms_category.category_id = cms_category_lang.category_id ";
		}
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_category_lang($lang, $property, $category_id){

		if($lang == $property[0]->lang){
			$sql = "SELECT ";
			$sql .= "category_id, category_title AS title, category_slug AS slug, thumbnail  ";
			$sql .= "FROM cms_category ";
			$sql .= "WHERE category_id = '$category_id' ";
		}else{
			$sql = "SELECT ";
			$sql .= "cms_category.category_id, cms_category_lang.title, cms_category.category_slug AS slug, thumbnail ";
			$sql .= "FROM cms_category, cms_category_lang ";
			$sql .= "WHERE cms_category.category_id = '$category_id' ";
			$sql .= "AND cms_category_lang.lang = '$lang' ";
			$sql .= "AND cms_category.category_id = cms_category_lang.category_id ";
		}
		$query = $this->db->query($sql);
		return $query->result();
	
	}
	
	function get_count_category()
	{
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_category ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num; 
	}
	
}