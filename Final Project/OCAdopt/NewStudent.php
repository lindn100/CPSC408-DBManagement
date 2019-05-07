<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
<?php

  include('conndb.php');

 ?>
<h4>Insert fields</h4>
<form action="/action_page.php">
  <div class="form-group">
    <label for="StudentID">StudentID:</label>
    <input type="number" class="form-control" name="StudentID">
  </div>
  <div class="form-group">
    <label for="FName">First Name:</label>
    <input type="text" class="form-control" name="FName">
  </div>
<div align="center">
    <a href="../OCAdopt" button type="Submit" class="btn btn-primary">Submit</a>
  </div>
</form>

</div>
<div class="col-sm-8">

</div>
</div>


</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
