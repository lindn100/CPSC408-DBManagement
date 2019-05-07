<!DOCTYPE html>
<html lang="en">
<head>
  <title>OCAdopt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

  <?php

  include('conndb.php');

  $id = $_GET['u_id'];


  $result = $myDB->query("SELECT Pet.petID, Pet.name, AnimalTypes.animalName, PetInfo.age, PetInfo.color, PetInfo.gender, ROUND(PetInfo.weight, 2) AS weight, ROUND(PetInfo.price, 2) as price, Shelters.name as ShelterName FROM Pet, PetInfo, Shelters, AnimalTypes WHERE petID = '$id' AND Pet.infoID = PetInfo.infoID AND Pet.shelterID = Shelters.lID AND animalType = AnimalTypes.animalID AND animalType <> (Select animalID FROM AnimalTypes WHERE animalName = 'Cat') AND animalType <> (SELECT animalID FROM AnimalTypes WHERE  animalName = 'Dog') ORDER BY petID;");

   ?>

<div class="container">

<?php
  foreach($result as $row) {

 ?>

<form action="otheredit.php" method="POST">

  <input type="hidden" name="id" value="<?php echo $row['petID']; ?>">



   <div class="form-group" style="margin-top:10px;">
     <div class="form-group">
       <label for="petName">Cat Name:</label>
       <input type="text" class="form-control" name="petName" value="<?php echo $row['name']; ?>">
     </div>
     <div class="form-group">
       <label for="petType">Animal Type:</label>
       <input type="text" class="form-control" name="petType" value="<?php echo $row['animalName']; ?>">
     </div>
     <div class="form-group">
       <label for="petColor">Pet Color:</label>
       <input type="text" class="form-control" name="petColor" value="<?php echo $row['color']; ?>">
     </div>
     <div class="form-group">
       <label for="petAge">Pet Age:</label>
       <input type="number" class="form-control" name="petAge" value="<?php echo $row['age']; ?>">
     </div>
     <div class="form-group">
       <label for="petGender">Pet Gender:</label>
       <input type="text" class="form-control" name="petGender" value="<?php echo $row['gender']; ?>">
     </div>
     <div class="form-group">
       <label for="petWeight">Pet Weight:</label>
       <input type="number" class="form-control" name="petWeight" value="<?php echo $row['weight']; ?>">
     </div>
     <div class="form-group">
       <label for="petPrice">Pet Price:</label>
       <input type="number" class="form-control" name="petPrice" value="<?php echo $row['price']; ?>">
     </div>
      <div class="form-group">
       <label for="ShelterName">Shelter Name:</label>
       <input type="text" class="form-control" name="ShelterName" value="<?php echo $row['ShelterName']; ?>">

       <?php
       } 
       ?>


     </div>
   <div align="center">
   <button type="Submit" class="btn btn-success">Update</button>
   </div>
 </form>

</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
