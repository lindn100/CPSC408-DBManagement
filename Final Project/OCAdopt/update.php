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

  $query = "SELECT * FROM Shelters WHERE lID = '$id'";

  $result = $myDB->query($query);

   ?>

<div class="container">

<?php
  foreach($result as $row) {

 ?>

<form action="edit.php" method="POST">

  <input type="hidden" name="id" value="<?php echo $row['lID']; ?>">



   <div class="form-group" style="margin-top:10px;">
     <div class="form-group">
       <label for="shelterName">Shelter Name:</label>
       <input type="text" class="form-control" name="shelterName" value="<?php echo $row['name']; ?>">
     </div>
     <div class="form-group">
       <label for="shelterCity">Shelter City:</label>
       <input type="text" class="form-control" name="shelterCity" value="<?php echo $row['city']; ?>">
     </div>
     <div class="form-group">
       <label for="shelterStreet">Shelter Street:</label>
       <input type="text" class="form-control" name="shelterStreet" value="<?php echo $row['street']; ?>">
     </div>
     <div class="form-group">
       <label for="shelterPhoneNumber">Shelter Phone Number:</label>
       <input type="text" class="form-control" name="shelterPhoneNumber" value="<?php echo $row['phoneNumber']; ?>">
     </div>
     <div class="form-group">
       <label for="shelterWebsite">Shelter Website:</label>
       <input type="text" class="form-control" name="shelterWebsite" value="<?php echo $row['website']; ?>">

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
