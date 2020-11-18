<script src="https://smtpjs.com/v3/smtp.js"></script>

<?php

include("connect.php");

if(isset($_POST['signup-submit'])){

    //Get form data
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $usertype = $_POST['utype'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];

    //Sanitise form data
    $username = $conn->real_escape_string($_POST['uname']);
    $password = $conn->real_escape_string($_POST['pword']);
    $usertype = $conn->real_escape_string($_POST['utype']);
    $firstname = $conn->real_escape_string($_POST['fname']);
    $lastname = $conn->real_escape_string($_POST['lname']);
    $email = $conn->real_escape_string($_POST['email']);

    //Generate the verfication key
    $vkey = md5(time() .$username);

    //Encrypt password
    $password = md5($password);

    //Insert data into the database
    $insertquery="INSERT INTO users (username, passw, usertype, firstname, lastname, useremail, vkey) VALUES ('$username', '$password', '$usertype', '$firstname', '$lastname', '$email', '$vkey')";
   
    $result = $conn->query($insertquery);   
  
    if($insertquery){
        //Send the verification email
        $to = $email;
        $subject = "Service user carer request";
        $message = "<a href ='http://localhost/confirm/confirmation.php?vkey=$vkey'>Confirm</a>";
        $headers = "From: bradykerry33@yahoo.com" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
?>
<script type="text/javascript">
    Email.send({
        Host: "smtp.gmail.com",
        Username : "blueandwhitesky123@gmail.com",
        Password : "blue2017",
        // To : 'Yas.ticket@gmail.com',
        To : <?php echo $email; ?>,
        From : "blueandwhitesky123@gmail.com",
        Subject : <?php echo $subject; ?>,
        Body : <?php echo $message; ?>,
        Header: <?php echo $headers; ?>
    })
    .then(function(message){
        // alert("mail sent successfully");
        console.log('mail sent successfully');
    });
    </javascript>
    <?php

        // mail($to, $subject, $message, $headers);

        // header('location: login.php');
    }else{
        die("Failure: Email was not sent!");
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
<title>Sign up</title>
</head>

<body>
    
<div class="container">
    <h1 class="page-header text-center">iWardrobe</h1>

    <hr>
    
    
    <div class="form-container">
<form action = "" method = "post">
    <h5 class="text-center">Create An Account</h5>
 
    <div class="form-group">
        <label>Username:</label>
        <input type ="text" name="uname" class="form-control" required="required" value = "" placeholder="Username">
       
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="pword" class="form-control" required="required" value = "" placeholder="Password">
    </div>

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">User Type:</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required name="utype">
    <option selected>Choose...</option>
    <option value="1">Carer</option>
    <option value="2">Patient</option>
   </select> 
  

<div class="form-group">
  <label>Firstname:</label>
        <input type ="text" name="fname" class="form-control" required="required" value = "" placeholder="Firstname">
    </div>

    <div class="form-group">
    <label>Lastname:</label>
        <input type ="text" name="lname" class="form-control" required="required" value = "" placeholder="Lastname">
    </div>

    <div class="form-group">
    <label>Email Address:</label>
        <input type ="text" name="email" class="form-control" required="required" value = "" placeholder="Email Address">
    </div>

    <button type="submit" name="signup-submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
</form>   
    </div>


<hr>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
