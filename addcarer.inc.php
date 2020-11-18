<?php

include("connect.php");

if(isset($_POST['carer-submit'])){

    // Get and sanitize form data
    $email = $conn->real_escape_string($_POST['email']);

    //Generate a Vkey
    $vkey = md5 (time().$email)


// Insert into the database
$sql = "INSERT INTO carer(careremail, vkey) VALUES('$careremail', '$vkey')";
$stmt = mysqli_stmt_init($conn);

if($insert){
    $to = $email;
    $subject = "Service User Carer Request";
    $message = "<a href='http://localhost/carerequest/confirmation.php?vkey=$vkey'>Confirm</a>";
    $headers = "From: </bradykerry33@yahoo> \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers);

    header('location: thankyou.php');
}else{
    echo $mysqli->error;
}
}
?>