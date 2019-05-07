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


  $result = $myDB->query("SELECT Pet.petID, Pet.name, Breed.breedName, PetInfo.age, PetInfo.color, PetInfo.gender, ROUND(PetInfo.weight, 2) AS weight, ROUND(PetInfo.price, 2) as price, Shelters.name as ShelterName FROM Pet, PetInfo, Breed, Shelters WHERE Pet.petID = '$id' AND Pet.infoID = PetInfo.infoID AND PetInfo.breedID = Breed.breedID AND Pet.shelterID = Shelters.lID AND animalType = (Select animalID FROM AnimalTypes WHERE animalName = 'Dog');");

   ?>

<div class="container">

<?php
  foreach($result as $row) {

 ?>

<form action="dogedit.php" method="POST">

  <input type="hidden" name="id" value="<?php echo $row['petID']; ?>">



   <div class="form-group" style="margin-top:10px;">
     <div class="form-group">
       <label for="dogName">Dog Name:</label>
       <input type="text" class="form-control" name="dogName" value="<?php echo $row['name']; ?>">
     </div>
     <div class="form-group">
       <label for="dogBreed">Dog Breed:</label>
       <input type="text" class="form-control" name="dogBreed" value="<?php echo $row['breedName']; ?>">
     </div>
     <div class="form-group">
       <label for="dogColor">Dog Color:</label>
       <input type="text" class="form-control" name="dogColor" value="<?php echo $row['color']; ?>">
     </div>
     <div class="form-group">
       <label for="dogAge">Dog Age:</label>
       <input type="number" class="form-control" name="dogAge" value="<?php echo $row['age']; ?>">
     </div>
     <div class="form-group">
       <label for="dogGender">Dog Gender:</label>
       <input type="text" class="form-control" name="dogGender" value="<?php echo $row['gender']; ?>">
     </div>
     <div class="form-group">
       <label for="dogWeight">Dog Weight:</label>
       <input type="number" class="form-control" name="dogWeight" value="<?php echo $row['weight']; ?>">
     </div>
     <div class="form-group">
       <label for="dogPrice">Dog Price:</label>
       <input type="number" class="form-control" name="dogPrice" value="<?php echo $row['price']; ?>">
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
