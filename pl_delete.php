<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$oId = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM orders WHERE oId=:oId";
$query = $dbConn->prepare($sql);
$query->execute(array(':oId' => $oId));


//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
