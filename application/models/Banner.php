<?php
class Banner extends CI_Model{

	function insert($arr)
	{
		$this->db->insert('cms_banner', $arr);
		return $this->db->insert_id();
	}
	
	function update($banner_id, $arr)
	{
		$this->db->where('banner_id', $banner_id);
		$this->db->update('cms_banner', $arr);
	}
	
	function delete($banner_id)
	{
	
		$this->db->where('banner_id',$banner_id);
		$this->db->delete('cms_banner');
	
	}
	
	function get_type()
	{
		
		$arr[] = '482x180';
		$arr[] = '336x180';
		$arr[] = '848x201';
				
		return $arr;	
	}
	
	function get_id($banner_id)
	{
		$this->db->where('banner_id', $banner_id);
		$query = $this->db->get('cms_banner');
		return $query->result();
	}
	
	function get()
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$q = $this->input->get('q');
		$banner_type = $this->input->get('banner_type');
		$limit = 10;
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'banner_id';
				$field = $this->input->get('field');
			break;
			case'banner_name';
				$field = $this->input->get('field');
			break;
			case'banner';
				$field = $this->input->get('field');
			break;
			case'banner_type';
				$field = $this->input->get('field');
			break;
			case'banner_link';
				$field = $this->input->get('field');
			break;
			case'banner_target';
				$field = $this->input->get('field');
			break;
			case'banner_displayorder';
				$field = $this->input->get('field');
			break;
			case'banner_on';
				$field = $this->input->get('field');
			break;
			case'banner_off';
				$field = $this->input->get('field');
			break;
			case'banner_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'banner_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_banner ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "banner_name LIKE '%$q%' OR ";
			$sql .= "banner_type LIKE '%$q%' OR ";
			$sql .= "banner_link LIKE '%$q%' ";
			$sql .= ")";
		}
		if($banner_type){
			$sql .= "AND banner_type = '$banner_type' ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_banner ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( ";
			$sql .= "banner_name LIKE '%$q%' OR ";
			$sql .= "banner_type LIKE '%$q%' OR ";
			$sql .= "banner_link LIKE '%$q%' ";
			$sql .= ")";
		}
		if($banner_type){
			$sql .= "AND banner_type = '$banner_type' ";
		}
		$query= $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		return $data;
	}
	
	function get_by_type($banner_type)
	{
		$this->db->where('banner_type', $banner_type);
		$this->db->order_by('banner_id','desc');
		$query = $this->db->get('cms_banner');
		return $query->result();
	}

}