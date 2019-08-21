<?php

class Slide extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_slider', $arr);
		return $this->db->insert_id();
	}
	
	function update($slide_id, $arr)
	{
		$this->db->where('slide_id', $slide_id);
		$this->db->update('cms_slider', $arr);
	}
	
	function get()
	{
		$limit = 20;
		$page = $this->input->get('page');	
		if($page == false){ $page = 1; }
		$q = $this->input->get('q');
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'slide_id';
				$field = 'cms_slider.'.$this->input->get('field');
			break;
			case'slide_title';
				$field = $this->input->get('field');
			break;
			case'slide_description';
				$field = $this->input->get('field');
			break;
			case'slide_message ';
				$field = $this->input->get('field');
			break;
			case'slide_label';
				$field = $this->input->get('field');
			break;
			case'url';
				$field = $this->input->get('field');
			break;
			case'slide_updated';
				$field = $this->input->get('field');
			break;
			case'slide_entered';
				$field = $this->input->get('field');
			break;
			case'upload_id';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'cms_slider.slide_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_slider, cms_slider_upload ";
		$sql .= "WHERE 1 ";	
		$sql .= "AND cms_slider.slide_id = cms_slider_upload.slide_id ";
		if($q){
			$sql .= "AND (";
			$sql .= "slide_title LIKE '%$q%' OR ";
			$sql .= "slide_description LIKE '%$q%' OR ";
			$sql .= "slide_message LIKE '%$q%' OR ";
			$sql .= "slide_label LIKE '%$q%' OR ";
			$sql .= "url LIKE '%$q%' ";
			$sql .=")";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_slider ";
		$sql .= "WHERE 1 ";	
		if($q){
			$sql .= "AND (";
			$sql .= "slide_title LIKE '%$q%' OR ";
			$sql .= "slide_description LIKE '%$q%' OR ";
			$sql .= "slide_message LIKE '%$q%' OR ";
			$sql .= "slide_label LIKE '%$q%' OR ";
			$sql .= "url LIKE '%$q%' ";
			$sql .=")";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
	}
	
	function get_limit($limit)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_slider, cms_slider_upload ";
		$sql .= "WHERE 1 ";	
		$sql .= "AND cms_slider.slide_id = cms_slider_upload.slide_id ";
		$sql .= "ORDER BY cms_slider.slide_id DESC ";
		$sql .= "LIMIT 0, 3";
		$query = $this->db->query($sql);
		return  $query->result();
	}
	
	function get_lang($lang, $property)
	{
		
		$limit = 5;
		
		if($lang == $property[0]->lang){
			
			$sql = "SELECT ";
			$sql .= "slide_title AS title, ";
			$sql .= "slide_description AS description, ";
			$sql .= "slide_message AS message, ";
			$sql .= "slide_label AS label, ";
			$sql .= "url, upload_id ";
			$sql .= "FROM cms_slider, cms_slider_upload ";
			$sql .= "WHERE 1 ";	
			$sql .= "AND cms_slider.slide_id = cms_slider_upload.slide_id ";
			$sql .= "ORDER BY cms_slider.slide_id DESC ";
			$sql .= "LIMIT 0, $limit";
			$query = $this->db->query($sql);
			return  $query->result();			
			
		}else{
			$sql = "SELECT ";
			$sql .= "title, description, message, label, url, upload_id ";
			$sql .= "FROM cms_slider, cms_slider_lang, cms_slider_upload ";
			$sql .= "WHERE 1 ";	
			$sql .= "AND cms_slider_lang.lang = '$lang' ";
			$sql .= "AND cms_slider.slide_id = cms_slider_lang.slide_id ";
			$sql .= "AND cms_slider.slide_id = cms_slider_upload.slide_id ";
			$sql .= "ORDER BY cms_slider.slide_id DESC ";
			$sql .= "LIMIT 0, $limit ";
			$query = $this->db->query($sql);
			return  $query->result();			
		
		}
	}
	
	function delete($slide_id)
	{
		$this->db->where('slide_id', $slide_id);
		$this->db->delete('cms_slider');
	}
	
	function get_id($slide_id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_slider, cms_slider_upload ";
		$sql .= "WHERE cms_slider.slide_id = cms_slider_upload.slide_id ";
		$sql .= "AND cms_slider.slide_id = '$slide_id' ";

		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function insert_file($arr)
	{
		$this->db->insert('cms_slider_upload', $arr);
		return $this->db->insert_id();
	}
	
	function get_lang_id($lang, $slide_id)
	{
		$this->db->where('slide_id', $slide_id);
		$this->db->where('lang', $lang);
		$query = $this->db->get('cms_slider_lang');
		return $query->result();
	}
	
	
	function insert_lang($arr)
	{
		$this->db->insert('cms_slider_lang', $arr);
		return $this->db->insert_id();
	}
	
	function update_lang($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_slider_lang', $arr);	
	}
	
	function delete_lang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_slider_lang');		
	}

}