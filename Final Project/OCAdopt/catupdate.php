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


  $result = $myDB->query("SELECT Pet.petID, Pet.name, Breed.breedName, PetInfo.age, PetInfo.color, PetInfo.gender, ROUND(PetInfo.weight, 2) AS weight, ROUND(PetInfo.price, 2) as price, Shelters.name as ShelterName FROM Pet, PetInfo, Breed, Shelters WHERE Pet.petID = '$id' AND Pet.infoID = PetInfo.infoID AND PetInfo.breedID = Breed.breedID AND Pet.shelterID = Shelters.lID AND animalType = (Select animalID FROM AnimalTypes WHERE animalName = 'Cat');");

   ?>

<div class="container">

<?php
  foreach($result as $row) {

 ?>

<form action="catedit.php" method="POST">

  <input type="hidden" name="id" value="<?php echo $row['petID']; ?>">



   <div class="form-group" style="margin-top:10px;">
     <div class="form-group">
       <label for="catName">Cat Name:</label>
       <input type="text" class="form-control" name="catName" value="<?php echo $row['name']; ?>">
     </div>
     <div class="form-group">
       <label for="catBreed">Cat Breed:</label>
       <input type="text" class="form-control" name="catBreed" value="<?php echo $row['breedName']; ?>">
     </div>
     <div class="form-group">
       <label for="catColor">Cat Color:</label>
       <input type="text" class="form-control" name="catColor" value="<?php echo $row['color']; ?>">
     </div>
     <div class="form-group">
       <label for="catAge">Cat Age:</label>
       <input type="number" class="form-control" name="catAge" value="<?php echo $row['age']; ?>">
     </div>
     <div class="form-group">
       <label for="catGender">Cat Gender:</label>
       <input type="text" class="form-control" name="catGender" value="<?php echo $row['gender']; ?>">
     </div>
     <div class="form-group">
       <label for="catWeight">Cat Weight:</label>
       <input type="number" class="form-control" name="catWeight" value="<?php echo $row['weight']; ?>">
     </div>
     <div class="form-group">
       <label for="catPrice">Cat Price:</label>
       <input type="number" class="form-control" name="catPrice" value="<?php echo $row['price']; ?>">
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
