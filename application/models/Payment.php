<?php

class Payment extends CI_Model{

	function get_setting()
	{

		$q = $this->input->get('q');	
		switch($this->input->get('field'))
		{
			case'id';
				$field = $this->input->get('field');
			break;
			case'type';
				$field = $this->input->get('field');
			break;
			case'detail';
				$field = $this->input->get('field');
			break;
			case'updated';			
				$field = $this->input->get('field');
			break;
			default:
				$field = 'id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_payment_setting ";
		$sql .= "WHERE 1 ";
		$sql .= "AND ( type LIKE '%$q%' OR detail LIKE '%$q%') ";
		$sql .= "ORDER BY $field $sort ";
		$query = $this->db->query($sql);
		return $query->result();
	
	}
	
	function get_setting_arr()
	{
		$arr = array();
		$query = $this->db->get('cms_payment_setting');
		
		$rs = $query->result();
		foreach($rs as $index=>$value){
			$arr[$value->type] = $value;
		}
		
		return $arr;	
	}
	
	function get_setting_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('cms_payment_setting');
		return $query->result();
	}
	
	function setting_insert($arr)
	{
		$this->db->insert('cms_payment_setting', $arr);
		return $this->db->insert_id();
	}
	
	function setting_update($id, $arr)
	{
	
		$this->db->where('id', $id);
		$this->db->update('cms_payment_setting', $arr);
	}
	
	function get_setting_type($type)
	{
		$this->db->where('type', $type);
		$query = $this->db->get('cms_payment_setting');
		return $query->result();
	}
	
	function get_type(){
		$this->db->group_by('type');
		$query = $this->db->get('cms_payment_setting');
		return $query->result();		
	}
	
	
	function get()
	{
		$q = $this->input->get('q');
		
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		$limit = 20;
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'id';
				$field = $this->input->get('field');
			break;
			case'code';
				$field = $this->input->get('field');
			break;
			case'customer';
				$field = $this->input->get('field');
			break;
			case'customer_email';
				$field = $this->input->get('field');
			break;
			case'cost';
				$field = $this->input->get('field');
			break;
			case'tax';
				$field = $this->input->get('field');
			break;
			case'delivery';
				$field = $this->input->get('field');
			break;
			case'total';
				$field = $this->input->get('field');
			break;
			case'payment_type';
				$field = $this->input->get('field');
			break;
			case'payment_status';
				$field = $this->input->get('field');
			break;
			case'payment_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_payment ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( customer LIKE \"%$q%\" OR id LIKE \"%$q%\" OR customer_email LIKE \"%$q%\")  ";	
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_payment ";
		$sql .= "WHERE 1 ";
		if($q){
			$sql .= "AND ( customer LIKE \"%$q%\" OR id LIKE \"%$q%\" OR customer_email LIKE \"%$q%\")  ";	
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		
		return $data;
		
	}
	
	function get_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('cms_payment');
		return $query->result();
	}
	
	function insert($arr)
	{
		$this->db->insert('cms_payment', $arr);
		return $this->db->insert_id();
	}
	
	function update($id, $arr)
	{
		$this->db->where('id', $id);
		$this->db->update('cms_payment', $arr);
	}
	
	function get_sum_payment()
	{
		
		$sql = "SELECT ";
		$sql .= "SUM(total) AS sum_total ";
		$sql .= "FROM cms_payment ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		return $rs[0]->sum_total;
	}
	
	function get_payment_by_member($customer_email, $id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_payment ";
		$sql .= "WHERE customer_email = '$customer_email' ";
		$sql .= "AND id = '$id' ";
		$query = $this->db->query($sql);
		return $query->result(); 
	}
	
	function get_payment_by_email($customer_email)
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		
		$limit = 10;
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field')){
			case'id';
				$field = $this->input->get('field');
			break;
			case'code';
				$field = $this->input->get('field');
			break;
			case'customer';
				$field = $this->input->get('field');
			break;
			case'customer_delivery';
				$field = $this->input->get('field');
			break;
			case'customer_email';
				$field = $this->input->get('field');
			break;
			case'item';
				$field = $this->input->get('field');
			break;
			case'cost';
				$field = $this->input->get('field');
			break;
			case'tax';
				$field = $this->input->get('field');
			break;
			case'delivery';
				$field = $this->input->get('field');
			break;
			case'total';
				$field = $this->input->get('field');
			break;
			case'payment_type';
				$field = $this->input->get('field');
			break;
			case'payment_status';
				$field = $this->input->get('field');
			break;
			case'payment_entered';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_payment ";
		$sql .= "WHERE customer_email = '$customer_email' ";
		$sql .= "ORDER BY $field $sort ";
		$sql .= "Limit $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_payment ";
		$sql .= "WHERE customer_email = '$customer_email' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		
		return $data; 
	}
	
	function get_count()
	{
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_payment ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num;
	}
	
	function get_monthincome()
	{
	
		for($i=1; $i<=12; $i++){
			
			$date1 = date('Y-m-d', mktime(0,0,0,$i, 1, date('Y')));
			$date2 = date('Y-m-d', mktime(0,0,0,$i+1, 1, date('Y')));
			
			$sql = "SELECT SUM(total) AS sum_total ";
			$sql .= "FROM cms_payment ";
			$sql .= "WHERE payment_entered BETWEEN '$date1' AND  '$date2' ";	
			$query = $this->db->query($sql);
			$rs = $query->result();
			$data[$i] = $rs[0]->sum_total;
 		}
	
		return $data;
	}
	
	function get_monthorder()
	{
		$date1 = date('Y-m-d', mktime(0,0,0,date('m'), 1, date('Y')));
		$date2 = date('Y-m-d', mktime(0,0,0,date('m')+1, 1, date('Y')));
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_payment ";
		$sql .= "WHERE payment_entered BETWEEN '$date1' AND  '$date2' ";	
		$query = $this->db->query($sql);
		$rs = $query->result();	
		return $rs[0]->num;
	}
}