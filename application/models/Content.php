<?php

class Content extends CI_Model{

	function get()
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = addslashes($this->input->get('q'));
		$category_id = $this->input->get('category_id');
		$article_status = $this->input->get('article_status');
		$limit = 10;
		$start = $page * $limit - $limit;
		
		$field = '';
		switch($this->input->get('field'))
		{
			case"article_id";
				$field = $this->input->get('field');
			break;
			case"category_id";
				$field = $this->input->get('field');
			break;
			case"parent_id";
				$field = $this->input->get('field');
			break;
			case"article_slug";
				$field = $this->input->get('field');
			break;
			case"article_title";
				$field = $this->input->get('field');
			break;
			case"article_meta";
				$field = $this->input->get('field');
			break;
			case"article_description";
				$field = $this->input->get('field');
			break;
			case"user_id";
				$field = $this->input->get('field');
			break;
			case"article_date";
				$field = $this->input->get('field');
			break;
			case"article_view";
				$field = $this->input->get('field');
			break;
			case"article_comment";
				$field = $this->input->get('field');
			break;
			case"article_share";
				$field = $this->input->get('field');
			break;
			case"article_type";
				$field = $this->input->get('field');
			break;
			case"article_status";
				$field = $this->input->get('field');
			break;
			case"article_updated";
				$field = $this->input->get('field');
			break;
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}
		if($article_status == '0'){
			$sql .= "AND article_status = '$article_status' ";
		}else if($article_status == '1'){
			$sql .= "AND article_status = '$article_status' ";		
		}
		if($field){
			$sql .= "ORDER BY $field $sort ";
		}else{
			$sql .= "ORDER BY article_id DESC ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE 1 ";
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}		
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($article_status){
			$sql .= "AND article_status = '$article_status' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}


	function get_id($article_id){
		$query = $this->db->get_where('cms_article', array('article_id'=>$article_id));
		return $query->result();
	}

	function get_allow_sub_content()
	{
		$this->db->order_by('article_id','desc');
		$query = $this->db->get_where('cms_article', array('article_allow_subcontent'=>1));
		return $query->result();
	}

	function insert($arr)
	{
		$this->db->insert('cms_article', $arr);
		return $this->db->insert_id();
	}
	
	function update($article_id, $arr)
	{
		$this->db->where('article_id', $article_id);
		$this->db->update('cms_article', $arr);
	}
	
	function delete($article_id)
	{
		$this->db->where('article_id', $article_id);
		$this->db->delete('cms_article');
	}
	
	
	function insert_lang($lang, $arr)
	{
		$table = 'cms_article_lang_'.strtolower($lang);
		$this->db->insert($table, $arr);
		return $this->db->insert_id();
	}
	
	function update_lang($lang, $id, $arr)
	{
		$table = 'cms_article_lang_'.strtolower($lang);
		$this->db->where('id', $id);
		$this->db->update($table, $arr);
	}
	
	function delete_lang($lang, $id){
		$table = 'cms_article_lang_'.strtolower($lang);
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	function get_lang_id($lang, $article_id)
	{
		$table = 'cms_article_lang_'.strtolower($lang);
		$this->db->where('article_id', $article_id);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	function get_slug($slug)
	{
	
		$this->db->where('article_slug', $slug);
		$query = $this->db->get('cms_article');
		return $query->result();
		
	}
	
	function post_view($article_id)
	{
		$sql = "UPDATE cms_article ";
		$sql .= "SET article_view = article_view + 1 ";
		$sql .= "WHERE article_id = '$article_id' ";
		$this->db->query($sql);
	}

	function get_post_by_member($member_id)
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = addslashes($this->input->get('q'));
		$category_id = $this->input->get('category_id');
		$article_status = $this->input->get('article_status');
		$limit = 10;
		$start = $page * $limit - $limit;
				
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE member_id = '$member_id' ";
		$sql .= "AND article_status = '1' ";
		$sql .= "ORDER BY article_id DESC ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE member_id = '$member_id' ";
		$sql .= "AND article_status = '1' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	
	}
	
	function latest($lang, $property)
	{
		if($lang == $property['0']->lang){
			$sql = "SELECT ";
			$sql .= "article_slug AS slug,  article_title AS title, article_description AS description, thumbnail ";
			$sql .= "FROM cms_article ";
			$sql .= "WHERE article_status = 1 ";
			$sql .= "ORDER BY article_id DESC ";
			$sql .= "LIMIT 0, 6";
		}else{
			
			$table = "cms_article_lang_".strtolower($lang);
			
			$sql = "SELECT ";
			$sql .= "article_slug AS slug, title, description, thumbnail ";
			$sql .= "FROM cms_article, ".$table." ";
			$sql .= "WHERE cms_article.article_status = 1 ";
			$sql .= "AND cms_article.article_id = ".$table.".article_id ";
			$sql .= "ORDER BY cms_article.article_id DESC ";
			$sql .= "LIMIT 0, 6";
		}
		
		$query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function get_active()
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = addslashes($this->input->get('q'));
		$category_id = $this->input->get('category_id');
		$article_status = $this->input->get('article_status');
		$limit = 10;
		$start = $page * $limit - $limit;
		
		$field = '';
		switch($this->input->get('field'))
		{
			case"article_id";
				$field = $this->input->get('field');
			break;
			case"category_id";
				$field = $this->input->get('field');
			break;
			case"parent_id";
				$field = $this->input->get('field');
			break;
			case"article_slug";
				$field = $this->input->get('field');
			break;
			case"article_title";
				$field = $this->input->get('field');
			break;
			case"article_meta";
				$field = $this->input->get('field');
			break;
			case"article_description";
				$field = $this->input->get('field');
			break;
			case"user_id";
				$field = $this->input->get('field');
			break;
			case"article_date";
				$field = $this->input->get('field');
			break;
			case"article_view";
				$field = $this->input->get('field');
			break;
			case"article_comment";
				$field = $this->input->get('field');
			break;
			case"article_share";
				$field = $this->input->get('field');
			break;
			case"article_type";
				$field = $this->input->get('field');
			break;
			case"article_status";
				$field = $this->input->get('field');
			break;
			case"article_updated";
				$field = $this->input->get('field');
			break;
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT *, \n";
		$sql .= "cms_article.thumbnail AS thumbnail \n";
		$sql .= "FROM cms_article, cms_user, cms_category \n";
		$sql .= "WHERE article_status = 1 \n";
		$sql .= "AND cms_article.parent_id = 0 \n";
		$sql .= "AND cms_user.user_id = cms_article.user_id \n";
		$sql .= "AND cms_category.category_id = cms_article.category_id \n";
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) \n";
		}
		if($category_id){
			$sql .= "AND category_id = '$category_id' \n";
		}
		if($article_status == '0'){
			$sql .= "AND article_status = '$article_status' \n";
		}else if($article_status == '1'){
			$sql .= "AND article_status = '$article_status' \n";		
		}
		$sql .= "AND article_date <= NOW() \n";
		if($field){
			$sql .= "ORDER BY $field $sort ";
		}else{
			$sql .= "ORDER BY article_id DESC ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_article, cms_user, cms_category ";
		$sql .= "WHERE article_status = 1 ";
		$sql .= "AND cms_article.parent_id = 0 ";
		$sql .= "AND cms_user.user_id = cms_article.user_id ";
		$sql .= "AND cms_category.category_id = cms_article.category_id ";
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}		
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($article_status){
			$sql .= "AND article_status = '$article_status' ";
		}
		$sql .= "AND article_date <= NOW() ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;	
	}
	
	function get_related($category_id, $article_id)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE category_id = '$category_id' ";
		$sql .= "AND article_id < $article_id ";
		$sql .= "AND article_status = 1 ";
		$sql .= "ORDER BY article_id DESC ";
		$sql .= "LIMIT 0, 5 ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function get_child($parent_id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE 1 ";
		$sql .= "AND article_status = 1 ";
		$sql .= "AND parent_id = $parent_id ";
		$sql .= "AND article_date <= NOW() ";
		$sql .= "ORDER BY article_id DESC ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_by_category_slug($slug)
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = addslashes($this->input->get('q'));
		$category_id = $this->input->get('category_id');
		$article_status = $this->input->get('article_status');
		$limit = 10;
		$start = $page * $limit - $limit;
		
		$field = '';
		switch($this->input->get('field'))
		{
			case"article_id";
				$field = $this->input->get('field');
			break;
			case"category_id";
				$field = $this->input->get('field');
			break;
			case"parent_id";
				$field = $this->input->get('field');
			break;
			case"article_slug";
				$field = $this->input->get('field');
			break;
			case"article_title";
				$field = $this->input->get('field');
			break;
			case"article_meta";
				$field = $this->input->get('field');
			break;
			case"article_description";
				$field = $this->input->get('field');
			break;
			case"user_id";
				$field = $this->input->get('field');
			break;
			case"article_date";
				$field = $this->input->get('field');
			break;
			case"article_view";
				$field = $this->input->get('field');
			break;
			case"article_comment";
				$field = $this->input->get('field');
			break;
			case"article_share";
				$field = $this->input->get('field');
			break;
			case"article_type";
				$field = $this->input->get('field');
			break;
			case"article_status";
				$field = $this->input->get('field');
			break;
			case"article_updated";
				$field = $this->input->get('field');
			break;
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT *, cms_article.thumbnail AS thumbnail ";
		$sql .= "FROM cms_article, cms_user, cms_category ";
		$sql .= "WHERE article_status = 1 ";
		$sql .= "AND cms_article.parent_id = 0 ";
		$sql .= "AND cms_user.user_id = cms_article.user_id ";
		$sql .= "AND cms_category.category_id = cms_article.category_id ";
		$sql .= "AND cms_category.category_slug = '$slug' ";
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}
		if($article_status == '0'){
			$sql .= "AND article_status = '$article_status' ";
		}else if($article_status == '1'){
			$sql .= "AND article_status = '$article_status' ";		
		}
		$sql .= "AND article_date <= NOW() ";
		if($field){
			$sql .= "ORDER BY $field $sort ";
		}else{
			$sql .= "ORDER BY article_id DESC ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_article, cms_user, cms_category ";
		$sql .= "WHERE article_status = 1 ";
		$sql .= "AND cms_article.parent_id = 0 ";
		$sql .= "AND cms_user.user_id = cms_article.user_id ";
		$sql .= "AND cms_category.category_id = cms_article.category_id ";
		$sql .= "AND cms_category.category_slug = '$slug' ";
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}		
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($article_status){
			$sql .= "AND article_status = '$article_status' ";
		}
		$sql .= "AND article_date <= NOW() ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;	
	
	}
	
