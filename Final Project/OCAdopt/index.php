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

<div class="row" style="margin-top:10px;">
<div class="col-sm-8">
<br>
<h2>OC Adopt</h2 >
  <form action="/action_page.php">
    <div class="form-group">
  <div align="left">
      <a href="dogs.php" class="btn btn-primary">View Dogs</a>
      <a href="cats.php" class="btn btn-primary">View Cats</a>
      <a href="others.php" class="btn btn-primary">View Others</a>
      <a href="shelters.php" class="btn btn-primary">View Shelters</a>
      <br>
      <br>
    </div>
  </form>

</div>
</div>

<?php
  include('conndb.php');
  $result = $myDB->query("SELECT A.animalName, COUNT(animalType) as 'Count' FROM PetInfo CROSS JOIN AnimalTypes A on PetInfo.animalType = A.animalID GROUP BY animalType;");
?>

</div>


<table class="table-dark table-hover" id="countTable" width="400">
    <thead>
      <tr>
        <th>Animal</th>
        <th>Number Available</th>
      </tr>
    </thead>
    <tbody>

      <?php
        foreach($result as $row) {
        ?>
          <tr>
            <td><?php echo $row['animalName']; ?></td>
            <td><?php echo $row['Count']; ?></td>
          </tr>
          <?php
        }

       ?>
    </tbody>
  </table>

</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
