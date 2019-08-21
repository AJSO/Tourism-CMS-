<?php
header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="export-'.date('Y-m-d H:i:s').'.csv"');

echo "Email,Unsubscribe,Entered\n";
foreach($newsletter as $index=>$value){
	echo $value->email. ',';
	echo $value->unsubscribe. ',';
	echo $value->newsletter_entered;
	echo "\n";
}

?>