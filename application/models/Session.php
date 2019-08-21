<?php

class Session extends CI_Model{
	
	function getcode(){
		
		if(empty($_SESSION['mysession_id'])){
			
			$str = 'abcdefghijklmnopqrstuvwxyz';
			$str .= strtoupper($str);
			$str .= '0123456789';
			
			$ss = '';
			
			for($i=1; $i<= 15; $i++){
				$ss .= substr($str,rand(0,strlen($str)),1);
			}
			
			$_SESSION['mysession_id'] = $ss;
						
		}else{
			$ss = $_SESSION['mysession_id'];
		}
		
		setcookie('mysession_id',$ss, time()+(86400*30));
		return $ss;
		
	}

	function admin($session_id){
		
		
		if(isset($_COOKIE['session_id'])){
			$session_id = $_COOKIE['session_id'];
		}
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_user, session_admin ";
		$sql .= "WHERE cms_user.user_id = session_admin.user_id ";
		$sql .= "AND session_admin.session_id = '$session_id' ";
		$sql .= "AND session_admin.logout = '0' ";
		
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		if(empty($rs[0]->user_id)){ 
			header('location: '.base_url().'admin/login');
			exit;
		}
		
		return $rs;
		
	}
	
	function admin_check($email, $password){
		
		$query = $this->db->get_where('cms_user', array('email'=>$email, 'password'=>$password, 'user_active'=>1));
		$rs = $query->result();
		if($rs){
			return $rs;
		}else{
			return false;
		}
	}
	
	function admin_logout($session_id){
		
		$this->db->where('session_id',$session_id);
		$this->db->update('session_admin', array('logout'=>1));
		
	}
	
	function admin_insert($arr){
		
		$this->db->insert('session_admin',$arr);
		return $this->db->insert_id();
		
	}
	
	
	function admin_update($session_id, $arr){
		
		$this->db->where('session_id', $session_id);
		$this->db->update('session_admin', $arr);
		
	}
		
	function web($session_id)
	{
		
		$table = 'session_website';
		
		$sql = "CREATE TABLE IF NOT EXISTS `".$table."` ( \n";
		$sql .= "`id` int(11) NOT NULL AUTO_INCREMENT,\n";
		$sql .= "`session_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,\n";
		$sql .= "`member_id` int(11) NOT NULL,\n";
		$sql .= "`ipaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,\n";
		$sql .= "`action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,\n";
		$sql .= "`currency` varchar(2) COLLATE utf8_unicode_ci NOT NULL, \n";
		$sql .= "`login` int(11) NOT NULL,\n";
		$sql .= "`logout` int(11) NOT NULL,\n";
		$sql .= "`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,\n";
		$sql .= "`entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',\n";
		$sql .= "PRIMARY KEY (`id`)\n";
		$sql .= ")";
		$this->db->query($sql);
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_member, ".$table." ";
		$sql .= "WHERE cms_member.member_id = ".$table.".member_id ";
		$sql .= "AND ".$table.".session_id = '$session_id' ";
		$sql .= "AND ".$table.".logout = '0' ";
		
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		if(!$rs){
			header('location:'.base_url().'signin');
			exit;
		}
				
		return $rs;
	
	}

	function web_insert($arr)
	{
		$table = 'session_website_'.date('Y');
		$this->db->insert($table, $arr);
		return $this->db->insert_id();
	}

	function web_logout($session_id)
	{
		$table = 'session_website_'.date('Y');		
		$this->db->where('session_id', $session_id);
		$this->db->update($table, array('logout'=>1));
		
	}
	
	function web_track($session_id)
	{
		$table = 'session_website';		

		$sql = "SELECT * ";
		$sql .= "FROM ".$table." ";
		$sql .= "WHERE 1 ";
		$sql .= "AND session_id = '$session_id' ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		if(isset($rs[0]->session_id)){
			return $rs;		
		}else{
			$property = $this->Property->get();
			
			$arr['session_id'] = $session_id;
			$arr['currency'] = $property[0]->currency;
			$arr['lang'] = $property[0]->lang;
			$arr['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$arr['entered'] = date('Y-m-d H:i:s');
			$this->db->insert($table, $arr);

			$sql = "SELECT * ";
			$sql .= "FROM ".$table." ";
			$sql .= "WHERE 1 ";
			$sql .= "AND session_id = '$session_id' ";
			$query = $this->db->query($sql);
			$rs = $query->result();
			return $rs;
		}
	}
	
	function web_track_update($session_id, $arr)
	{
		
		$table = 'session_website';		
		$this->db->where('session_id', $session_id);
		$this->db->update($table, $arr);	
		
	}
	
	function web_track_delete($session_id){
		$table = 'session_website';		
		$this->db->where('session_id', $session_id);
		$this->db->delete($table);	
	}
	
	function get_count_web()
	{
		$table = 'session_website';		
		
		$sql = "SELECT COUNT(*) AS num ";	
		$sql .= "FROM $table ";
		$query = $this->db->query($sql);
		$rs = $query->result();
		
		return $rs[0]->num;
	}
		
}