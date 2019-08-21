<?php

class Admin_currency extends CI_Controller{

	var $module = 'currency';
	
	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$property = $this->Property->get();
		
		$data['sess'] = $sess;	
		$data['property'] = $property;
		$data['module'] = $this->module;
		$data['currency'] = $this->Currency->get();
		$data['save'] = $this->input->get('save');
		
		switch($this->input->get('field'))
		{
			case'id';
				$field = $this->input->get('field');
			break;
			case'code';
				$field = $this->input->get('field');
			break;
			case'name';
				$field = $this->input->get('field');
			break;
			case'value_usd';
				$field = $this->input->get('field');
			break;
			case'active';
				$field = $this->input->get('field');
			break;
			case'updated';
				$field = $this->input->get('field');
			break;
			default:
			$field = '';
		}
		
		if($this->input->get('sort') == 'DESC'){
			$sort = 'ASC';
		}else{
			$sort = 'DESC';
		}
		
		$data['sort'] = $sort;
		$data['field'] = $field;
		
		$this->load->view('admin/page.currency.php', $data);	
		
	}
	
	function active()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		
		$id = $this->input->get('id');
		$arr['active'] = '1';
		$this->Currency->update($id, $arr);
		
		header('location: '.$_SERVER['HTTP_REFERER'].'?save=1');
		exit;
	}
	
	function inactive()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);

		$id = $this->input->get('id');
		$arr['active'] = '0';
		$this->Currency->update($id, $arr);

		header('location: '.$_SERVER['HTTP_REFERER'].'?save=1');
		exit;	
	}
	
	function update()
	{
		
		$data_uri = "http://usd.fx-exchange.com/rss.xml";
	
		$data_content = file_get_contents($data_uri);
		$xml = simplexml_load_string($data_content);
		$json = json_encode($xml);
		$data_arr = json_decode($json,true);
			
		if(is_array($data_arr['channel']['item'])){
			$exchange = $data_arr['channel']['item'];			
			$noticfy[] = $exchange[0]['pubDate'];
			
			foreach($exchange as $index=>$value){
				
				// code
				$data_code_arr = explode("/",$exchange[$index]['link']);
				$code = strtoupper($data_code_arr[3]);
		
				// name
				$data_name_arr = explode("/",$exchange[$index]['title']);
				$name = $data_name_arr[1];
				
				// usd value
				$data_value_arr = explode("=",$exchange[$index]['description']);
				$data_value_str = trim($data_value_arr[1]);
				$data_value_num = explode(" ",$data_value_str);
				$value_usd = $data_value_num[0];
								
				$sql = "UPDATE cms_currency \n";
				$sql .= "SET \n";
				$sql .= "value_usd = '$value_usd' \n";
				$sql .= "WHERE code = '$code' ";
				$this->db->query($sql);
			}
		}
		
		header('location:'.base_url().'admin/currency?save=1');
		exit;		
			
	}

}