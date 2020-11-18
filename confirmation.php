<?php
include("connect.php");
if(isset($_GET['vkey'])){
    //Process the verification
    $result = $mysqli->query("SELECT verified, vkey FROM carer WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if($result->nums_rows == 1){
        // Validate the email
        $update = $mysqli->query("UPDATE ACCOUNTS SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if($update){
            echo "You are now the registered carer for this service user";
        }else{
            echo $mysqli->error;
        }
    }else{
        echo "You are already the registered carer for this service user";
    }

}else{
    die("Error");
}
?>