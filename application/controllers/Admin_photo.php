<?php 

class Admin_photo extends CI_Controller{

	var $module = 'photo';

	function index()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		
		$yy = $this->Media->get_folder('image');
		$data['yy1'] = substr($yy[0]->mindate,0,4);
		$data['yy2'] = substr($yy[0]->maxdate,0,4);
		
		$this->load->view('admin/page.media.photo.php',$data);
	
	}
		
}