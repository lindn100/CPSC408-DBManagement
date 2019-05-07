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

<div class="container">
<?php

  include('conndb.php');

  $result = $myDB->query("SELECT Pet.petID, Pet.name, Breed.breedName, PetInfo.age, PetInfo.color, PetInfo.gender, ROUND(PetInfo.weight, 2) AS weight, ROUND(PetInfo.price, 2) as price, Shelters.name as ShelterName FROM Pet, PetInfo, Breed, Shelters WHERE Pet.infoID = PetInfo.infoID AND PetInfo.breedID = Breed.breedID AND Pet.shelterID = Shelters.lID AND animalType = (Select animalID FROM AnimalTypes WHERE animalName = 'Dog');");



 ?>

<div class="row" style="margin-top:10px;">
<div class="col-sm-8">
<br>
<h2>Dogs</h2 >
  <form action="/action_page.php">
    <div class="form-group">
  <div align="left">
      <a href="newDog.php" button type="NewDog" class="btn btn-primary">New Dog</a>
      <br>
      <br>
    </div>
  </form>
  <table class="table-dark table-hover" id="firstTable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Breed</th>
        <th>Color</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Weight</th>
        <th>Price</th>
        <th>Shelter</th>
      </tr>
    </thead>
    <tbody>

      <?php
        foreach($result as $row) {
        ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['breedName']; ?></td>
            <td><?php echo $row['color']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['weight']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['ShelterName']; ?></td>
            <td>
              <a href="dogupdate.php?u_id=<?php echo $row['petID']; ?>" class ="btn btn-info" role="button">Update</a>
              <a href="dogdelete.php?u_id=<?php echo $row['petID']; ?>" class ="btn btn-danger" role="button">Delete</a>
            </td>
          </tr>
          <?php
        }

       ?>
    </tbody>
  </table>

</div>
</div>
</div>
<a href="dogcsv.php" class ="btn btn-info" role="button">Get Report</a>
</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
