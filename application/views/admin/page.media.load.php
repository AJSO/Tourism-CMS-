<?php 

$item = 5;
$rows = ceil(count($images)/$item);
$r = 1;
$x = 0;
echo '<table>';
while($r <= $rows){
	echo '<tr>';
	for($i=1; $i<=$item; $i++){
		if(isset($images[$x]->filepath)){
			echo '<td>';
			echo '<img src='.base_url().$images[$x]->filepath.' class="img-responsive">';
			echo '</td>';
			$x++;
		}
	}
	echo '</tr>';
	$r++;
}
echo '</table>';

?>