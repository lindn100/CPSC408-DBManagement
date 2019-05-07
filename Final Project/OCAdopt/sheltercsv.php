<?php
	include('conndb.php');

 	$result = $myDB->query("SELECT * FROM Shelters;");
 	header('Content-Type: text/csv');
 	header('Content-Disposition: attachment; filename="shelters.csv"');

 	$i = 0;

 	foreach($result as $row) {
 		$user_CSV[$i] = array($row['name'], $row['city'], $row['street'], $row['phoneNumber'], $row['website']);
 		++$i;
 	}

 	$fp = fopen('php://output', 'wb');
 	foreach($user_CSV as $line) {
 		fputcsv($fp, $line, ',');
 	}
 	fclose($fp);

?>