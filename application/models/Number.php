<?php

class Number extends CI_Model{

	function format($n, $precision = 1) {
		if ($n < 1000000) {
			if($n < 1000){
				$n_format = number_format($n);
			}else{
				$n_format = number_format($n/1000).'K';
			}
		} else if ($n < 1000000000) {
			$n_format = number_format($n / 1000000, $precision) . 'M';
		} else {
			$n_format = number_format($n / 1000000000, $precision) . 'B';
		}
		
		return $n_format;
	}

}