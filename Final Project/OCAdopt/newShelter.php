<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Shelter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<div class="container">
<h4>Insert Shelter</h4>
<form action="shelterSubmit.php" method=post>
  <div class="form-group">
    <label for="shelterName">Shelter Name:</label>
    <input type="text" class="form-control" name="shelterName">
  </div>
  <div class="form-group">
    <label for="shelterCity">Shelter City:</label>
    <input type="text" class="form-control" name="shelterCity">
  </div>
  <div class="form-group">
    <label for="shelterStreet">Shelter Street:</label>
    <input type="text" class="form-control" name="shelterStreet">
  </div>
  <div class="form-group">
    <label for="shelterPhoneNumber">Shelter Phone Number:</label>
    <input type="text" class="form-control" name="shelterPhoneNumber">
  </div>
  <div class="form-group">
    <label for="shelterWebsite">Shelter Website:</label>
    <input type="text" class="form-control" name="shelterWebsite">
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
