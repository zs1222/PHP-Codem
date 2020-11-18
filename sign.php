<?php

session_start();

include("connect.php");

$unname = $_POST["userfield"];

$pass = $_POST["passfield"];

$checkuser="SELECT * FROM users WHERE username='$unname' AND passw='$pass'";

$userresult = $conn->query($checkuser);


if(!$userresult){
    echo $conn->error; 

}
       
$num = $userresult->num_rows;

$row = $userresult->fetch_assoc();


if($row['usertype']==1){
    $_SESSION['login'] = $unname;
    header("Location: carerhome.php");
    $_SESSION['userid']= $row['userid'];
}elseif($row['usertype']==2){
    $_SESSION['login'] = $unname;
    header("Location: patienthome.php");
    $_SESSION['userid']= $row['userid'];
}else{
    header("Location: login.php");
}

?>