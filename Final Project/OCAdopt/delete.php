<?php

$id = $_GET['u_id'];

include('conndb.php');

$query = "DELETE FROM Shelters WHERE lID = '$id'";

if($myDB->exec($query)) {
  echo "Delete Successful" ;
} else {
  echo "Delete Failed" ;
}



 ?>
