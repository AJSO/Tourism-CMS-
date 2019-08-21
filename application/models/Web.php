<?php

class Web extends CI_Model{

	public function timestamp($datetime)
	{
		list($thedate,$thetime) = explode(' ',$datetime);
		list($y,$m,$d) = explode('-',$thedate);
		list($h,$i,$s) = explode(':',$thetime);
		return mktime($h,$i,$s,$m,$d,$y);
	}

	public function time_elapsed_string($ptime)
	{
			$etime = time() - $ptime;
	
			if ($etime < 1)
			{
					return '0 seconds';
			}
	
			$a = array( 365 * 24 * 60 * 60  =>  'year',
									 30 * 24 * 60 * 60  =>  'month',
												24 * 60 * 60  =>  'day',
														 60 * 60  =>  'hour',
																	60  =>  'minute',
																	 1  =>  'second'
									);
			$a_plural = array( 'year'   => 'years',
												 'month'  => 'months',
												 'day'    => 'days',
												 'hour'   => 'hours',
												 'minute' => 'minutes',
												 'second' => 'seconds'
									);
	
			foreach ($a as $secs => $str)
			{
					$d = $etime / $secs;
					if ($d >= 1)
					{
							$r = round($d);
							return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
					}
			}
	}

	function check_member($session_id)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM session_website, cms_member ";
		$sql .= "WHERE session_website.session_id = '$session_id' ";
		$sql .= "AND session_website.member_id = cms_member.member_id ";
		$sql .= "AND session_website.logout = 0 ";
		$query = $this->db->query($sql);
		return $query->result();
			
	}

	function get_active_category($parent_id){
		
		$this->db->where('parent_id', $parent_id);
		$this->db->where('category_active', 1);
		$query = $this->db->get('cms_category');
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			echo '<li><a href="'.base_url().$value->category_slug.'">'.$value->category_title.'</a></li>';
		}
	}
	
	
	function get_active_page()
	{
		
		$this->db->where('page_status', 1);
		$this->db->where('page_date < ', date('Y-m-d H:i:s'));
		$this->db->order_by('page_display_order', 'asc');
		$query = $this->db->get('cms_page');
		$rs = $query->result();
		
		echo '<ul id="menu-pages" class="list-inline">';
		foreach($rs as $index=>$value){
			echo '<li><a href="'.base_url().'page/'.$value->page_slug.'">'.$value->page_menu.'</a></li>';
		}
		echo '</ul>';
		
		
	}
	
	function get_latest($article)
	{
		
		$sql = "SELECT ";
		$sql .= "article_id, article_title, article_slug, guid ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE article_status = 1 ";
		$sql .= "AND article_id NOT IN (".implode(',', $article).") ";
		$sql .= "ORDER BY article_id DESC ";
		$sql .= "LIMIT 0, 7";
		$query = $this->db->query($sql);
		return $query->result();
	
	}
	
	function get_category($parent_id, $article)
	{
		
		$category_arr = array();
		
		$sql = "SELECT category_id ";
		$sql .= "FROM cms_category ";
		$sql .= "WHERE parent_id = '$parent_id' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		foreach($rs as $index=>$value){
			$category_arr[] = $value->category_id;
		}

		
		$sql = "SELECT ";
		$sql .= "article_id, article_title, article_slug, guid, article_description ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE article_status = 1 ";
		if(count($category_arr)){
			$sql .= "AND ( category_id IN ($parent_id) OR category_id IN (".implode(',', $category_arr).") ) ";
		}else{
			$sql .= "AND ( category_id IN ($parent_id) )";
		}
		$sql .= "AND article_id NOT IN (".implode(',', $article).") ";
		$sql .= "ORDER BY article_id DESC ";
		$sql .= "LIMIT 0, 12";
		$query = $this->db->query($sql);
		return $query->result();	
	}
	
	function get_topstory($category_id, $article_id)
	{
		
		$article = array();
		
		$sql = "SELECT ";
		$sql .= "article_id, article_slug, guid, ";
		$sql .= "article_title ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE article_id != '$article_id' ";
		$sql .= "AND category_id = '$category_id' ";
		$sql .= "AND article_id != '$article_id' ";
		$sql .= "AND article_status = 1 ";
		$sql .= "ORDER BY article_view DESC ";
		$sql .= "LIMIT 0, 2 ";
		$query = $this->db->query($sql);
		$rs = $query->result();
				
		foreach($rs as $index=>$value){
			
			$sql = "SELECT * ";
			$sql .= "FROM cms_article_upload, cms_upload ";
			$sql .= "WHERE cms_article_upload.upload_id = cms_upload.upload_id ";
			$sql .= "AND cms_upload.type = 'image' ";
			$sql .= "AND cms_article_upload.article_id = '".$value->article_id."' ";
			$sql .= "ORDER BY cms_upload.filedisplayorder ";
			$sql .= "LIMIT 0, 1 ";
			$query = $this->db->query($sql);
			$rs2 = $query->result();
			
			if(count($rs2)){
				$article[$index]['article_id'] = $value->article_id;
				$article[$index]['article_title'] = $value->article_title;
				$article[$index]['url'] = base_url().'content/'.$value->article_slug;
				$article[$index]['thumb'] = base_url().'images/'.$rs2[0]->slug.'/75x75';
			}
			
		}
		
		return $article;
		
	}
	
	function get_related($category_id, $article_id, $topstory)
	{
	
		$article = array();
		$topstory_arr = array();
		
		foreach($topstory as $index=>$value){
			$topstory_arr[] = $topstory[$index]['article_id'];
		}
		
		$sql = "SELECT ";
		$sql .= "article_id, article_slug, guid, ";
		$sql .= "article_title ";
		$sql .= "FROM cms_article ";
		$sql .= "WHERE 1 ";
		$sql .= "AND category_id = '$category_id' ";
		$sql .= "AND article_id < '$article_id' ";
		if(count($topstory_arr)){
			$sql .= "AND article_id NOT IN (".implode(',', $topstory_arr).")";
		}
		$sql .= "AND article_status = 1 ";
		$sql .= "ORDER BY article_id DESC ";
		$sql .= "LIMIT 0, 12 ";
		$query = $this->db->query($sql);
		$rs = $query->result();

		foreach($rs as $index=>$value){
			
			$sql = "SELECT * ";
			$sql .= "FROM cms_article_upload, cms_upload ";
			$sql .= "WHERE cms_article_upload.upload_id = cms_upload.upload_id ";
			$sql .= "AND cms_upload.type = 'image' ";
			$sql .= "AND cms_article_upload.article_id = '".$value->article_id."' ";
			$sql .= "ORDER BY cms_upload.filedisplayorder ";
			$sql .= "LIMIT 0, 1 ";
			$query = $this->db->query($sql);
			$rs2 = $query->result();
			
			if(count($rs2)){
				$article[$index]['article_title'] = $value->article_title;
				$article[$index]['url'] = base_url().'content/'.$value->article_slug;
				$article[$index]['thumb'] = base_url().'images/'.$rs2[0]->slug.'/400x300';
			}	
		}
		
		return $article;
		
	}
	
	function get_thumbnail($article_id)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_article_upload, cms_upload ";
		$sql .= "WHERE cms_article_upload.upload_id = cms_upload.upload_id ";
		$sql .= "AND cms_upload.type = 'image' ";
		$sql .= "AND cms_article_upload.article_id = '".$article_id."' ";
		$sql .= "ORDER BY cms_upload.filedisplayorder ";
		$sql .= "LIMIT 0, 1 ";
		$query = $this->db->query($sql);
		return $query->result();
						
	}
	
	function get_category_slug($slug)
	{
		
		$this->db->where('category_slug', $slug);
		$query = $this->db->get('cms_category');
		return $query->result();
		
	}
}