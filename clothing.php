<?php
 session_start();
 $userid = $_SESSION['userid'];

 include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">

    <script defer src="script.js"></script>
    
    
<title>Clothing</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">

<div class="btn-group" role="group" aria-label="First group">
        <a class="fas fa-home fa-3x" style = "color: white" href="patienthome.php"></a>
  </div>
     
        <div class="btn-group" role="group" aria-label="Second group">
        <a class="fas fa-tshirt fa-3x" style = "color: white" href="clothing.php"></a>
        </div>
        </nav>
       
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="btn-group" role="group" aria-label="Third group">
        <a class="fas fa-users fa-3x" style = "color: white" href="addcarer.php"></a>
        </div>
      
        <div class="btn-group" role="group" aria-label="Fourth group">
        <a class="fas fa-power-off fa-3x" style = "color: white" href="logout.php"></a>
        </div>
        </nav>

        <?php

        $sql = "SELECT * FROM clothing WHERE userid=userid";
        $result = $conn -> query($sql);   
        if(!$result){
        echo $conn -> error;
            }
        while ($row = $result->fetch_assoc()){
            
            $clothingtype=$row['clothingtype'];
            $instructions=$row['instructions'];
            
            echo"<div>$clothingtype</div>".
            "<div>$instructions</div>";
     
             }

    ?>

<hr>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


</html>