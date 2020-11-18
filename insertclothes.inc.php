<?php
if(isset($_POST['insert-submit'])){
    
    include("connect.php");

    // Get form data
    $clothingtype = $_POST['ctype'];
    $instructions = $_POST['instructions'];
    $user = $_POST['user'];
    $picture = $_POST['pic'];
    

    // Sanitize form data
    $clothingtype = $conn->real_escape_string($_POST['ctype']);
    $instructions = $conn->real_escape_string($_POST['instructions']);
    $user = $conn->real_escape_string($_POST['user']);
    $picture = $conn->real_escape_string($_POST['pic']);
    
    $sql= "INSERT INTO clothing (clothingtype, instructions, userid)
    VALUES($clothingtype, $instructions, $user)";

  $query= mysqli_query($conn, $sql);

  if($query){
   
    $sql2 ="INSERT INTO clothingpicture (picture) 
    VALUES($picture)";
    $result = mysqli_query($conn, $sql2);
    echo "Form successfully sent!";
  }else{
    echo "Error with submitting form!";
  }
}

    ?>