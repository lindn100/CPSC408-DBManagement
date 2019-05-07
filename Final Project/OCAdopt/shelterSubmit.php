<?php

  include('conndb.php');
  $name = isset($_POST['shelterName']) ? $_POST['shelterName'] : '';
  $city = isset($_POST["shelterCity"]) ? $_POST['shelterCity'] : '';
  $street = isset($_POST["shelterStreet"]) ? $_POST['shelterStreet'] : '';
  $phoneNumber = isset($_POST["shelterPhoneNumber"]) ? $_POST['shelterPhoneNumber'] : '';
  $website = isset($_POST["shelterWebsite"]) ? $_POST['shelterWebsite'] : '';

  $data = array($name, $city, $street, $phoneNumber, $website);

  $stm = $myDB->prepare("INSERT INTO Shelters (name, city, street, phoneNumber, website) VALUES (?, ?, ?, ?, ?)");

  if($stm->execute($data)) {
    echo "Success";
  } else {
    echo "Failure";
  }


 ?>
