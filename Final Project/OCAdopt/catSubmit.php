<?php

  include('conndb.php');
  $name = isset($_POST['catName']) ? $_POST['catName'] : '';
  $breed = isset($_POST["catBreed"]) ? $_POST['catBreed'] : '';
  $color = isset($_POST["catColor"]) ? $_POST['catColor'] : '';
  $age = isset($_POST["catAge"]) ? $_POST['catAge'] : '';
  $gender = isset($_POST["catGender"]) ? $_POST['catGender'] : '';
  $weight = isset($_POST["catWeight"]) ? $_POST['catWeight'] : '';
  $price = isset($_POST["catPrice"]) ? $_POST['catPrice'] : '';
  $shelterName = isset($_POST["shelterName"]) ? $_POST['shelterName'] : '';

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

  $data = array(2, $color, $age, $gender, $weight, $price, $breedID[0]);

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
