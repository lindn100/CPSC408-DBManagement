<?php

include('conndb.php');

$uid = $_POST['id'];

$name = $_POST['dogName'];

$breed = $_POST['dogBreed'];

$color = $_POST['dogColor'];

$age = $_POST['dogAge'];

$gender = $_POST['dogGender'];

$weight = $_POST['dogWeight'];

$price = $_POST['dogPrice'];

$shelterName = $_POST['ShelterName'];

$find = $myDB->query("Select name FROM Shelters WHERE name = '$shelterName';");

if($find->rowCount() == 0) {
	$shelterName = "Lopez Group"; //shelter name not found. Not inserting the new one, just setting it to default
}

$find2 = $myDB->query("Select breedName FROM Breed WHERE breedName = '$breed';");

if($find2->rowCount() == 0) {
	$s = "INSERT INTO Breed (breedName) VALUE ('$breed');";
    $myDB->exec($s);
}

$s2 = "SELECT lID FROM Shelters WHERE name = '$shelterName';";
  $shelterID = $myDB->query($s2);
  $shelterID = $shelterID->fetch();

  $s3 = "SELECT breedID FROM Breed WHERE breedName = '$breed';";
  $breedID = $myDB->query($s3);
  $breedID = $breedID->fetch();

  $data = array(1, $color, $age, $gender, $weight, $price, $breedID[0]);


  $stm = $myDB->prepare("UPDATE PetInfo SET animalType=?, color=?, age=?, gender=?, weight=?, price=?, breedID=? WHERE infoID = '$uid';");

  if($stm->execute($data)) {
  	echo "Success\n";
  } else {
  	echo "Failure";
  }

  $data2 = array($name, $uid, $shelterID[0]);

  $stm2 = $myDB->prepare("UPDATE Pet SET name=?, infoID=?, shelterID=? WHERE petID = '$uid';");

  if($stm2->execute($data2)) {
    echo "Success";
  } else {
    echo "Failure";
  }

?>