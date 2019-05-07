<?php

$dbname = "StudentDB.db";

try{
  $myDB = new PDO('mysql:host=35.247.32.1;port=3306;dbname=OCAdopt' , "user", "notasecurepassword");
}
catch(PDOException $e) {
  echo "DB connection error: " . $e->getMessage();
  exit;
}




 ?>
