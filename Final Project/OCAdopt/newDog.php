<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Dog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<div class="container">
<h4>Insert Dog</h4>
<form action="dogSubmit.php" method=post>
  <div class="form-group">
    <label for="dogName">Dog Name:</label>
    <input type="text" class="form-control" name="dogName">
  </div>
  <div class="form-group">
    <label for="dogBreed">Dog Breed:</label>
    <input type="text" class="form-control" name="dogBreed">
  </div>
  <div class="form-group">
    <label for="dogColor">Dog Color:</label>
    <input type="text" class="form-control" name="dogColor">
  </div>
  <div class="form-group">
    <label for="dogAge">Dog Age:</label>
    <input type="number" class="form-control" name="dogAge">
  </div>
  <div class="form-group">
    <label for="dogGender">Dog Gender:</label>
    <input type="text" class="form-control" name="dogGender">
  </div>
  <div class="form-group">
    <label for="dogWeight">Dog Weight:</label>
    <input type="number" class="form-control" name="dogWeight">
  </div>
  <div class="form-group">
    <label for="dogPrice">Dog Price:</label>
    <input type="number" class="form-control" name="dogPrice">
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
