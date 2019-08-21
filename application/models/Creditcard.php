<?php

class Creditcard extends CI_Model{

	function get()
	{
		$arr = array('VISA', 'MasterCard');
		return $arr;
	}

}