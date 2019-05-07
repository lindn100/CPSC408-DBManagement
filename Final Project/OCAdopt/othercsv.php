<?php
	include('conndb.php');

  $result = $myDB->query("SELECT Pet.petID, Pet.name, AnimalTypes.animalName, PetInfo.age, PetInfo.color, PetInfo.gender, ROUND(PetInfo.weight, 2) AS weight, ROUND(PetInfo.price, 2) as price, Shelters.name as ShelterName FROM Pet, PetInfo, Shelters, AnimalTypes WHERE Pet.infoID = PetInfo.infoID AND Pet.shelterID = Shelters.lID AND animalType = AnimalTypes.animalID AND animalType <> (Select animalID FROM AnimalTypes WHERE animalName = 'Cat') AND animalType <> (SELECT animalID FROM AnimalTypes WHERE  animalName = 'Dog') ORDER BY petID;");

 	header('Content-Type: text/csv');
 	header('Content-Disposition: attachment; filename="others.csv"');

 	$i = 0;

 	foreach($result as $row) {
 		$user_CSV[$i] = array($row['name'], $row['animalName'], $row['color'], $row['age'], $row['gender'], $row['weight'], $row['price'], $row['ShelterName']);
 		++$i;
 	}

 	$fp = fopen('php://output', 'wb');
 	foreach($user_CSV as $line) {
 		fputcsv($fp, $line, ',');
 	}
 	fclose($fp);

?>