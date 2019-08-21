<?php
class Tour extends CI_Model{

	function get_type()
	{
    $arr[] = 'Active mobility';
    $arr[] = 'Audio tour';
    $arr[] = 'Boat tour';
    $arr[] = 'Animal rides';
  	$arr[] = 'Duck tour';
    $arr[] = 'Family entertainment center';
    $arr[] = 'Glass-bottom boat';
    $arr[] = 'Heritage trails';
    $arr[] = 'Hiking';
    $arr[] = 'Museum';
    $arr[] = 'Recreational travel';
    $arr[] = 'Road trip';
    $arr[] = 'Self-guided tour';
    $arr[] = 'Semi-submarine';
    $arr[] = 'Shopping';
    $arr[] = 'Staycation';
    $arr[] = 'Swimming with dolphins';
    $arr[] = 'Tax-free shopping';
    $arr[] = 'Tourist attraction';
    $arr[] = 'Travel';
    $arr[] = 'Vacation';
    $arr[] = 'Walking tour';
		
		return $arr;
	}
	
	function get_available_type($category)
	{
		$sql = "SELECT DISTINCT type FROM cms_tour WHERE tour_status = 1 AND category = '$category' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	
	function insert($arr)
	{
		$this->db->insert('cms_tour', $arr);
		return $this->db->insert_id();
	}
	
	function update($tour_id, $arr)
	{
		$this->db->where('tour_id', $tour_id);
		$this->db->update('cms_tour', $arr);
	}
	
	function delete($tour_id)
	{
		$this->db->where('tour_id', $tour_id);
		$this->db->delete('cms_tour');
	}
	
	function get()
	{
		$page = $this->input->get('page');
		if($page == false){ $page = 1; }
		
		$tour_status = $this->input->get('tour_status');
		$category = $this->input->get('category');
		
		$q = $this->input->get('q');
		$limit = 20;
		$start = $page * $limit - $limit;
		
		switch($this->input->get('field'))
		{
			case'tour_id';
				$field = $this->input->get('field');
			break;
			case'tour_code';
				$field = $this->input->get('field');
			break;
			case'tour_name';
				$field = $this->input->get('field');
			break;
			case'tour_description';
				$field = $this->input->get('field');
			break;
			case'tour_overview';
				$field = $this->input->get('field');
			break;
			case'tour_ specifications';
				$field = $this->input->get('field');
			break;
			case'tour_weight';
				$field = $this->input->get('field');
			break;
			case'tour_minorder';
				$field = $this->input->get('field');
			break;
			case'tour_price';
				$field = $this->input->get('field');
			break;
			case'tour_currency';
				$field = $this->input->get('field');
			break;
			case'tour_status';
				$field = $this->input->get('field');
			break;
			case'tour_updated';
				$field = $this->input->get('field');
			break;
			default:
				$field = 'tour_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$sql  = "SELECT * ";
		$sql .= "FROM cms_tour ";
		$sql .= "WHERE 1 ";
		if($category){
			$sql .= "AND category = '$category' ";
		}
		if($q){
			$sql .= "AND (";
			$sql .= "tour_code LIKE '%$q%' OR ";
			$sql .= "tour_name LIKE '%$q%' OR ";
			$sql .= "tour_description LIKE '%$q%' OR ";
			$sql .= "tour_overview LIKE '%$q%' OR ";
			$sql .= "tour_specifications LIKE '%$q%' ";
			$sql .= ")";
		}
		if($tour_status == '0'){
			$sql .= "AND tour_status = '0' ";
		}else if($tour_status == '1'){
			$sql .= "AND tour_status = '1' ";
		}
		$sql .= "ORDER BY $field $sort ";
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		$sql  = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_tour ";
		$sql .= "WHERE 1 ";
		if($category){
			$sql .= "AND category = '$category' ";
		}		
		if($q){
			$sql .= "AND (";
			$sql .= "tour_code LIKE '%$q%' OR ";
			$sql .= "tour_name LIKE '%$q%' OR ";
			$sql .= "tour_description LIKE '%$q%' OR ";
			$sql .= "tour_overview LIKE '%$q%' OR ";
			$sql .= "tour_specifications LIKE '%$q%' ";
			$sql .= ")";
		}
		if($tour_status == '0'){
			$sql .= "AND tour_status = '0' ";
		}else if($tour_status == '1'){
			$sql .= "AND tour_status = '1' ";
		}
		$query = $this->db->query($sql);
		$rs = $query->result();
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		
		return $data;
	}
	
	function get_id($tour_id)
	{
		$this->db->where('tour_id', $tour_id);
		$query = $this->db->get('cms_tour');
		return $query->result();
	}

	function insert_rate($arr)
	{
		$this->db->insert('cms_tour_rate', $arr);	
		return $this->db->insert_id();
	}
	
	function update_rate($rate_id, $arr)
	{
		$this->db->where('rate_id', $rate_id);
		$this->db->update('cms_tour_rate', $arr);
	}
	
	function get_rate($tour_id)
	{
		$rate = array();
		
		$this->db->where('tour_id', $tour_id);
		$query = $this->db->get('cms_tour_rate');
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			$rate[$value->period_id] = $value;
		}
		return $rate;
		
	}
	
	function get_category($category)
	{
		
		switch($this->input->get('field')){
			default:
				$field = 'tour_id';
		}
		
		if($this->input->get('sort') == 'ASC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$page = $this->input->get('page');
		if($page == false){ $page = 1;}
		$limit = 20;
		$start = $page * $limit - $limit;
		$destination_id = $this->input->get('destination_id');
		$type = $this->input->get('type');
		
		$sql = "SELECT *, cms_tour.thumbnail AS thumbnail ";
		$sql .= "FROM cms_tour, cms_destination, cms_country ";
		$sql .= "WHERE tour_status = 1 ";
		$sql .= "AND cms_destination.destination_country = cms_country.code ";
		$sql .= "AND cms_tour.destination_id = cms_destination.destination_id ";
		$sql .= "AND category = '$category' ";
		if($this->input->get('min_rate_select') && $this->input->get('max_rate_select')){
			$min_rate_select = $this->input->get('min_rate_select');
			$max_rate_select = $this->input->get('max_rate_select');
			$sql .= "AND (";
			$sql .= "tour_price >= '$min_rate_select' AND ";
			$sql .= "tour_price <= '$max_rate_select' ";			
			$sql .= ")";
		}
		if($destination_id){
			$sql .= "AND cms_tour.destination_id = '$destination_id' ";
		}
		if($type){
			$sql .= "AND type = '$type' ";
		}
		if($this->input->get('rating')){
			$rating = $this->input->get('rating');
			$sql .= "AND tour_rating IN (".implode(',',$rating).") ";
		}
		if($this->input->get('sort_price') || $this->input->get('sort_rating')){
			
			if($this->input->get('sort_price')){
				if($this->input->get('sort_price') == 'asc'){
					$sql .= "ORDER BY tour_price ASC ";
				}else{
					$sql .= "ORDER BY tour_price DESC ";			
				}
			}
			
			if($this->input->get('sort_rating')){
				if($this->input->get('sort_rating') == 'asc'){
					$sql .= "ORDER BY tour_rating ASC ";
				}else{
					$sql .= "ORDER BY tour_rating DESC ";			
				}
			}
			
		}else{
			$sql .= "ORDER BY $field $sort ";
		}
		$sql .= "LIMIT $start, $limit ";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_tour ";
		$sql .= "WHERE tour_status = 1 ";
		if($this->input->get('min_rate_select') && $this->input->get('max_rate_select')){
			$min_rate_select = $this->input->get('min_rate_select');
			$max_rate_select = $this->input->get('max_rate_select');
			$sql .= "AND (";
			$sql .= "tour_price >= '$min_rate_select' AND ";
			$sql .= "tour_price <= '$max_rate_select' ";			
			$sql .= ")";
		}
		if($destination_id){
			$sql .= "AND destination_id = '$destination_id' ";
		}
		if($type){
			$sql .= "AND type = '$type' ";
		}
		if($this->input->get('rating')){
			$rating = $this->input->get('rating');
			$sql .= "AND tour_rating IN (".implode(',',$rating).") ";
		}
		
		$sql .= "AND category = '$category' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		$data['pages'] = ceil($rs[0]->num/$limit);
		$data['items'] = $rs[0]->num;
		
		return $data;
		
	}

	function get_slug($slug)
	{
		$this->db->where('tour_slug', $slug);
		$query = $this->db->get('cms_tour');
		return $query->result();
	}


	function rate_period($tour_id, $destination_id, $checkin)
	{
	
		$stamp = strtotime($checkin);
		$current_time = mktime(0,0,0,date('m'),date('d'),date('Y'));
		list($y,$m,$d) = explode('-',$checkin);

		$sql = "SELECT * FROM cms_destination_period WHERE destination_id = '$destination_id' ";
		$query = $this->db->query($sql);	
		$rs = $query->result();
		foreach($rs as $index=>$value){

			if(
			mktime(0,0,0,$value->mm1,$value->dd1, date('Y')) <= mktime(0,0,0,date('m'),date('d'), date('Y')) &&
			mktime(0,0,0,$value->mm2,$value->dd2, date('Y')) <= mktime(0,0,0,date('m'),date('d'), date('Y'))
			){
				$yy1 = date('Y')+1;
				$yy2 = date('Y')+1;
				$next_year = true;
			}else{
				
				if($value->mm1 > $value->mm2){
					$yy1 = date('Y');
					$yy2 = date('Y')+1;
				}else{
					$yy1 = date('Y');
					$yy2 = date('Y');
				}
			}
			
			if($stamp >= mktime(0,0,0,$value->mm1,$value->dd1,$yy1) && $stamp <= mktime(0,0,0,$value->mm2,$value->dd2,$yy2)){
				$period_id = $value->period_id;
			}

		}
		
		if(isset($period_id)){		
			$sql = "SELECT * ";
			$sql .= "FROM cms_tour_rate ";
			$sql .= "WHERE tour_id = '$tour_id' ";
			$sql .= "AND period_id = '$period_id' ";
			$query = $this->db->query($sql);	
			return $query->result();		
		}else{
			return 0;
		}
	}

	function get_min_max($category)
	{
		
		$destination_id = $this->input->get('destination_id');
		$sql = "SELECT MIN(tour_price) AS min_rate, MAX(tour_price) AS max_rate ";
		$sql .= "FROM cms_tour ";
		$sql .= "WHERE tour_status = 1 ";
		if($destination_id){
			$sql .= "AND destination_id = '$destination_id' ";
		}
		$sql .= "AND category = '$category' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_destination($category)
	{
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_destination, cms_tour, cms_country ";
		$sql .= "WHERE cms_destination.destination_id = cms_tour.destination_id ";
		$sql .= "AND cms_tour.tour_status = '1' ";
		$sql .= "AND cms_destination.destination_country = cms_country.code ";
		$sql .= "AND cms_tour.category = '$category' ";
		$sql .= "GROUP BY cms_destination.destination_id ";
		$sql .= "ORDER BY cms_country.name, cms_destination.destination_name ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function count_active()
	{
		
		$sql = "SELECT COUNT(*) AS num ";
		$sql .= "FROM cms_tour ";
		$sql .= "WHERE tour_status = '1' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0]->num;
	}
	
	function get_tour_destination($destination_id)
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_tour ";
		$sql .= "WHERE 1 ";
		$sql .= "AND cms_tour.tour_status = '1' ";
		$sql .= "AND cms_tour.destination_id = '$destination_id' ";
		$sql .= "ORDER BY tour_id DESC ";
		$sql .= "LIMIT 0, 4";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_all($destination_id)
	{
		$this->db->where('destination_id', $destination_id);
		$this->db->where('tour_status',1);
		$this->db->order_by('tour_name', 'asc');
		$query = $this->db->get('cms_tour');
		return $query->result();
	}
	
	function get_related($tour_id, $destination_id, $type)
	{	
		$this->db->where('destination_id', $destination_id);
		$this->db->where('type', $type);
		$this->db->where('tour_status', 1);
		$this->db->where('tour_id !=', $tour_id);
		$query = $this->db->get('cms_tour', 4, 0);	
		return $query->result();
	}

}