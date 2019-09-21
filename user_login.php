<?php

include_once("config.php");

$username = $_GET['user'];
$password = $_GET['pwd'];

$result = mysqli_query($con,"SELECT * FROM users WHERE uusername = '$username' AND upassword = '$password'");
// var_dump($result);
if($result->num_rows  > 0 ){
    header("Location: index.php");
}else{
    echo "WRONG USER OR PASS";
}
?>