<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Pet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<div class="container">
<h4>Insert Pet</h4>
<form action="petSubmit.php" method=post>
  <div class="form-group">
    <label for="petName">Pet Name:</label>
    <input type="text" class="form-control" name="petName">
  </div>
  <div class="form-group">
    <label for="petType">Animal Type:</label>
    <input type="text" class="form-control" name="petType">
  </div>
  <div class="form-group">
    <label for="petColor">Pet Color:</label>
    <input type="text" class="form-control" name="petColor">
  </div>
  <div class="form-group">
    <label for="petAge">Pet Age:</label>
    <input type="number" class="form-control" name="petAge">
  </div>
  <div class="form-group">
    <label for="petGender">Pet Gender:</label>
    <input type="text" class="form-control" name="petGender">
  </div>
  <div class="form-group">
    <label for="petWeight">Pet Weight:</label>
    <input type="number" class="form-control" name="petWeight">
  </div>
  <div class="form-group">
    <label for="petPrice">Pet Price:</label>
    <input type="number" class="form-control" name="petPrice">
  </div>
  <div class="form-group">
    <label for="shelterName">Shelter Name:</label>
    <input type="text" class="form-control" name="shelterName">
  </div>
<div align="center">
<button type="Submit" class="btn btn-success">Insert</button>
</div>
  </form>

</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
