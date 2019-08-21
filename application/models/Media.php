<?php

class Media extends CI_Model{
	
	function get_type($type, $article_id)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_upload, cms_article_upload ";
		$sql .= "WHERE article_id = '$article_id' ";
		$sql .= "AND cms_upload.type = '$type' ";
		$sql .= "AND cms_article_upload.upload_id = cms_upload.upload_id ";
		$sql .= "ORDER BY filedisplayorder ";
		$query = $this->db->query($sql);
		
		return $query->result();
	
	}

	function get_thumbnail($article_id)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_upload, cms_article_upload ";
		$sql .= "WHERE article_id = '$article_id' ";
		$sql .= "AND cms_upload.type = 'image' ";
		$sql .= "AND cms_article_upload.upload_id = cms_upload.upload_id ";
		$sql .= "ORDER BY filedisplayorder ";
		$sql .= "LIMIT 0, 1 ";
		$query = $this->db->query($sql);
		
		return $query->result();
	
	}

	
	function get_id($upload_id)
	{
		$this->db->where('upload_id', $upload_id);
		$query = $this->db->get('cms_upload');
		return $query->result();
	}
	
	function get_slug($slug)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_upload, cms_article_upload ";
		$sql .= "WHERE cms_article_upload.slug = '$slug' ";
		$sql .= "AND cms_upload.upload_id = cms_article_upload.upload_id ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_session($type, $session_id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_upload ";
		$sql .= "WHERE session_id = '$session_id' ";
		$sql .= "AND type = '$type' ";
		$sql .= "ORDER BY filedisplayorder ";
		$query = $this->db->query($sql);	
		return $query->result();
	}
	
	function delete($upload_id)
	{
		
		$query = $this->db->get_where('cms_upload',array('upload_id'=>$upload_id));
		$rs = $query->result();
		if(is_file($rs[0]->filepath)){
			unlink($rs[0]->filepath);
		}
		
		$sql = "DELETE FROM cms_upload WHERE upload_id = '$upload_id' ";
		$query = $this->db->query($sql);
		
		$sql = "DELETE FROM cms_article_upload WHERE upload_id = '$upload_id' ";
		$query = $this->db->query($sql);
		
	}
	
	function remove_session($upload_id)
	{
		
		$sql = "UPDATE cms_upload ";
		$sql .= "SET session_id = '' ";
		$sql .= "WHERE upload_id = '$upload_id' ";
		$this->db->query($sql);

	}
	
	function get_folder($type)
	{
		
		$sql = "SELECT ";
		$sql .= "MIN(fileentered) AS mindate, MAX(fileentered) AS maxdate ";
		$sql .= "FROM cms_upload ";
		$sql .= "WHERE type = '$type' ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function get_by_month($type, $mm, $yy)
	{
		
		$period1 = date('Y-m-d', mktime(0,0,0,$mm,1,$yy));
		$period2 = date('Y-m-d', mktime(0,0,0,$mm+1,1,$yy));
		
		$limit = 10;
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$start = $page * $limit - $limit;
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		switch($this->input->get('field')){
			case'upload_id';
				$field = $this->input->get('field');
			break;
			case'type';
				$field = $this->input->get('field');
			break;
			case'filetype';
				$field = $this->input->get('field');
			break;
			case'filepath';
				$field = $this->input->get('field');
			break;
			case'filecaption';
				$field = $this->input->get('field');
			break;
			case'fileentered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'upload_id';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_upload ";
		$sql .= "WHERE 1 AND (fileentered BETWEEN '$period1' AND '$period2') ";
		$sql .= "AND type = '$type' ";
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_upload ";
		$sql .= "WHERE 1 AND (fileentered BETWEEN '$period1' AND '$period2') ";
		$sql .= "AND type = '$type' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
	function insert_lang($lang, $arr)
	{
		$table = 'cms_upload_'.strtolower($lang);
		
		$this->db->insert($table, $arr);
		return $this->db->insert_id();
		
	}

	function update_lang($lang, $id, $arr)
	{
		$table = 'cms_upload_'.strtolower($lang);
		
		$this->db->where('id', $id);
		$this->db->update($table, $arr);
		
	}
	
	function delete_lang($lang, $id)
	{
		$table = 'cms_upload_'.strtolower($lang);
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	
	function get_lang($lang, $upload_id){

		$table = 'cms_upload_'.strtolower($lang);
		$this->db->where('upload_id', $upload_id);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	
}