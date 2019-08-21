<?php
set_time_limit(500000);

$api_key = 'AIzaSyAnEq1OZA-IqCseBy9VMxRKoiawxJid8hU';

$mysqli = new mysqli("localhost", "root", "", "cms_ecommerce");
$mysqli->set_charset("utf8");

if(isset($_GET['lang'])){
	
	list($code2, $str) = explode('_', $_GET['lang']);	
	include('language/en/var_lang.php');
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="get">
  <label for="select">Select:</label>
  <select name="lang" id="select">
  	<?php 
		$sql = "SELECT * FROM cms_language ";
		$result = $mysqli->query($sql);
		while($rs = $result->fetch_assoc()){
			
			if($_GET['lang'] == $rs['code']){
				$select = ' selected';
			}else{
				$select = '';
			}
			
		?>
    <option value="<?php echo $rs['code']; ?>" <?php echo $select; ?>><?php echo $rs['code'] .' - '. $rs['name']; ?></option>
    <?php 
		}
		?>
  </select>
  <input type="submit">
</form>

<?php

if(isset($lang)){
	echo '<textarea rows="20" style="width:650px;"><?php '."\n";
	foreach($lang as $index=>$value){
		$url = 'https://www.googleapis.com/language/translate/v2?key='.$api_key.'&source=en&target='.$code2.'&q='.urlencode($value);
		
		$url = 'https://www.googleapis.com/language/translate/v2?q='.$value.'&target='.$code2.'&format=text&source=en&key='.$api_key;
		
		$content = file_get_contents($url);
		$arr = json_decode($content,true);
		
		$index = str_replace("'","\\'",$index);
		$arr['data']['translations'][0]['translatedText'] = str_replace("'","\\'",$arr['data']['translations'][0]['translatedText']);
		echo '$lang[\''.$index.'\'] = \''.$arr['data']['translations'][0]['translatedText'].'\';'."\n";
	}
	echo '</textarea>';
}
?>
</body>
</html>