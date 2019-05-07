<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Cat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<div class="container">
<h4>Insert Cat</h4>
<form action="catSubmit.php" method=post>
  <div class="form-group">
    <label for="catName">Cat Name:</label>
    <input type="text" class="form-control" name="catName">
  </div>
  <div class="form-group">
    <label for="catBreed">Cat Breed:</label>
    <input type="text" class="form-control" name="catBreed">
  </div>
  <div class="form-group">
    <label for="catColor">Cat Color:</label>
    <input type="text" class="form-control" name="catColor">
  </div>
  <div class="form-group">
    <label for="catAge">Cat Age:</label>
    <input type="number" class="form-control" name="catAge">
  </div>
  <div class="form-group">
    <label for="catGender">Cat Gender:</label>
    <input type="text" class="form-control" name="catGender">
  </div>
  <div class="form-group">
    <label for="catWeight">Cat Weight:</label>
    <input type="number" class="form-control" name="catWeight">
  </div>
  <div class="form-group">
    <label for="catPrice">Cat Price:</label>
    <input type="number" class="form-control" name="catPrice">
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
