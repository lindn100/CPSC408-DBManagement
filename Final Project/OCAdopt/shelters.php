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

  $result = $myDB->query("CALL getShelters();"); //stored procedure



 ?>

<div class="row" style="margin-top:10px;">
<div class="col-sm-8">
<br>
<h2>Shelters</h2 >
  <form action="/action_page.php">
    <div class="form-group">
  <div align="left">
      <a href="newShelter.php" button type="NewShelter" class="btn btn-primary">New Shelter</a>
      <br>
      <br>
    </div>
  </form>
  <table class="table-dark table-hover" id="firstTable">
    <thead>
      <tr>
        <th>Name</th>
        <th>City</th>
        <th>Street</th>
        <th>Phone Number</th>
        <th>Website</th>
      </tr>
    </thead>
    <tbody>

      <?php
        foreach($result as $row) {
        ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['street']; ?></td>
            <td><?php echo $row['phoneNumber']; ?></td>
            <td><?php echo $row['website']; ?></td>
            <td>
              <a href="update.php?u_id=<?php echo $row['lID']; ?>" class ="btn btn-info" role="button">Update</a>
              <a href="delete.php?u_id=<?php echo $row['lID']; ?>" class ="btn btn-danger" role="button">Delete</a>
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
<a href="sheltercsv.php" class ="btn btn-info" role="button">Get Report</a>
</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
