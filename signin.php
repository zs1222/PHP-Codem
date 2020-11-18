<?php

session_start();

include("connect.php");

if(isset($_POST['login-submit'])){

    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $password = MD5($password);

        $sql = "SELECT * FROM users WHERE username=? AND passw=?";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);

        if($user){
            if(!empty($_POST["remember"])){
                setcookie("member_login", $username, time() + (1 * 60 * 60));
                setcookie("member_password", $password, time() + (1 * 60 * 60));
                
            }
        }   

        // session variables to grab logged in user's details
        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['usertype'] = $row['usertype'];
        
        session_write_close();

        if($result->num_rows==1 && $_SESSION['usertype'] == 1){
            header('Location: carerhome.php');
    
        }else if($result->num_rows==1 && $_SESSION['usertype'] == 2){
            header('Location: patienthome.php');
        }else{
            $msg = "Username or Password is incorrect!";
            header('Location: login.php');   
        }
    
    }
}
?>







  

