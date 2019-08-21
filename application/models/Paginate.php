<?php

class Paginate extends CI_Model{

	function pages($url, $page, $pages){
		$limit = 10;

		$rows = ceil($page/$limit);
		$start = $rows * $limit - $limit;

    $dis = '<div class="text-center">';
    $dis .= '<ul class="pagination">';
		
		if($start-1 > 0){
    	$dis .= '<li><a href="'.$url.'&page='.($start).'" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
		}
					
		$i = $start;
		for($i=1; $i<=$limit;$i++ ){
				
			if($start+$i == $page){
				$style = 'active';
			}else{
				$style = '';
			}
				
			if($start+$i <= $pages){
				$dis .= '<li class="'.$style.'"><a href="'.$url.'&page='.($start+$i).'">'.($start+$i)."</a></li>";
			}
		}
		
		if($start+$limit+1 < $pages){
     	$dis .= '<li> <a href="'.$url.'&page='.($start+$limit+1).'" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>';
    }
    $dis .= '</ul>';
    $dis .= '</div>';
  
		return $dis;
	}
	
	function backend($url, $page, $pages, $items)
	{
		$limit_pages = 10;
		$rows = ceil($page/$limit_pages);
		$start = $rows * $limit_pages - $limit_pages;
		$limit = $this->input->get('limit');
		if($limit == false){
			$limit = 10;
		}
		$start_item = $page * $limit - $limit;
	
		$dis = '<div class="fixed-table-pagination" style="display: block;">';
    $dis .= '<div class="row">';
    $dis .= '<div class="col-sm-6">';
		if($items > 0){
			$dis .= '<div class="pagination"  style="float:left !important">';
			$dis .= '<ul class="pagination">';
			$dis .= '<li> ';
			$dis .= '<span class="pagination-info">';
			if($page == 1){
				$dis .= 'Showing '.($start_item+1);
			}else{
				$dis .= 'Showing '.$start_item;
			}
			$dis .= ' to ';
			if($start_item + $limit <= $items){
				$dis .= ($start_item + $limit);
			}else{
				$dis .= $items;
			}
			
			if($items > 1){
				$dis .= ' of '.$items.' rows';
			}else{
				$dis .= ' of '.$items.' row';
			}
			$dis .= '</span>';
			$dis .= '<span class="page-list">';
			$dis .= '<span class="btn-group dropup">';
			$dis .= '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
			$dis .= '<span class="page-size">'.$limit.'</span> <span class="caret"></span>';
			$dis .= '</button>';
			list($base_url, $str) = explode('?',$url);
			$data = explode('&',$str);
			foreach($data as $index=>$value){
				list($a,$b) = explode('=',$value);
				$query_str[$a] = "$a=$b";
			}
			unset($query_str['limit']);
	
			$dis .= '<ul class="dropdown-menu" role="menu">';
			for($n=1; $n<=10; $n++){
				$num = 10* $n;		
				if($num == $limit){
					$active = 'active';
				}else{
					$active = '';
				}
				$dis .= '<li class="'.$active.'"><a href="'.$base_url.'?'.implode('&',$query_str).'&limit='.$num.'">'.$num.'</a></li>';
			}
			$dis .= '</ul>';
			$dis .= '</span> records per page</span> </li>';
			$dis .= '</ul>';
			$dis .= '</div>';
		}
    $dis .= '</div>';
    $dis .= '<div class="col-sm-6">';
	
		if($pages > 1){
			$dis .= '<div class="pagination">';
			$dis .= '<ul class="pagination">';
	
			if($start-1 > 0){
				$dis .= '<li  class="page-pre">';
				$dis .= '<a href="'.$base_url.'?'.implode('&',$query_str).'&page='.($start).'&limit='.$limit.'" aria-label="Previous">';
				$dis .= '<i class="font-icon font-icon-arrow-left"></i>';
				$dis .= '</a></li>';
			}else{
				$dis .= '<li class="page-pre">';
				$dis .= '<a href="javascript:void(0)"><i class="font-icon font-icon-arrow-left"></i></a>';
				$dis .= '</li>';
			}		
	
			$i = $start;
			for($i=1; $i<=$limit_pages;$i++ ){
					
				if($start+$i == $page){
					$style = 'active';
				}else{
					$style = '';
				}
					
				if($start+$i <= $pages){
					$dis .= '<li class="page-number '.$style.'">';
					$dis .= '<a href="'.$url.'&page='.($start+$i).'&limit='.$limit.'">'.($start+$i).'</a>';
					$dis .= '</li>';
				}
			}
	
			if($start+$limit_pages+1 < $pages){
				$dis .= '<li class="page-next"> <a href="'.$url.'&page='.($start+$limit_pages+1).'&limit='.$limit.'"> ';
				$dis .= '<i class="font-icon font-icon-arrow-right"></i> </a> </li>';
			}else{
				$dis .= '<li class="page-next"><a href="javascript:void(0)"><i class="font-icon font-icon-arrow-right"></i></a></li>';
			}
			$dis .= '</ul>';
			$dis .= '</div>';
		}
    $dis .= '</div>';
    $dis .= '</div>';
    $dis .= '</div>';
		return $dis;
	}
	
	function frontpages($url, $page, $pages){
		$limit = 10;

		$rows = ceil($page/$limit);
		$start = $rows * $limit - $limit;
				
		$dis = '<div class="pagination padding-bottom">';
		$dis .= '<div class="page-numbers">';
		$i = $start;
		for($i=1; $i<=$limit;$i++ ){

			if($start+$i == $page){
				$style = 'active';
			}else{
				$style = '';
			}
				
			if($start+$i <= $pages){
				$dis .= '<a href="'.$url.'&page='.($start+$i).'">'.($start+$i).'</a>';
			}

		}
		$dis .= '</div>';
		$dis .= '<div class="pager"> ';
		if($start-1 > 0){
			$dis .= '<a href="'.$url.'&page='.($start).'">'.$this->lang->line('Previous').'</a> ';
			$dis .= '<span>|</span> ';
		}
		if($start+$limit+1 < $pages){		
			$dis .= '<a href="'.$url.'&page='.($start+$limit+1).'">'.$this->lang->line('Next').'</a> ';
		}
		$dis .= '</div>';
		$dis .= '</div>';
		  
		return $dis;
	}

}