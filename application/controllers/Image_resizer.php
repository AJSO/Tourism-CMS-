<?php

class Image_resizer extends CI_Controller{

	public function findSharp($orig, $final) // function from Ryan Rud (http://adryrun.com)
	{
		$final	= $final * (750.0 / $orig);
		$a		= 52;
		$b		= -0.27810650887573124;
		$c		= .00047337278106508946;
		
		$result = $a + $b * $final + $c * $final * $final;
		
		return max(round($result), 0);
	} // findSharp()
	
	public function doConditionalGet($etag, $lastModified)
	{
		header("Last-Modified: $lastModified");
		header("ETag: \"{$etag}\"");
			
		$if_none_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ?
			stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) : 
			false;
		
		$if_modified_since = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ?
			stripslashes($_SERVER['HTTP_IF_MODIFIED_SINCE']) :
			false;
		
		if (!$if_modified_since && !$if_none_match)
			return;
		
		if ($if_none_match && $if_none_match != $etag && $if_none_match != '"' . $etag . '"')
			return; 
		
		if ($if_modified_since && $if_modified_since != $lastModified)
			return;
		
		header('HTTP/1.1 304 Not Modified');
		exit();
	}
	
	function index($name, $size){
				
		define('MEMORY_TO_ALLOCATE',	'100M');
		define('DEFAULT_QUALITY',		90);
		define('CURRENT_DIR',			dirname($_SERVER['SCRIPT_FILENAME']));
		define('CACHE_DIR_NAME',		'/application/cache/');
		define('CACHE_DIR',				CURRENT_DIR . CACHE_DIR_NAME);
		define('DOCUMENT_ROOT',			dirname($_SERVER['SCRIPT_FILENAME']));
		
		//$image			= preg_replace('/^(s?f|ht)tps?:\/\/[^\/]+/i', '', (string) $_GET['image']);
		
		$rs = $this->Media->get_slug($name);		
		$image = '/'.$rs[0]->filepath;
		list($_GET['width'], $_GET['height']) = explode('x',$size);
		$_GET['cropratio'] = ($_GET['width']/$_GET['height']).':1';
		
		
		if ($image{0} != '/' || strpos(dirname($image), ':') || preg_match('/(\.\.|<|>)/', $image))
		{
			header('HTTP/1.1 400 Bad Request');
			echo 'Error: malformed image path. Image paths must begin with \'/\'';
			exit();
		}
		if (!$image)
		{
			header('HTTP/1.1 400 Bad Request');
			echo 'Error: no image was specified';
			exit();
		}
		
		$docRoot	= preg_replace('/\/$/', '', DOCUMENT_ROOT);
		
		if (!file_exists($docRoot . $image))
		{
			header('HTTP/1.1 404 Not Found');
			echo 'Error: image does not exist: ' . $docRoot . $image;
			exit();
		}
		
		$size	= GetImageSize($docRoot . $image);
		$mime	= $size['mime'];
		
		if (substr($mime, 0, 6) != 'image/')
		{
			header('HTTP/1.1 400 Bad Request');
			echo 'Error: requested file is not an accepted type: ' . $docRoot . $image;
			exit();
		}
		
		$width			= $size[0];
		$height			= $size[1];
		
		$maxWidth		= (isset($_GET['width'])) ? (int) $_GET['width'] : 0;
		$maxHeight		= (isset($_GET['height'])) ? (int) $_GET['height'] : 0;
		
		if (isset($_GET['color']))
			$color		= preg_replace('/[^0-9a-fA-F]/', '', (string) $_GET['color']);
		else
			$color		= FALSE;
		
		if (!$maxWidth && $maxHeight)
		{
			$maxWidth	= 99999999999999;
		}
		elseif ($maxWidth && !$maxHeight)
		{
			$maxHeight	= 99999999999999;
		}
		elseif ($color && !$maxWidth && !$maxHeight)
		{
			$maxWidth	= $width;
			$maxHeight	= $height;
		}
		
		if ((!$maxWidth && !$maxHeight) || (!$color && $maxWidth >= $width && $maxHeight >= $height))
		{
			$data	= file_get_contents($docRoot . '/' . $image);
			
			$lastModifiedString	= gmdate('D, d M Y H:i:s', filemtime($docRoot . '/' . $image)) . ' GMT';
			$etag = md5($data);
			
			$this->doConditionalGet($etag, $lastModifiedString);
			
			header("Content-type: $mime");
			header('Content-Length: ' . strlen($data));
			
			$image_arr['data'] = $data;
			$this->load->view('website/image.php', $image_arr);
		}
		
		$offsetX	= 0;
		$offsetY	= 0;
		
		if (isset($_GET['cropratio']))
		{
			$cropRatio		= explode(':', (string) $_GET['cropratio']);
			if (count($cropRatio) == 2)
			{
				$ratioComputed		= $width / $height;
				$cropRatioComputed	= (float) $cropRatio[0] / (float) $cropRatio[1];
				
				if ($ratioComputed < $cropRatioComputed)
				{ 
					$origHeight	= $height;
					$height		= $width / $cropRatioComputed;
					$offsetY	= ($origHeight - $height) / 2;
				}
				else if ($ratioComputed > $cropRatioComputed)
				{ 
					$origWidth	= $width;
					$width		= $height * $cropRatioComputed;
					$offsetX	= ($origWidth - $width) / 2;
				}
			}
		}
		
		$xRatio		= $maxWidth / $width;
		$yRatio		= $maxHeight / $height;
		
		if ($xRatio * $height < $maxHeight)
		{
			$tnHeight	= ceil($xRatio * $height);
			$tnWidth	= $maxWidth;
		}
		else
		{
			$tnWidth	= ceil($yRatio * $width);
			$tnHeight	= $maxHeight;
		}
		
		$quality	= (isset($_GET['quality'])) ? (int) $_GET['quality'] : DEFAULT_QUALITY;
		$resizedImageSource		= $tnWidth . 'x' . $tnHeight . 'x' . $quality;
		
		if ($color)
			$resizedImageSource	.= 'x' . $color;
		if (isset($_GET['cropratio']))
			$resizedImageSource	.= 'x' . (string) $_GET['cropratio'];
		$resizedImageSource		.= '-' . $image;
		
		$resizedImage	= md5($resizedImageSource);
			
		$resized		= CACHE_DIR . $resizedImage;
		
		if (!isset($_GET['nocache']) && file_exists($resized))
		{
			$imageModified	= filemtime($docRoot . $image);
			$thumbModified	= filemtime($resized);
			
			if($imageModified < $thumbModified) {
				$data	= file_get_contents($resized);
			
				$lastModifiedString	= gmdate('D, d M Y H:i:s', $thumbModified) . ' GMT';
				$etag				= md5($data);
				
				$this->doConditionalGet($etag, $lastModifiedString);
				
				header("Content-type: $mime");
				header('Content-Length: ' . strlen($data));
				$image_arr['data'] = $data;
				$this->load->view('website/image.php', $image_arr);
			}
		}
		
		ini_set('memory_limit', MEMORY_TO_ALLOCATE);
		
		$dst	= imagecreatetruecolor($tnWidth, $tnHeight);
		
		switch ($size['mime'])
		{
			case 'image/gif':
				$creationFunction	= 'ImageCreateFromGif';
				$outputFunction		= 'ImagePng';
				$mime				= 'image/png';
				$doSharpen			= FALSE;
				$quality			= round(10 - ($quality / 10)); 
			break;
			
			case 'image/x-png':
			case 'image/png':
				$creationFunction	= 'ImageCreateFromPng';
				$outputFunction		= 'ImagePng';
				$doSharpen			= FALSE;
				$quality			= round(10 - ($quality / 10));
			break;
			
			default:
				$creationFunction	= 'ImageCreateFromJpeg';
				$outputFunction	 	= 'ImageJpeg';
				$doSharpen			= TRUE;
			break;
		}
		
		$src	= $creationFunction($docRoot . $image);
		
		if (in_array($size['mime'], array('image/gif', 'image/png')))
		{
			if (!$color)
			{
				imagealphablending($dst, false);
				imagesavealpha($dst, true);
			}
			else
			{
				if ($color[0] == '#')
					$color = substr($color, 1);
				
				$background	= FALSE;
				
				if (strlen($color) == 6)
					$background	= imagecolorallocate($dst, hexdec($color[0].$color[1]), hexdec($color[2].$color[3]), hexdec($color[4].$color[5]));
				else if (strlen($color) == 3)
					$background	= imagecolorallocate($dst, hexdec($color[0].$color[0]), hexdec($color[1].$color[1]), hexdec($color[2].$color[2]));
				if ($background)
					imagefill($dst, 0, 0, $background);
			}
		}
		
		ImageCopyResampled($dst, $src, 0, 0, $offsetX, $offsetY, $tnWidth, $tnHeight, $width, $height);
		
		if ($doSharpen)
		{
			$sharpness	= $this->findSharp($width, $tnWidth);
			
			$sharpenMatrix	= array(
				array(-1, -2, -1),
				array(-2, $sharpness + 12, -2),
				array(-1, -2, -1)
			);
			$divisor		= $sharpness;
			$offset			= 0;
			imageconvolution($dst, $sharpenMatrix, $divisor, $offset);
		}
		
		if (!file_exists(CACHE_DIR))
			mkdir(CACHE_DIR, 0755);
		
		if (!is_readable(CACHE_DIR))
		{
			header('HTTP/1.1 500 Internal Server Error');
			echo 'Error: the cache directory is not readable';
			exit();
		}
		else if (!is_writable(CACHE_DIR))
		{
			header('HTTP/1.1 500 Internal Server Error');
			echo 'Error: the cache directory is not writable';
			exit();
		}
		
		// Write the resized image to the cache
		$outputFunction($dst, $resized, $quality);
		
		ob_start();
		$outputFunction($dst, null, $quality);
		$data	= ob_get_contents();
		ob_end_clean();
		
		ImageDestroy($src);
		ImageDestroy($dst);
		
		$lastModifiedString	= gmdate('D, d M Y H:i:s', filemtime($resized)) . ' GMT';
		$etag				= md5($data);
		
		$this->doConditionalGet($etag, $lastModifiedString);
		
		header("Content-type: $mime");
		header('Content-Length: ' . strlen($data));
		
		$image_arr['data'] = $data;
		$this->load->view('website/image.php', $image_arr);
		
	}

	function slide($upload_id, $size){
				
		define('MEMORY_TO_ALLOCATE',	'100M');
		define('DEFAULT_QUALITY',		90);
		define('CURRENT_DIR',			dirname($_SERVER['SCRIPT_FILENAME']));
		define('CACHE_DIR_NAME',		'/application/cache/');
		define('CACHE_DIR',				CURRENT_DIR . CACHE_DIR_NAME);
		define('DOCUMENT_ROOT',			dirname($_SERVER['SCRIPT_FILENAME']));

		$this->db->where('upload_id', $upload_id);
		$query = $this->db->get('cms_upload');
		$rs = $query->result();
		
		if(!$rs[0]->filepath || is_file($rs[0]->filepath) == false){
			header('location:'.base_url().'assets/frontend/images/blank.png');
			exit;
		}
		
		$image = '/'.$rs[0]->filepath;
		
		list($_GET['width'], $_GET['height']) = explode('x',$size);
		$_GET['cropratio'] = ($_GET['width']/$_GET['height']).':1';
		
		
		if ($image{0} != '/' || strpos(dirname($image), ':') || preg_match('/(\.\.|<|>)/', $image))
		{
			header('HTTP/1.1 400 Bad Request');
			echo 'Error: malformed image path. Image paths must begin with \'/\'';
			exit();
		}
		if (!$image)
		{
			header('HTTP/1.1 400 Bad Request');
			echo 'Error: no image was specified';
			exit();
		}
		
		$docRoot	= preg_replace('/\/$/', '', DOCUMENT_ROOT);
		
		if (!file_exists($docRoot . $image))
		{
			header('HTTP/1.1 404 Not Found');
			echo 'Error: image does not exist: ' . $docRoot . $image;
			exit();
		}
		
		$size	= GetImageSize($docRoot . $image);
		$mime	= $size['mime'];
		
		if (substr($mime, 0, 6) != 'image/')
		{
			header('HTTP/1.1 400 Bad Request');
			echo 'Error: requested file is not an accepted type: ' . $docRoot . $image;
			exit();
		}
		
		$width			= $size[0];
		$height			= $size[1];
		
		$maxWidth		= (isset($_GET['width'])) ? (int) $_GET['width'] : 0;
		$maxHeight		= (isset($_GET['height'])) ? (int) $_GET['height'] : 0;
		
		if (isset($_GET['color']))
			$color		= preg_replace('/[^0-9a-fA-F]/', '', (string) $_GET['color']);
		else
			$color		= FALSE;
		
		if (!$maxWidth && $maxHeight)
		{
			$maxWidth	= 99999999999999;
		}
		elseif ($maxWidth && !$maxHeight)
		{
			$maxHeight	= 99999999999999;
		}
		elseif ($color && !$maxWidth && !$maxHeight)
		{
			$maxWidth	= $width;
			$maxHeight	= $height;
		}
		
		if ((!$maxWidth && !$maxHeight) || (!$color && $maxWidth >= $width && $maxHeight >= $height))
		{
			$data	= file_get_contents($docRoot . '/' . $image);
			
			$lastModifiedString	= gmdate('D, d M Y H:i:s', filemtime($docRoot . '/' . $image)) . ' GMT';
			$etag				= md5($data);
			
			$this->doConditionalGet($etag, $lastModifiedString);
			
			header("Content-type: $mime");
			header('Content-Length: ' . strlen($data));
			
			$image_arr['data'] = $data;
			$this->load->view('website/image.php', $image_arr);
		}
		
		$offsetX	= 0;
		$offsetY	= 0;
		
		if (isset($_GET['cropratio']))
		{
			$cropRatio		= explode(':', (string) $_GET['cropratio']);
			if (count($cropRatio) == 2)
			{
				$ratioComputed		= $width / $height;
				$cropRatioComputed	= (float) $cropRatio[0] / (float) $cropRatio[1];
				
				if ($ratioComputed < $cropRatioComputed)
				{ 
					$origHeight	= $height;
					$height		= $width / $cropRatioComputed;
					$offsetY	= ($origHeight - $height) / 2;
				}
				else if ($ratioComputed > $cropRatioComputed)
				{ 
					$origWidth	= $width;
					$width		= $height * $cropRatioComputed;
					$offsetX	= ($origWidth - $width) / 2;
				}
			}
		}
		
		$xRatio		= $maxWidth / $width;
		$yRatio		= $maxHeight / $height;
		
		if ($xRatio * $height < $maxHeight)
		{
			$tnHeight	= ceil($xRatio * $height);
			$tnWidth	= $maxWidth;
		}
		else
		{
			$tnWidth	= ceil($yRatio * $width);
			$tnHeight	= $maxHeight;
		}
		
		$quality	= (isset($_GET['quality'])) ? (int) $_GET['quality'] : DEFAULT_QUALITY;
		$resizedImageSource		= $tnWidth . 'x' . $tnHeight . 'x' . $quality;
		
		if ($color)
			$resizedImageSource	.= 'x' . $color;
		if (isset($_GET['cropratio']))
			$resizedImageSource	.= 'x' . (string) $_GET['cropratio'];
		$resizedImageSource		.= '-' . $image;
		
		$resizedImage	= md5($resizedImageSource);
			
		$resized		= CACHE_DIR . $resizedImage;
		
		if (!isset($_GET['nocache']) && file_exists($resized))
		{
			$imageModified	= filemtime($docRoot . $image);
			$thumbModified	= filemtime($resized);
			
			if($imageModified < $thumbModified) {
				$data	= file_get_contents($resized);
			
				$lastModifiedString	= gmdate('D, d M Y H:i:s', $thumbModified) . ' GMT';
				$etag				= md5($data);
				
				$this->doConditionalGet($etag, $lastModifiedString);
				
				header("Content-type: $mime");
				header('Content-Length: ' . strlen($data));
				$image_arr['data'] = $data;
				$this->load->view('website/image.php', $image_arr);
			}
		}
		
		ini_set('memory_limit', MEMORY_TO_ALLOCATE);
		
		$dst	= imagecreatetruecolor($tnWidth, $tnHeight);
		
		switch ($size['mime'])
		{
			case 'image/gif':
				$creationFunction	= 'ImageCreateFromGif';
				$outputFunction		= 'ImagePng';
				$mime				= 'image/png';
				$doSharpen			= FALSE;
				$quality			= round(10 - ($quality / 10)); 
			break;
			
			case 'image/x-png':
			case 'image/png':
				$creationFunction	= 'ImageCreateFromPng';
				$outputFunction		= 'ImagePng';
				$doSharpen			= FALSE;
				$quality			= round(10 - ($quality / 10));
			break;
			
			default:
				$creationFunction	= 'ImageCreateFromJpeg';
				$outputFunction	 	= 'ImageJpeg';
				$doSharpen			= TRUE;
			break;
		}
		
		$src	= $creationFunction($docRoot . $image);
		
		if (in_array($size['mime'], array('image/gif', 'image/png')))
		{
			if (!$color)
			{
				imagealphablending($dst, false);
				imagesavealpha($dst, true);
			}
			else
			{
				if ($color[0] == '#')
					$color = substr($color, 1);
				
				$background	= FALSE;
				
				if (strlen($color) == 6)
					$background	= imagecolorallocate($dst, hexdec($color[0].$color[1]), hexdec($color[2].$color[3]), hexdec($color[4].$color[5]));
				else if (strlen($color) == 3)
					$background	= imagecolorallocate($dst, hexdec($color[0].$color[0]), hexdec($color[1].$color[1]), hexdec($color[2].$color[2]));
				if ($background)
					imagefill($dst, 0, 0, $background);
			}
		}
		
		ImageCopyResampled($dst, $src, 0, 0, $offsetX, $offsetY, $tnWidth, $tnHeight, $width, $height);
		
		if ($doSharpen)
		{
			$sharpness	= $this->findSharp($width, $tnWidth);
			
			$sharpenMatrix	= array(
				array(-1, -2, -1),
				array(-2, $sharpness + 12, -2),
				array(-1, -2, -1)
			);
			$divisor		= $sharpness;
			$offset			= 0;
			imageconvolution($dst, $sharpenMatrix, $divisor, $offset);
		}
		
		if (!file_exists(CACHE_DIR))
			mkdir(CACHE_DIR, 0755);
		
		if (!is_readable(CACHE_DIR))
		{
			header('HTTP/1.1 500 Internal Server Error');
			echo 'Error: the cache directory is not readable';
			exit();
		}
		else if (!is_writable(CACHE_DIR))
		{
			header('HTTP/1.1 500 Internal Server Error');
			echo 'Error: the cache directory is not writable';
			exit();
		}
		
		// Write the resized image to the cache
		$outputFunction($dst, $resized, $quality);
		
		ob_start();
		$outputFunction($dst, null, $quality);
		$data	= ob_get_contents();
		ob_end_clean();
		
		ImageDestroy($src);
		ImageDestroy($dst);
		
		$lastModifiedString	= gmdate('D, d M Y H:i:s', filemtime($resized)) . ' GMT';
		$etag = md5($data);
		
		$this->doConditionalGet($etag, $lastModifiedString);
		
		header("Content-type: $mime");
		header('Content-Length: ' . strlen($data));
		
		$image_arr['data'] = $data;
		$this->load->view('website/image.php', $image_arr);
		
	}
}