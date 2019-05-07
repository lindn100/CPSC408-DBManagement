<?php

$id = $_GET['u_id'];

include('conndb.php');

$myDB->query("START TRANSACTION");

$query3 = "SELECT infoID FROM Pet WHERE petID = '$id'";

$stm3 = $myDB->query($query3);
$stm3 = $stm3->fetch();

$query = "DELETE FROM Pet WHERE petID = '$id'";

$stm = $myDB->exec($query);

$query2 = "DELETE FROM PetInfo WHERE infoID = '$stm3[0]'";

$stm2 = $myDB->exec($query2);

  if($stm and $stm2) {
    $myDB->query("COMMIT");
    echo "Success";
  } else {
    $myDB->query("ROLLBACK");
    echo "Failure";
  }


 ?>
