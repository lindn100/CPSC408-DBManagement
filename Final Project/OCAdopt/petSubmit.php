<?php

  include('conndb.php');
  $name = isset($_POST['petName']) ? $_POST['petName'] : '';
  $petType = isset($_POST["petType"]) ? $_POST['petType'] : '';
  $color = isset($_POST["petColor"]) ? $_POST['petColor'] : '';
  $age = isset($_POST["petAge"]) ? $_POST['petAge'] : '';
  $gender = isset($_POST["petGender"]) ? $_POST['petGender'] : '';
  $weight = isset($_POST["petWeight"]) ? $_POST['petWeight'] : '';
  $price = isset($_POST["petPrice"]) ? $_POST['petPrice'] : '';
  $shelterName = isset($_POST["shelterName"]) ? $_POST['shelterName'] : '';

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


  $stm = $myDB->prepare("INSERT INTO PetInfo (animalType, color, age, gender, weight, price, breedID) VALUES (?, ?, ?, ?, ?, ?, ?);");

  $stm->execute($data);

  $id = $myDB->lastInsertID();

  $data2 = array($name, $id, $shelterID[0]);

  $stm2 = $myDB->prepare("INSERT INTO Pet (name, infoID, shelterID) VALUES (?, ?, ?)");

  $stm2->execute($data2);

  if($stm and $stm2) {
    $myDB->query("COMMIT");
    echo "Success";
  } else {
    $myDB->query("ROLLBACK");
    echo "Failure";
  }


 ?>
