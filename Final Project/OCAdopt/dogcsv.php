<?php
	include('conndb.php');

 	$result = $myDB->query("SELECT Pet.petID, Pet.name, Breed.breedName, PetInfo.age, PetInfo.color, PetInfo.gender, ROUND(PetInfo.weight, 2) AS weight, ROUND(PetInfo.price, 2) as price, Shelters.name as ShelterName FROM Pet, PetInfo, Breed, Shelters WHERE Pet.infoID = PetInfo.infoID AND PetInfo.breedID = Breed.breedID AND Pet.shelterID = Shelters.lID AND animalType = (Select animalID FROM AnimalTypes WHERE animalName = 'Dog');");
 	header('Content-Type: text/csv');
 	header('Content-Disposition: attachment; filename="dogs.csv"');

 	$i = 0;

 	foreach($result as $row) {
 		$user_CSV[$i] = array($row['name'], $row['breedName'], $row['color'], $row['age'], $row['gender'], $row['weight'], $row['price'], $row['ShelterName']);
 		++$i;
 	}

 	$fp = fopen('php://output', 'wb');
 	foreach($user_CSV as $line) {
 		fputcsv($fp, $line, ',');
 	}
 	fclose($fp);

?>