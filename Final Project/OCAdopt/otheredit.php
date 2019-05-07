<?php

include('conndb.php');

$uid = $_POST['id'];

$name = $_POST['petName'];

$petType = $_POST['petType'];

$color = $_POST['petColor'];

$age = $_POST['petAge'];

$gender = $_POST['petGender'];

$weight = $_POST['petWeight'];

$price = $_POST['petPrice'];

$shelterName = $_POST['ShelterName'];

$find = $myDB->query("Select name FROM Shelters WHERE name = '$shelterName';");

if($find->rowCount() == 0) {
  $shelterName = "Lopez Group"; //shelter name not found. Not inserting the new one, just setting it to default
}

$find2 = $myDB->query("Select animalID FROM AnimalTypes WHERE animalName = '$petType';");

if($find2->rowCount() == 0) {
  $s = "INSERT INTO AnimalTypes (animalName) VALUE ('$petType');";
    $myDB->exec($s);
}

  $s2 = "SELECT lID FROM Shelters WHERE name = '$shelterName';";
  $shelterID = $myDB->query($s2);
  $shelterID = $shelterID->fetch();

  $s3 = "SELECT animalID FROM AnimalTypes WHERE animalName = '$petType';";
  $tempID = $myDB->query($s3);
  $tempID = $tempID->fetch();

  $data = array($tempID[0], $color, $age, $gender, $weight, $price, 0);

  $myDB->query("START TRANSACTION");


  $stm = $myDB->prepare("UPDATE PetInfo SET animalType=?, color=?, age=?, gender=?, weight=?, price=?, breedID=? WHERE infoID = '$uid';");

  $stm->execute($data);

  $id = $myDB->lastInsertID();

  $data2 = array($name, $id, $shelterID[0]);

  $stm2 = $myDB->prepare("UPDATE Pet SET name=?, infoID=?, shelterID=? WHERE petID = '$uid';");

  $stm2->execute($data2);

  if($stm and $stm2) {
    $myDB->query("COMMIT");
    echo "Success";
  } else {
    $myDB->query("ROLLBACK");
    echo "Failure";
  }

?>