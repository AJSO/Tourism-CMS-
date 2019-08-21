<?php

class Social extends CI_Model{

	function socials(){
		
		$arr['facebook'] = 'Facebook';
		$arr['twitter'] = 'Twitter';
		$arr['google'] = 'Google+';
		$arr['instagram'] = 'Instagram';
		$arr['pinterest'] = 'Pinterest';
		$arr['linkedin'] = 'Linkedin';
		$arr['youtube'] = 'YouTube';
		
		return $arr;
	}
	

}