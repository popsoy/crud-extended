  
<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$pId = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM products WHERE pId=:pId";
$query = $dbConn->prepare($sql);
$query->execute(array(':pId' => $pId));

header("Location:addproducts.php");
?>