<?php

class Upload extends CI_Model{

	function insert($arr)
	{	
		$this->db->insert('cms_upload', $arr);	
		return $this->db->insert_id();
	}
	
	function update($upload_id, $arr)
	{
		$this->db->where('upload_id', $upload_id);
		$this->db->update('cms_upload', $arr);		
	}

	function delete($upload_id)
	{
		$query = $this->db->get_where('cms_upload', array('upload_id'=>$upload_id));
		$rs = $query->result();
		
		@unlink($rs[0]->filepath);
		
		if(isset($rs[0]->filepath)){
			if(is_file($rs[0]->filepath.'.jpg')){
				@unlink($rs[0]->filepath.'.jpg');
			}
		}
		$sql = "DELETE FROM cms_upload WHERE upload_id = '$upload_id' \n";		
		$this->db->query($sql);
		
		$sql = "DELETE FROM cms_article_upload WHERE upload_id = '$upload_id' \n";
		$this->db->query($sql);

	}
	
	function get_id($upload_id)
	{
		$this->db->where('upload_id', $upload_id);
		$query = $this->db->get('cms_upload');
		return $query->result();
	}
}