<?php

class Widget extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_widget', $arr);
		return $this->db->insert_id();
	}
	
	function update($widget_id, $arr)
	{
		$this->db->where('widget_id', $widget_id);
		$this->db->update('cms_widget', $arr);
	}

	function delete($widget_id)
	{
		$this->db->where('widget_id', $widget_id);
		$this->db->delete('cms_widget');
	}
	
	function get()
	{
		
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$limit = 20;
		$start = $page * $limit - $limit;
				
		switch($this->input->get('field')){
			case'widget_id';
				$field = $this->input->get('field');
			break;
			case'widget_title';
				$field = $this->input->get('field');
			break;
			case'widget_description';
				$field = $this->input->get('field');
			break;
			case'link';
				$field = $this->input->get('field');
			break;
			case'icon';
				$field = $this->input->get('field');
			break;
			case'thumbnail';
				$field = $this->input->get('field');
			break;
			case'meta';
				$field = $this->input->get('field');
			break;
			case'button';
				$field = $this->input->get('field');
			break;
			case'displayorder';
				$field = $this->input->get('field');
			break;
			case'widget_updated';
				$field = $this->input->get('field');
			break;
			case'widget_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'widget_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_widget ";
		$sql .= "WHERE 1 ";
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);	
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_widget ";
		$sql .= "WHERE 1 ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['items'] = $rs[0]->num;
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
		
	}
	function get_type($type)
	{
		
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$limit = 20;
		$start = $page * $limit - $limit;
				
		switch($this->input->get('field')){
			case'widget_id';
				$field = $this->input->get('field');
			break;
			case'widget_title';
				$field = $this->input->get('field');
			break;
			case'widget_description';
				$field = $this->input->get('field');
			break;
			case'meta';
				$field = $this->input->get('field');
			break;			
			case'link';
				$field = $this->input->get('field');
			break;
			case'button';
				$field = $this->input->get('field');
			break;
			case'displayorder';
				$field = $this->input->get('field');
			break;
			case'widget_updated';
				$field = $this->input->get('field');
			break;
			case'widget_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'widget_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_widget ";
		$sql .= "WHERE 1 ";
		$sql .= "AND type = '$type' ";
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);	
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_widget ";
		$sql .= "WHERE 1 ";
		$sql .= "AND type = '$type' ";		
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['items'] = $rs[0]->num;
		$data['pages'] = ceil($rs[0]->num/$limit);
		
		return $data;
		
	}

	
	function get_id($widget_id)
	{
		$this->db->where('widget_id', $widget_id);
		$query = $this->db->get('cms_widget');
		return $query->result();
	}
	
	function get_lang($type, $lang, $property)
	{
				
		if($lang == $property[0]->lang){
			$sql = "SELECT * ";
			$sql .= "FROM cms_widget ";
			$sql .= "WHERE type = '$type' ";
			$sql .= "ORDER BY displayorder ";
			$query = $this->db->query($sql);
			return $query->result();
		}else{
			$sql = "SELECT ";
			$sql .= "cms_widget.icon, cms_widget.link, ";
			$sql .= "cms_widget_lang.title AS widget_title, thumbnail, ";
			$sql .= "cms_widget_lang.description AS widget_description ";
			$sql .= "FROM cms_widget, cms_widget_lang ";
			$sql .= "WHERE cms_widget.widget_id = cms_widget_lang.widget_id ";
			$sql .= "AND cms_widget.type = '$type' ";			
			$sql .= "AND cms_widget_lang.lang = '$lang' ";
			$sql .= "ORDER BY cms_widget.displayorder ";
			$query = $this->db->query($sql);
			return $query->result();
		}
	}	
	
	function insert_lang($arr){
		$this->db->insert('cms_widget_lang', $arr);
		return $this->db->insert_id();
	}
	
	function update_lang($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_widget_lang', $arr);
	}
	
	function delete_lang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_widget_lang');
	}
	
	function get_lang_id($widget_id, $lang)
	{
		$this->db->where('widget_id', $widget_id);
		$this->db->where('lang', $lang);
		$query = $this->db->get('cms_widget_lang');
		return $query->result();
	}
	
	function get_type_all($type)
	{
		$this->db->where('type', $type);
		$this->db->order_by('displayorder', 'asc');
		$query = $this->db->get('cms_widget');
		return $query->result();
	}
	
}