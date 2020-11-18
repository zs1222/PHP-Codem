<?php
 session_start();
 $userid = $_SESSION['userid'];
 

 include("connect.php");

 if(isset($_POST['carer-submit'])){

    //Get form  data
    $email = $_POST['email'];

    //Sanitise the form data
    $email = $conn->real_escape_string($_POST['email']);

    $sql = "SELECT * FROM users WHERE useremail= useremail";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param();
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    

     //Generate the verfication key
     $vkey = md5(time() .$email);

     // Insert into the database
$insertquery = "INSERT INTO carer(carerid, userid, careremail, vkey, verified) VALUES ('$carerid','$userid', '$email', '$vkey', '0')";
echo $insertquery;
$result = $conn->query($insertquery);



if($insertquery){
    //Send the verification email
    $to = $email;
    $subject = "Service user carer request";
    $message = "<a href ='http://localhost/confirm/confirmation.php?vkey=$vkey'>Confirm</a>";
    $headers = "From: bradykerry33@yahoo.com" . "\r\n";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($to, $subject, $message, $headers);

    //header('location: thankyou.php');
}else{
    echo $mysqli->error;
}
 }

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

    
<title>Add carer</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">

        <div class="btn-group" role="group" aria-label="First group">
        <a class="fas fa-home fa-3x" style = "color: white" href="patienthome.php"></a>
         </div>
       
     
        <div class="btn-group" role="group" aria-label="Second group">
        <a class="fas fa-tshirt fa-3x" style = "color: white" href="#"></a>
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

<hr>

        <div class="form-container">
        <form action = "" method = "post">
        <h5 class = "text-center">Register A Carer</h5>

        <div class="form-group">
        <label>Carer's Email Address:</label>
        <input type="text" name="email" class="form-control" required="required" value = "" placeholder="Carer's Email Address">
    </div>

    <button type="submit" name="carer-submit" class="btn btn-primary btn-lg btn-block">Submit</button>

        </form>

        <hr>
</script> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


</html>