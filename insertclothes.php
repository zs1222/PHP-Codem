<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
<title>Insert clothes</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">iWardrobe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     
      <a class="nav-item nav-link" text="white" href ="carerhome.php">Home</a>
      <a class="nav-item nav-link" href="insertclothes.php">Insert Clothes</a>
      <a class="nav-item nav-link" href="clothinglog.php">Clothing Log</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>  

        <div class="container"> 

        <hr>

        <div class="form-container">
        <form action = "insertclothes.inc.php" method = "post" enctype="multipart/form-data">
        <h5 class = "text-center">Upload Service User's Clothing</h5>
        
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Clothing Type:</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required name="ctype">
    <option selected>Choose...</option>
    <option value="1">Coat</option>
    <option value="2">Top</option>
    <option value="3">Dress</option>
    <option value="4">Skirt</option>
    <option value="5">Trousers</option>
    <option value="6">Socks</option>
    <option value="7">Shoes</option>
   </select> 

   <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Instructions:</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required name="instructions">
    <option selected>Choose...</option>
    <option value="1">trousers.mp4</option>
    <option value="2">skirt.mp4</option>
    <option value="3">shirt.mp4</option>
    <option value="4">dress.mp4</option>
    <option value="5">socks.mp4</option>
    <option value="6">shoes.mp4</option>
   </select> 

   <div class="form-group">
  <label>user:</label>
        <input type ="text" name="user" class="form-control" required="required" value = "" placeholder="Firstname">
    </div>


    <div class="form-group">
    <label for="Picture">Picture:</label>
    <input type="file" class="form-control-file" id="Picture" required name="pic" >
    </div>

  

  <button type="submit" name="insert-submit" class="btn btn-primary btn-lg btn-block">Insert</button>
        </form>
        </div>

        <hr>

        </div>

        <div class = "date">
<?php
// Gets the current date
$getdate = date("Y-m-d");

// Converts US date format to European date format
$timestamp = strtotime($getdate); 
$new_date = date('d-m-Y', $timestamp);

echo "<p>$new_date </p>";
?>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>