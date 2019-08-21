<?php

class Activity extends CI_Model{
		
  public function __construct()
	{
		parent::__construct();
	}
	
	public function table()
	{
		$table = 'cms_user_activity_'.date('Y');
		return $table;
	}
	
	public function msg($user_id, $message)	
	{
		
		$table = $this->table();
		
		$sql = 'CREATE TABLE IF NOT EXISTS `'.$table.'` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`user_id` int(11) COLLATE utf8_unicode_ci NOT NULL,
		`message` text COLLATE utf8_unicode_ci NOT NULL,
		`entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
		) ';
		
		$this->db->query($sql);
		$message = addslashes($message);
		$this->db->insert($table, array('user_id'=>$user_id,'message'=>$message));
	}
	
	public function get($year)
	{

		$table = $this->table();
		
		$limit = 20;
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		$start = $page * $limit - $limit;

		$field = '';		
		switch($this->input->get('field')){
			case'message';
				$field = 'message';
			break;
			case'entered';
				$field = 'entered';
			break;
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM $table, cms_user ";
		$sql .= "WHERE $table.user_id = cms_user.user_id ";
		if($field){
			$sql .= "ORDER BY $field $sort ";	
		}else{
			$sql .= "ORDER BY id DESC ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$rows = $query->result();
				
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM $table, cms_user ";
		$sql .= "WHERE $table.user_id = cms_user.user_id ";
		$query = $this->db->query($sql);
		$rs = $query->result();		
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['rows'] = $rows;
		$data['items'] = $rs[0]->num;
		
		return $data;
	
	}
	
	public function get_by_user($user_id)
	{
		
		$data = array();
		$table = $this->table();
		$limit = $this->input->get('limit');
		if($limit == false){
			$limit = 10;
		}
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		$start = $page * $limit - $limit;

		$field = '';
		switch($this->input->get('field')){
			case'message';
				$field = 'message';
			break;
			case'entered';
				$field = 'entered';
			break;
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
			
		$sql = "SELECT * ";
		$sql .= "FROM $table ";
		$sql .= "WHERE 1 ";
		$sql .= "AND user_id = '$user_id' ";
		if($field){
			$sql .= "ORDER BY $field $sort ";	
		}else{
			$sql .= "ORDER BY id DESC ";
		}		
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$rows = $query->result();
				
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM $table ";
		$sql .= "WHERE 1 ";
		$sql .= "AND user_id = '$user_id' ";
		$query = $this->db->query($sql);
		$rs = $query->result();		
		
		if(isset($rs[0]->num)){
			$data['pages'] = ceil($rs[0]->num/$limit);
			$data['rows'] = $rows;
			$data['items'] = $rs[0]->num;
		}
		return $data;
	
	}
}