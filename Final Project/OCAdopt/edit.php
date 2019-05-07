<?php

include('conndb.php');

$uid = $_POST['id'];

$name = $_POST['shelterName'];

$city = $_POST['shelterCity'];

$street = $_POST['shelterStreet'];

$phoneNumber = $_POST['shelterPhoneNumber'];

$website = $_POST['shelterWebsite'];

$data = array($name, $city, $street, $phoneNumber, $website);

  $stm = $myDB->prepare("UPDATE Shelters SET name=?, city=?, street=?, phoneNumber=?, website=? WHERE lID='$uid';");

  if($stm->execute($data)) {
    echo "Success";
  } else {
    echo "Failure";
  }


?>