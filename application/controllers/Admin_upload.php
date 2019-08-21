<?php

class Admin_upload extends CI_Controller{

	var $module = 'upload';

	function image()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['property'] = $this->Property->get();
		
		$year_path = 'uploads/images/'.date('Y');
		$month_path = $year_path.'/'.date('m');
		$day_path = $month_path.'/'.date('d');
		
		if(is_dir($year_path) == false){mkdir($year_path,0777);}
		if(is_dir($month_path) == false){mkdir($month_path,0777);}
		if(is_dir($day_path) == false){mkdir($day_path,0777);}
		
		$i = 1;
		foreach($_FILES['images']['tmp_name'] as $index=>$value){
			
			if(is_file($_FILES['images']['tmp_name'][$index])){
				
				list($str, $ext) = explode('/',$_FILES['images']['type'][$index]);
				$filepath = $day_path.'/'.md5('image'.time().rand(0,1000)).'.'.$ext;
				
				$arr['session_id'] = $session_id;
				$arr['type'] = 'image';
				$arr['filetype'] = $_FILES['images']['type'][$index];
				$arr['filepath'] = $filepath;
				$arr['filedisplayorder'] = $i;
				$arr['fileentered'] = date('Y-m-d H:i:s');
				
				move_uploaded_file($_FILES['images']['tmp_name'][$index], $filepath);				
				
				$this->Upload->insert($arr);
				$this->Activity->msg($sess[0]->user_id, 'Upload image <a href="'.base_url().$filepath.'">'.base_url().$filepath.'</a>');
				$i++;
			}
		}		
	}
	
	function video()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;

		$year_path = 'uploads/videos/'.date('Y');
		$month_path = $year_path.'/'.date('m');
		$day_path = $month_path.'/'.date('d');
		
		if(is_dir($year_path) == false){mkdir($year_path,0777);}
		if(is_dir($month_path) == false){mkdir($month_path,0777);}
		if(is_dir($day_path) == false){mkdir($day_path,0777);}

		if(is_file($_FILES['video']['tmp_name'])){
			
			$sql = "DELETE FROM cms_upload WHERE session_id = '$session_id' AND type = 'video' ";
			$this->db->query($sql);
			
			list($str, $ext) = explode('/',$_FILES['video']['type']);
			$filepath = $day_path.'/'.md5('video'.time().rand(0,1000)).'.'.$ext;
			
			$arr['session_id'] = $session_id;
			$arr['type'] = 'video';
			$arr['filetype'] = $_FILES['video']['type'];
			$arr['filepath'] = $filepath;
			$arr['fileentered'] = date('Y-m-d H:i:s');
			
			move_uploaded_file($_FILES['video']['tmp_name'], $filepath);				
			
			$ffmpeg = 'ffmpeg';
			$path_file = dirname($_SERVER['SCRIPT_FILENAME']).'/'.$filepath;
			$video = $path_file;
			$image = $path_file.'.jpg';  
			
			$interval = rand(0,15);  
			$size = '800x450';  
			$cmd = "$ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";
			
			exec($cmd);
			
			$this->Upload->insert($arr);
			$this->Activity->msg($sess[0]->user_id, 'Upload video <a href="'.base_url().$filepath.'">'.base_url().$filepath.'</a>');
			
		}
	}
	
	function loadimage()
	{
		
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['images'] = $this->Media->get_session('image',$session_id);
		
		$this->load->view('admin/page.media.load.php',$data);
		
	}
	
	function loadvideo()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['video'] = $this->Media->get_session('video',$session_id);
		$data['property'] = $this->Property->get();
		
		$this->load->view('admin/page.media.load.video.php',$data);
	
	}
	
	function viewvideo()
	{
		$session_id = $this->Session->getcode();
		$sess = $this->Session->admin($session_id);
		$article_id = $this->input->get('article_id');
		
		$data['sess'] = $sess;
		$data['module'] = $this->module;
		$data['video'] = $this->Media->get_type('video', $article_id);//('video',$session_id);
		
		$this->load->view('admin/page.media.view.video.php',$data);	
	}
	
	function update(){
						
		$upload_id = $this->input->post('upload_id');
		$delete_id = $this->input->post('delete_id');
		$filecaption = $this->input->post('filecaption');
		$filedisplayorder = $this->input->post('filedisplayorder');
		
		foreach($upload_id as $index=>$value){

			
			if($delete_id[$index] == '1'){
				$this->Upload->delete($value);
			}else{
				$arr['filecaption'] = $filecaption[$index];
				$arr['filedisplayorder'] = $filedisplayorder[$index];
				$this->Upload->update($value, $arr);
			}
		}
	}
}