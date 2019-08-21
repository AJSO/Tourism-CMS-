<?php 

class Term extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_term', $arr);
		return $this->db->insert_id();
	}
	
	function update($term_id, $arr)
	{
		$this->db->where('term_id', $term_id);
		$this->db->update('cms_term', $arr);
	}
	
	function delete($term_id)
	{
		$this->db->where('term_id', $term_id);
		$this->db->delete('cms_term');
	}

	function get_id($term_id)
	{
		$this->db->where('term_id', $term_id);
		$query = $this->db->get('cms_term');
		return $query->result();
	}
	
	function get()
	{
		$limit = 10;
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		$q = $this->input->get('q');
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'term_id';
				$field = $this->input->get('field');
			break;
			case'term_title';
				$field = $this->input->get('field');
			break;
			case'term_description';
				$field = $this->input->get('field');
			break;			
			case'term_default';
				$field = $this->input->get('field');
			break;			
			case'term_updated';
				$field = $this->input->get('field');
			break;			
			case'term_entered';
				$field = $this->input->get('field');
			break;			
			default:
				$field = 'term_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_term ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND (term_title LIKE '%$q%'  OR term_description LIKE '%$q%' ) ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_term ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND (term_title LIKE '%$q%'  OR term_description LIKE '%$q%' ) ";
		}
		$query = $this->db->query($sql);
		$rs  = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		
		return $data;
	}

	function get_lang_id($term_id, $lang)
	{
		$this->db->where('lang', $lang);
		$this->db->where('term_id', $term_id);
		$query = $this->db->get('cms_term_lang');
		return $query->result();
	}
	
	function insert_lang($arr)
	{
		$this->db->insert('cms_term_lang', $arr);
		return $this->db->insert_id();
	}
	
	function update_lang($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_term_lang', $arr);
	}
	
	function delete_lang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cms_term_lang');
	}

	function get_all()
	{
		$query = $this->db->get('cms_term');
		return $query->result();
	}
	
	function update_default($term_id)
	{
		$sql = "UPDATE cms_term SET term_default = 0 WHERE term_id != '$term_id' ";
		$this->db->query($sql);
	}

}