	function get_by_user($slug)
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = addslashes($this->input->get('q'));
		$category_id = $this->input->get('category_id');
		$article_status = $this->input->get('article_status');
		$limit = 10;
		$start = $page * $limit - $limit;
		
		$field = '';
		switch($this->input->get('field'))
		{
			case"article_id";
				$field = $this->input->get('field');
			break;
			case"category_id";
				$field = $this->input->get('field');
			break;
			case"parent_id";
				$field = $this->input->get('field');
			break;
			case"article_slug";
				$field = $this->input->get('field');
			break;
			case"article_title";
				$field = $this->input->get('field');
			break;
			case"article_meta";
				$field = $this->input->get('field');
			break;
			case"article_description";
				$field = $this->input->get('field');
			break;
			case"user_id";
				$field = $this->input->get('field');
			break;
			case"article_date";
				$field = $this->input->get('field');
			break;
			case"article_view";
				$field = $this->input->get('field');
			break;
			case"article_comment";
				$field = $this->input->get('field');
			break;
			case"article_share";
				$field = $this->input->get('field');
			break;
			case"article_type";
				$field = $this->input->get('field');
			break;
			case"article_status";
				$field = $this->input->get('field');
			break;
			case"article_updated";
				$field = $this->input->get('field');
			break;
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT *, cms_article.thumbnail AS thumbnail ";
		$sql .= "FROM cms_article, cms_user, cms_category ";
		$sql .= "WHERE article_status = 1 ";
		$sql .= "AND cms_article.parent_id = 0 ";
		$sql .= "AND cms_user.user_id = cms_article.user_id ";
		$sql .= "AND cms_category.category_id = cms_article.category_id ";
		$sql .= "AND cms_user.user_firstname = '$slug' ";
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}
		if($article_status == '0'){
			$sql .= "AND article_status = '$article_status' ";
		}else if($article_status == '1'){
			$sql .= "AND article_status = '$article_status' ";		
		}
		$sql .= "AND article_date <= NOW() ";
		if($field){
			$sql .= "ORDER BY $field $sort ";
		}else{
			$sql .= "ORDER BY article_id DESC ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_article, cms_user, cms_category ";
		$sql .= "WHERE article_status = 1 ";
		$sql .= "AND cms_article.parent_id = 0 ";
		$sql .= "AND cms_user.user_id = cms_article.user_id ";
		$sql .= "AND cms_category.category_id = cms_article.category_id ";
		$sql .= "AND cms_user.user_firstname = '$slug' ";
		if($category_id){
			$sql .= "AND category_id = '$category_id' ";
		}		
		if($q){
			$sql .= "AND ( article_title LIKE '%$q%' OR article_description LIKE '%$q%' OR article_detail LIKE '%$q%' ) ";
		}
		if($article_status){
			$sql .= "AND article_status = '$article_status' ";
		}
		$sql .= "AND article_date <= NOW() ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;	
	
	}
	
}