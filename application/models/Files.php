<?php

class Files extends CI_Model{
	
	function formatBytes($bytes) { 
		$units = array('B', 'KB', 'MB', 'GB', 'TB'); 

		if ($bytes >= 1073741824)	{
			$bytes = number_format($bytes / 1073741824, 2) . ' GB';
		}	elseif ($bytes >= 1048576){
			$bytes = number_format($bytes / 1048576, 2) . ' MB';
		}	elseif ($bytes >= 1024)	{
			$bytes = number_format($bytes / 1024, 2) . ' kB';
		}	elseif ($bytes > 1)	{
			$bytes = $bytes . ' bytes';
		}	elseif ($bytes == 1) {
			$bytes = $bytes . ' byte';
		}else{
			$bytes = '0 bytes';
		}
		
		return $bytes;
	} 	
	
	function scan($dir){
	
		$files = array();
	
		// Is there actually such a folder/file?
	
		if(file_exists($dir)){
		
			foreach(scandir($dir) as $f) {
			
				if(!$f || $f[0] == '.') {
					continue; // Ignore hidden files
				}
	
				if(is_dir($dir . '/' . $f)) {
	
					// The path is a folder
	
					$files[] = array(
						"name" => $f,
						"type" => "folder",
						"path" => $dir . '/' . $f,
						"items" => $this->scan($dir . '/' . $f) // Recursively get the contents of the folder
					);
				}
				
				else {
	
					// It is a file
	
					$files[] = array(
						"name" => $f,
						"type" => "file",
						"path" => $dir . '/' . $f,
						"size" => filesize($dir . '/' . $f) // Gets the size of this file
					);
				}
			}
		
		}
	
		return $files;
	}
}

